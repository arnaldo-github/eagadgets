<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\View\ViewFinderInterface;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array(
            'categories' => Category::orderBy('updated_at', 'desc')->get(),
        );
        return view('category.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => 'O campo :attribute  é obrigatório',
            'max' => 'Este campo excede :max caractéres',
            'unique' => 'Já existe uma categoria com este nome'
        ];
        $rules = [
            'name' => 'required|unique:categories|max:255',
            'description' => 'max:255',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();

        $request->session()->flash('activity', 'Categoria ' . $category->name . ' criada');

        return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        DB::enableQueryLog();
        $category = Category::find($id);
        
        if (!$category) {
            dd(DB::getQueryLog());
            return "NOT" . $category . "id: ". $id;
        }
        $data = array(
            'placeholder' => 'Pesquise nessa categoria',
            'category' => $category,
            'categories' => Category::all(),
            'products' => $products = Product::where([['category_id', $id]])->orderBy('updated_at', 'desc')->paginate(20),
        );

        return view('general.category')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $data = array(
            'category' => $category,
        );
        return view('category.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'O campo :attribute  é obrigatório',
            'max' => 'Este campo excede :max caractéres',
            'unique' => 'Já existe uma categoria com este nome'
        ];
        $rules = [
            'name' => 'required|max:30',
            'description' => 'max:255',
        ];


        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->description = $request->description;

        try {
            $category->save();
        } catch (QueryException $ex) {

            if (Str::contains($ex->getMessage(), 'duplicate')) {
                $validator->errors()->add('name.unique', 'Já existe uma categoria com este nome');
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $validator->errors()->add('error', 'Erro no servidor');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $category->save();

        $request->session()->flash('activity', 'Categoria ' . $category->name . ' editada');

        return redirect('/admin/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        session()->flash('activity', 'Categoria apagada com sucesso');
        return redirect('/admin/category');
    }

    public function listAll()
    {
        $data = array(
            'categories' => Category::withTrashed()->orderBy('updated_at', 'desc')->get(),
        );

        return view('category.index-all')->with($data);
    }
}
