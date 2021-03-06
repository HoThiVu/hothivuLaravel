<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;

use App\Models\productType;
use App\Models\Customer;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
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


    public function getDelItemCart($id){
        $oldCart=Session::has('cart')?Session::get('cart'):null;
        $cart=new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        return redirect()->back();

    }
    // -------------------
    public function getCheckout(){
        return view('banhang.checkout');
    }
    public function postCheckout(Request $request){
        $cart=Session::get('cart');
        $customer = new Customer;
        $customer->name=$request->name;
        $customer->gender=$request->gender;
        $customer->email=$request->email;
        $customer->address=$request->address;
        $customer->phone_number=$request->phone;
        $customer->note=$request->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer=$customer->id;
        $bill->date_order=date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $request->payment_method;
        $bill->note=$request->notes;
        $bill->save();

        foreach ($cart->items as $key=>$value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill= $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity =  $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->back()->with('thongbao', 'Order sucessfully');
    }
// ----------------------------
    public function getLogin(){
        return view('banhang.login');
    }

    public function postLogin(Request $req){
        $this->validate($req,
        [
            'email'=>'required|email',
            'password'=>'required|min:6|max:20'
        ],
        [
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Không đúng định dạng email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 ký tự',
            'password.max'=>'Mật khẩu tối đa 20 ký tự'
        ]
        );
        $credentials=['email'=>$req->email,'password'=>$req->password];
        // dd($credentials);
        if(Auth::attempt($credentials)){//The attempt method will return true if authentication was successful. Otherwise, false will be returned.
            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }

    
    // -------------------------------
    public function getSingUp(){
        return view('banhang.singup');
    } 
     
    public function postSingUp(Request $req){
    	$this->validate($req,
    	['email'=>'required|email|unique:users,email',
    		'password'=>'required|min:6|max:20',
    		'name'=>'required',
    		'repassword'=>'required|same:password'
    	],
    	['email.required'=>'Vui lòng nhập email',
    	'email.email'=>'Không đúng định dạng email',
    	'email.unique'=>'Email đã có người sử  dụng',
    	'password.required'=>'Vui lòng nhập mật khẩu',
    	'repassword.same'=>'Mật khẩu không giống nhau',
    	'password.min'=>'Mật khẩu ít nhất 6 ký tự'
		]);

		$user=new User();
		$user->name=$req->name;
		$user->email=$req->email;
		$user->password=Hash::make($req->password);
		// $user->c_password=Hash::make($req->password);
     
		// $user->phone=$req->phone;
		// $user->address=$req->address;
        // $user->level=3;  //level=1: admin; level=2:kỹ thuật; level=3: khách hàng
		$user->save();
		return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
 	}
// --------------------------------------------------------
     public function getLogout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('banhang.index');
    }


}
