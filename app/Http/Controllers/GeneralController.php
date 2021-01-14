<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class GeneralController extends Controller
{
    public function index()
    {
        $data = array(
            'categories' => Category::limit(3)->get(),
            'products' => Product::orderBy('updated_at', 'desc')->limit(5)->get(),
        );
       return view('general.index')->with($data);
    }

    public function indexTemp(){
        $data = array(
            'categories' => Category::limit(3)->get(),
            'products' => Product::orderBy('updated_at', 'desc')->limit(5)->get(),
        );
       return view('general.index-temp')->with($data);
    }


    public function singleProduct($id){
        $product = Product::findOrFail($id);

       
        $array = DB::select("SELECT round(AVG(review),0) as avg FROM `reviews` WHERE product_id =".$product->id." GROUP BY product_id");

        //No caso de a query não retornar nada, vai inventar 4
        $averageInt= 4;  
        //Retorna uma ´´unica colun
        foreach ($array as $key => $value) {
            $average = $value;
            $averageInt = $average->avg;
        }
        $productSugestions = Product::where('category_id', $product->category->id)->inRandomOrder()->limit(3)->get();
       
      
        $data = array( 
            'average' =>$averageInt,
            'productSugestions' => $productSugestions,
            'placeholder' => 'Pesquise produtos',
            'whatsappNumber'=> Config::get('social.whatsapp_number'),
            'phoneNumber' => Config::get('social.phone_number'),
            'categories' => Category::all(),
            'message' => urlencode("Estou interressado no produto: *" . $product->name . '*. O link é:'),
            'product' => Product::findOrFail($id),
        );
        
        return view('general.singleproduct')->with($data);
    }
    public function allProducts(){
        $data = array(
            'placeholder' => 'Pesquise por todos os produtos',
            'categories' =>Category::orderBy('name')->get(),
            'products' => Product::orderBy('updated_at', 'desc')->paginate(30),
        );
       return view('general.allproducts')->with($data);
    }

    public function search(Request $request){
        $previousURL = url()->previous();
        $category_id = session('search_category_id');
        $containsCategoryInURL = Str::contains($previousURL, 'category');
        //Devolve a pesquisa caso a pesquisa venha de uma categoria
        
        if ( $containsCategoryInURL || isset($category_id)) {
            if ($containsCategoryInURL ) {
                $category_id = explode('/', $previousURL)[4];
            }

            $products = Product::where([['name', 'LIKE', '%' . $request->searchText . '%'],
             ['category_id', $category_id]
            ])->orderBy('updated_at', 'desc')->paginate(50);
       
            $request->session()->put('search_category_id', $category_id);
            $placeholder = "Pesquise produtos na categoria: ".Category::find($category_id)->name;
        } else {
            $products = Product::where('name', 'LIKE', '%' . $request->searchText . '%')->orderBy('updated_at', 'desc')->paginate(50);
            $placeholder = 'Pesquise produtos';
        }
        
        $data = array(
            'placeholder'=>$placeholder,
            'products' => $products,
            'category' => Category::find($category_id),
            'categories' => Category::all(),
        );
        return view('general.search')->with($data);
    }
}
