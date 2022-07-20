<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\productType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// use Illuminate\Pagination\LengthAwarePaginator;
class PageController extends Controller
{

    //
    public function getIndex(){
        $products = Product::paginate(4);
        $new_products = Product::where('new',1)->paginate(4);
        $top_products = Product::where('promotion_price','<>')->paginate(4);
        return view('banhang.index',compact('new_products','top_products','products'));
    }

    public function productType($type)
    {
        $products_type_new = Product::where('id_type',$type)->where('new',1)->paginate(3);
        $products_type_all = Product::where('id_type',$type)->paginate(3);
        return view('banhang.product_type',compact('products_type_new','products_type_all'));
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
}
