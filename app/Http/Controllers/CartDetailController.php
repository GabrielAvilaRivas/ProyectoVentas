<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CartDetail;

class CartDetailController extends Controller
{

    public function _construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
    	$CartDetail = new CartDetail();
    	$CartDetail->cart_id = auth()->user()->cart->id;
    	$CartDetail->package_id = $request->package_id;
    	//$CartDetail->quantity = $request->quantity;
    	$CartDetail->save();

    	$notification = 'El prodcuto se ha cargado exitosamente';
    	return back()->with(compact('notification'));
    }

        public function destroy(Request $request)
    {
    	$cartDetail = CartDetail::find($request->cart_detail_id);

    	if ($cartDetail->cart_id == auth()->user()->cart->id)
    		$cartDetail->delete();

    	$notification='El pedido a sido eliminado correctamente';
    	return back()->with(compact('notification'));
    }
}
