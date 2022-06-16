<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Giaiptb1 extends Controller
{
    public function giaiptb1an (Request $request ){

        // $request->validate([
        //     'a' => 'required',
        //     'b' => 'required',
        // ],[
        //     'a.required' => 'He so a phai la so nguyen',
        //     'b.required' => 'He so b phai la so nguyen',
        // ]);

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
        if($validator ->fails()){
            $errors = $validator ->errors();
            return view('ptb1')->withErrors($errors);
        }
        $a = $request-> query('a');
        $b = $request-> query('b');
        if($a==0)
           if ($b==0)
               $kq ="phuong trinh vo nghiem xuat hien";
           else $kq ="pt vô nghiệm";
         else $kq = "phuong trinh co nghiem x =".round((-$b/$a),2);
         return view('ptb1',compact('a','b','kq'));

    }

    function index(){
        return view('ptb1');
    }
}
