<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cars=Car::all();
        if(count($cars) > 0) {
            return response()->json(["status" => "200", "success" => true, "count" => count($cars), "data" => $cars]);
        }
        else {
            return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! no record found"]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // hàm lưu
        {
            $validation = Validator::make($request->all(),
            [
                'hãng'=>'required',
                'màu'=>'required',
                // 'name'=>'required',
                'produced_on'=>'required|date',
                'image'=>'mimes:jpeg,jpg,png,gif|max:10000'
            ]);
    
            if ($validation->fails()){
                $response=array('status'=>'error','errors'=>$validation->errors()->toArray()); 
                return response()->json($response);
            }
        //nếu dùng $this->validate() thì lấy về lỗi: $errors = $validate->errors();
    
            //kiểm tra file tồn tại
            $name='';
            
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $name=time().'_'.$file->getClientOriginalName();
                $destinationPath=public_path('car'); //project\public\car, //public_path(): trả về đường dẫn tới thư mục public
                $file->move($destinationPath, $name); //lưu hình ảnh vào thư mục public/images/cars
            } 
         
            $car= new Car();
            $car -> hãng = $request->hãng;
            $car -> màu = $request->màu;
            // $car -> name = $request->name;
            $car -> image = $name;
            $car -> produced_on = $request->produced_on;
            $car->save();
            if($car) {            
                    return response()->json(["status" => "200", "success" => true, "message" => "car record created successfully", "data" => $car]);
                }    
            else {
                    return response()->json(["status" => "failed", "success" => false, "message" => "Whoops! failed to create."]);
            }

    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
