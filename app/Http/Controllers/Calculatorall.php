<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Calculatorall extends Controller
{
  
        public function Tinhtoan (Request $request ){

    
            $validator = Validator::make($request->all(),
            [
                'a'=>'required|integer',
                'b'=>'required|integer',
               
            ],
            [
                'a.required' => 'he so a bat buoc phai nhap',
                'b.required' => 'he so b bat buoc phai nhap',
                'a.integer' => 'he so a la so nguyen',
                'b.integer' => 'he so b la so nguyen',
            ]);
            if ($validator ->fails()) {
                $errors = $validator ->errors();
                    return view('Calculator')->withErrors($errors);
            }

            $a = $request-> input('a');
            $b = $request-> input('b');
            $chon = $request-> input('chon');
                    if($chon=="cong")
                        $Result=$a+$b;
                    else if($chon=="tru")
                        $Result=$a-$b;
                    else if($chon=="nhan")
                        $Result=$a*$b;
                    else if($chon=="chia")
                        $Result=$a/$b;
                
                return view('Calculator',compact('a','b','Result'));

        }
        function index(){
            return view('Calculator');
        }
}
