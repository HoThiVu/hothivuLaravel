<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
class Carcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // hiện thị ra toàn bộ sản phẩm
        $cars=Car::all();
        return view('index',['cars'=>$cars]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('FormListCar');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //lưu 

        $name ='';
        if ($request->hasfile('image')){
            $this ->validate($request,[
                'image' =>'mimes:jpg,png,gif,jpeg|max:2048'
            ],[
                'image.mimes'=>'chi chap nhan file hinh anh',
                'image.max'=>'chi chap nhan file hinh anh duoi 2MB'
            ]);
            $file = $request->file('image');
            $name = time().'_'.$file->getClineOriginalName();
            $destinationPath = public_path('image');

            $file ->move($destinationPath,$name);
        }

        $this->validate($request,[
            'make'=>'required',
            'description'=>'required',
            'model'=>'required',
            'image'=>'required',
            'produced_on'=>'required|date'
        ],[
            'make.required'=>'ban chua nhap make',
            'description.required'=>'ban chua nhap mieu ta',
            'model.required'=>'ban chua nhap model',
            'image.required'=>'ban chua nhap anh',
            'produced_on.required'=>'ban chua nhap make',   
            'produced_on.date'=>'ban chua nhap make'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //hiện thị ra chi tiết sẳn phẩm
        $car=Car::find($id);
        // $car=Car::all()
        return view('show',['car'=>$car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //show ra view sửa, 
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
        //request để lấy giá trị từ  các ô input
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //xóa
    }
}
