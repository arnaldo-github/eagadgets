<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class GeneralController extends Controller
{
    public function index()
    {
        $data = array(
            'categories' => Category::all(),
            'products' => Product::orderBy('updated_at', 'desc')->limit(24)->get(),
        );
       return view('general.index')->with($data);
    }
    public function singleProduct($id){
        $data = array( 
            'whatsappNumber'=> Config::get('social.whatsapp_number'),
            'phoneNumber' => Config::get('social.phone_number'),
            'categories' => Category::all(),
            'message' => urlencode("Estou interressado no produto: *" . Product::findOrFail($id)->name . '*. O link é:'),
            'product' => Product::findOrFail($id),
        );
        
        return view('general.singleproduct')->with($data);
    }
    public function allProducts(){
        $data = array(
            'categories' => Category::all(),
            'products' => Product::orderBy('updated_at', 'desc')->paginate(30),
        );
       return view('general.allproducts')->with($data);
    }
}
