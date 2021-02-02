<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function heroImage(){
        return view('admin.hero');
    }
    public function saveHeroImage(Request $request){
        $messages = [
            'required' => 'O campo :attribute  é obrigatório',
            'banner.max' => 'O banner não pode ter mais de 700 Kilobytes',
            'banner.image' => 'O banner deve ser uma imagem',
        ];
        $rules = [
            'banner' => 'required|file|image|max:700',
        ];
       
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasfile('banner')){
            $file = $request->file('banner');
            $filename = Str::random(4) . time() . '.' . $file->getClientOriginalExtension();
            $path = 'public/img/' . $filename;
            Storage::disk('local')->put($path, file_get_contents($file));
            $path = 'storage/img/' . $filename;
           
            $banner = setting('banner');
            if ($banner !=null) {
                $deletePath = Str::replaceFirst('storage', 'public', $banner);
                Storage::disk('local')->delete($deletePath);
            }

            setting(['banner' => $path]);
            
        } 


        return redirect('/admin/options/hero-image');

        }


    
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
