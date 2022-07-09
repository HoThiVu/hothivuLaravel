<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Car;
use App\Models\Manufacture;


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
        // dd($cars);
        return view('index',['cars'=>$cars]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list = \App\Models\Manufacture::all();
        return view('FormListCar',compact('list'));
        
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
                'image' =>'mimes:jpg,png,gif,jpeg|max:4000'
            ],[
                'image.mimes'=>'chi chap nhan file hinh anh',
                'image.max'=>'chi chap nhan file hinh anh duoi 2MB'
            ]);
            $file = $request->file('image');
            $name = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('img');

            $file->move($destinationPath,$name);
        }

        $this->validate($request,[
            'hãng'=>'required',
            'màu'=>'required',
            'name'=>'required',
            'produced_on'=>'required|date'
        ],[
            'màu.required'=>'ban chua nhap make',
            'hãng.required'=>'ban chua nhap mieu ta',
            // 'name.required'=>'ban chua nhap ten nsx',
            // 'image.required'=>'ban chua nhap anh',
            'produced_on.required'=>'ban chua nhap make',   
            'produced_on.date'=>'ban chua nhap make'
        ]);
        
        $car= new Car();
        $car -> hãng = $request->hãng;
        $car -> màu = $request->màu;
        // $manufacture -> name = $request->name;
        $car -> manufactures_id = $request->name;
        $car -> image = $name;
        $car -> produced_on = $request->produced_on;
        $car->save();

 
        
        return redirect()->route('cars.index')->with('thành công', 'bạn đã cập nhật thành công');
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
        $list = \App\Models\Manufacture::all();
        $car=Car::find($id);
        // $car=Car::all()
        return view('show',['car'=>$car],compact('list'));
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

   
        // return view('FormListCar',compact('list'));

        $car=Car::find($id);
        $list = \App\Models\Manufacture::all();
        return view('CarEdit',['car'=>$car], compact('list'));

        // return view('CarEdit');
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

       
        $name ='';  
     
        if ($request->hasfile('image')){
            
            $this ->validate($request,[
                'image' =>'mimes:jpg,png,gif,jpeg|max:4000'
            ],[
                'image.mimes'=>'chi chap nhan file hinh anh',
                'image.max'=>'chi chap nhan file hinh anh duoi 2MB'
            ]);
            $file = $request->file('image');
            $name = time().'_'.$file->getClientOriginalName();
            $destinationPath = public_path('img');

            $file->move($destinationPath,$name);
        }

        // $this->validate($request,[
        //     'make'=>'required',
        //     'description'=>'required',
        //     'model'=>'required',
        //     'produced_on'=>'required|date'
        // ],[
        //     'make.required'=>'ban chua nhap make',
        //     'description.required'=>'ban chua nhap mieu ta',
        //     'model.required'=>'ban chua nhap model',
        //     // 'image.required'=>'ban chua nhap anh',
        //     'produced_on.required'=>'ban chua nhap make',   
        //     'produced_on.date'=>'ban chua nhap make'
        // ]);
        // $list = \App\Models\Manufacture::all();
        $car= Car::find($id);
        $car -> hãng = $request->hãng;
        $car -> màu = $request->màu;
        // $car ->manufactures_id  = $request->name;
        // $car -> manufactures_id = $request->name;
        $car -> manufactures_id = $request->name;
        $car -> image = $name;
        $car -> produced_on = $request->produced_on;
        $car->save();

        return redirect()->route('cars.index')->with('thành công', 'bạn đã cập nhật thành công');
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

        // Car::find($id)->delete();
        $car= Car::find($id);

        $imgLink = public_path('img\\').$car->image; 
            
        if(File::exists($imgLink)) {
            File::delete($imgLink);
        }
         $car->delete();
       
        return redirect()->route('cars.index')->with('thành công', 'bạn đã xoas thành công');
    }
}
