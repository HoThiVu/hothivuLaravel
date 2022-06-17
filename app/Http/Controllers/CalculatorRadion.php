<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class CalculatorRadion extends Controller
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
                return view('CaculatorRadio')->withErrors($errors);
        }

        $a = $request-> input('a');
        $b = $request-> input('b');
        $math = $request-> input('math');
                if($math=="cong")
                    $Result=$a+$b;
                else if($math=="tru")
                    $Result=$a-$b;
                else if($math=="nhan")
                    $Result=$a*$b;
                else if($math=="chia")
                    $Result=$a/$b;
            
            return view('CaculatorRadio',compact('a','b','Result'));

    }
    function index(){
        return view('CaculatorRadio');
    }
}
