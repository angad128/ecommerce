<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Cart;


class CartController extends Controller
{
    public function addToCart(Request $request)
    {
    	$this->validate($request,[
            'product_id' => 'required',
            'quantity' => 'required',
        ]);
    	$product_info = DB::table('tbl_products')
    						->where('product_id',$request->product_id)
    						->first();    	
        // array format
        Cart::add(array(
            'id' => $request->product_id,
            'name' => $product_info->product_name,
            'price' => $product_info->product_price,
            'quantity' => $request->quantity,
            'options' => array(
                'image' => $product_info->product_image
            )
        ));
    	return Redirect::to('/cart');
    }

    public function showCart()
    {
    	$cart_contents = Cart::getContent();
    	$all_published_category = DB::table('tbl_category')
    									->where('publication_status',1)
    									->get();
    	return view('pages.add_to_cart')->with(compact('cart_contents','all_published_category'));
  
    }

    public function updateCart(Request $request)
    {
        $quantity = $request->quantity;
        $id = $request->id;
        // Cart::update($id,$quantity);
        Cart::update($id, array('quantity' => $quantity));
        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item Updated from cart successfully.');
    }


    public function removeItem($id)
    {
        Cart::remove($id);
        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }

    public function clearCart()
    {
        Cart::clear();
        return redirect('/');
    }

}
