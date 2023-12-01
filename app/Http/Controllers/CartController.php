<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;

class CartController extends Controller
{
    public function index(){
        return view('cart');
    }

    public function add_cart(Request $request, $id){
        if(Auth::id()){
            $user=Auth::user();

            $product=product::find($id);

            $cart=new cart;

            $cart->name=$user->name;
            
            $cart->email=$user->email;
            
            $cart->produc_title=$product->title;
            
            if($product->discount!=null){
                $cart->price=$product->discount;
            }
            else{
                $cart->price=$product->price;
            }
            
            $cart->image=$product->image;
            
            $cart->product_id=$product->id;
            
            $cart->quantity=$request->quantity;
            
            $cart->user_id=$user->id;

            $cart->save();

            return redirect()->back();
        }
        else{
            return redirect('login');
        }
    }

    public function show_cart(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $cart=cart::where('user_id', '=', $id)->get();

            return view('cart', compact('cart'));
        }
        else{
            return redirect('login');
        }
    }

    public function remove_cart($id){
        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back();
    }
}
