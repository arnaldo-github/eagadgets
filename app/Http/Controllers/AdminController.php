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
        ];
        

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        Config::set('social.whatsapp_number', $request->whatsappNumber);
        Config::set('social.phone_number', $request->phoneNumber);

        return Config::get('social.whatsapp_number');
    }
}
