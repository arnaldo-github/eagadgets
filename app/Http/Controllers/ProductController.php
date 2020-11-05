<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = array(
            'products' => Product::orderBy('updated_at', 'desc')->paginate(50),
            'categories' => Category::all(),
        );
        return view('product.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $data = array(
            'categories' => Category::all()
        );
        return view('product.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messages = [
            'required' => 'O campo :attribute  é obrigatório',
            'max' => 'O campo :attribute não pode ter mais de :max caractéres',
            'min' => 'O campo :attribute  deve ter no mínimo :min caractéres',
            'image' => ':attribute precisa ser uma imagem',
            'file' => 'Falhou o upload do ficheiro',
            'image.max' => 'A imagem não pode ter mais de 700Kilobytes ',
        ];
        $rules = [
            'name' => 'required|max:255',
            'description' => 'required|max:40000',
            'price' => 'required|min:0',
            'image' => 'required|file|image|max:700',
            'category_id' => 'required',
        ];
        $attributes = [
            'name' => 'nome',
            'description' => 'descrição',
            'price' => 'preço',
            'image' => 'imagem',
            'category_id' => 'categoria'
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $file = $request->file('image');
        $filename = Str::random(4) . time() . '.' . $file->getClientOriginalExtension();
        $path = 'public/img/' . $filename;
        Storage::disk('local')->put($path, file_get_contents($file));
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->user_id = auth()->user()->id;
        $product->category_id =   $request->category_id;
        $product->photo_path = 'storage/img/' . $filename;
        $product->save();


        $request->session()->flash('activity', 'Produto:  ' . $product->name . ' criado');

        return redirect('/admin/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array(
            'product' => Product::findOrFail($id),
        );
        return view('product.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = array(
            'categories' => Category::all(),
            'product' => Product::findOrfail($id)
        );
        return view('product.edit')->with($data);
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
            'max' => 'O campo :attribute não pode ter mais de :max caractéres',
            'min' => 'O campo :attribute  deve ter no mínimo :min caractéres',
            'image' => ':attribute precisa ser uma imagem',
            'file' => 'Falhou o upload do ficheiro',
            'image.size' => 'A imagem não pode ter mais de 700Kilobytes ',
        ];
        $rules = [
            'name' => 'required|max:255',
            'description' => 'max:40000',
            'price' => 'required|min:0',
            'image' => 'file|image|max:700',
            'category_id' => 'required',
        ];
        $attributes = [
            'name' => 'nome',
            'description' => 'descrição',
            'price' => 'preço',
            'image' => 'imagem',
            'category_id' => 'categoria'
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);
        $validator->errors();
        
       
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $product = Product::findOrFail($id);

        if ($request->hasFile('image')) {
            $deletePath = Str::replaceFirst('storage', 'public', $product->photo_path);
            Storage::disk('local')->delete($deletePath);
            $file = $request->file('image');
            $filename = Str::random(4) . time() . '.' . $file->getClientOriginalExtension();
            $path = 'public/img/' . $filename;
            Storage::disk('local')->put($path, file_get_contents($file));
            $product->photo_path = 'storage/img/' . $filename;
        }

        $product->name = $request->name;
        if (strlen($request->description) > 11) {
            $product->description = $request->description;
        }
        $product->price = $request->price;
        $product->user_id = auth()->user()->id;
        $product->category_id =   $request->category_id;
        $product->save();


        $request->session()->flash('activity', 'Produto:  ' . $product->name . ' editado');

        return redirect('/admin/product/' . $product->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->destroy($id);
        session()->flash('activity', 'Producto ' . $product->name . ' apagado com sucesso');
        return redirect('/admin/product');
    }

    public function search(Request $request)
    {
        //Retorna productos de acordo com o nome
        if ($request->searchText != null && $request->category == "") {
            $products = Product::where('name', 'LIKE', '%' . $request->searchText . '%')->orderBy('updated_at', 'desc')->paginate(50);
        } //Retorna productos de acordo com a categoria
        else if ($request->searchText == null && $request->category != "") {
            $products = Product::where('category_id', $request->category)->orderBy('updated_at', 'desc')->paginate(50);
        } //Retorna productos de acordo com a categoria e o nome
        else if ($request->searchText != null && $request->category != "") {
            $products = Product::where([
                ['category_id', $request->category],
                ['name', 'LIKE', '%' . $request->searchText . '%']
            ])
                ->orderBy('updated_at', 'desc')
                ->paginate(50);
        } else
        //Retorna productos todos os produtos, pois não têm parametros
        {
            $products = Product::orderBy('updated_at', 'desc')->paginate(50);
        }
        $data = array(
            'products' => $products,
            'categories' => Category::all(),
        );
        return view('product.index')->with($data);
    }
}
