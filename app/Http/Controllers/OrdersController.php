<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Events\PaymentMade;


class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $orders = Order::all();
        return View('orders.index',[
            'orders' => $orders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->bl_release_date = null;
        $order->bl_release_user_id = 1;
        $order->freight_payer_self = true;
        $order->contract_number = $request->input('contract_number');
        $order->bl_number = $request->input('bl_number');
        $order->save();

        return redirect('orders');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return View('orders.show')->with('order',$order);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return View('orders.edit')->with('order',$order);
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
        $orderold = Order::find($id);
        if($orderold->bl_release_date == null && $orderold->freight_payer_self == true){
            $order = Order::find($id);
            $order->bl_release_date = now();
            $order->bl_release_user_id = 1;
            $order->freight_payer_self = false;
            $order->contract_number = $request->input('contract_number');
            $order->bl_number = $request->input('bl_number');
            $order->save();

            $paymentData = [
                'id' => $id,
                'bl_release_date' => $order->bl_release_date,
                'bl_release_user_id' => $order->bl_release_user_id,
                'freight_payer_self' => $order->freight_payer_self,
                'contract_number' => $order->contract_number,
                'bl_number' => $order->bl_number
            ];
    
            event(new PaymentMade($paymentData));
        }else{
            $order = Order::find($id);
            $order->contract_number = $request->input('contract_number');
            $order->bl_number = $request->input('bl_number');
            $order->save();
        }
       
        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect('orders');
    }
}
