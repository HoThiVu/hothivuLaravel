<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\productType;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Illuminate\Pagination\LengthAwarePaginator;
class PageController extends Controller
{
public function getGioiThieu(){
    return view('banhang.gioithieu');
}
public function getLienHe(){
    return view('banhang.lienhe');
}

    //
    public function getIndex(){
        $slide = Slide::all();
        $products = Product::paginate(4);
        $new_products = Product::where('new',1)->paginate(4);
        $top_products = Product::where('promotion_price','<>')->paginate(4);
        return view('banhang.index',compact('slide','new_products','top_products','products'));
    }

    public function getLoaiSp($type){
        $loai_sp = ProductType::all();
        $sp_theoloai = Product::where('id_type',$type)->get();
        $sp_khac =  Product::where ('id_type','<>',$type)->paginate(3);
        return view ('banhang.loai-san-pham',compact('sp_theoloai', 'loai_sp', 'sp_khac'));
    }

//thêm 1 sản phẩm có id cụ thể vào model cart rồi lưu dữ liệu của model cart vào 1 session có tên cart (session được truy cập bằng thực thể Request)
    public function addToCart(Request $request,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }

    public function getChiTietSP( Request $req){
        $chitietSP = Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$chitietSP ->id_type)->paginate(3);
        $sp_sale =  Product::where ('id',$req->id)->get();
        return view('banhang.detail',compact('chitietSP','sp_tuongtu','sp_sale'));
    }

    public function getLogin(){
        return view('banhang.login');
    }
    public function getSingUp(){
        return view('banhang.singup');
    } 
    
    // public function postSingUp(Request $req){
    //     $this->validate(
    //         [
    //         'email'=>'required|email|unique,email',
    //         'password  '=>'required|min:6|max|20',
    //     ],
    //     [

    //     ])
    // }
}
