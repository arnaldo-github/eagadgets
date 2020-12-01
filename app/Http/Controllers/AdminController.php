<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function options(){
        return view('admin.options');
    }
    public function saveOptions(Request $request){
        $messages = [
            'required' => 'O campo :attribute  é obrigatório',
            'max' => 'Este campo excede :max caractéres',
        ];
        $rules = [
            'whatsappNumber' => 'required|max:255',
            'phoneNumber' => 'required|max:255',
            'bannerText' => 'required|max:255',
        ];
        $attributes = [
            'whatsappNumber' => 'Número de WhatsApp',
            'phoneNumber' => 'Número de Celular',
            'bannerText' => 'banner',
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

      setting(['whatsappNumber' => $request->whatsappNumber, 
      'phoneNumber'=> $request->phoneNumber, 'bannerText' => $request->bannerText]);
       

        return redirect('/admin/options');
    }
}
