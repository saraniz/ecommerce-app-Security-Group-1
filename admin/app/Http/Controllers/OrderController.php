<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    
    public function index()
    {
       
        return view('orders/odermanage');
       
    }

    
    public function order_view()
    {
        $post = Order::all();
        return view('orders.odermanage',compact('post'));
    }

    public function deleteo_post($id)
    {
        $data= Order::find($id);
        $data->delete();

        return redirect()->back();
    }

    public function edito_post($id)
    {
        $data = Order::find($id);
        return view('orders.updateorder',compact('data'));
    }

    public function updateo_post(Request $request,$id)
    {
        $post = Order::find($id);
        
        //$post->id= $request->order_id;
        $post->user_id= $request->user_id;
        $post->total_amount= $request->total_amount;
        $post->status= $request->status;
        $post->payment_method= $request->payment_method;
        $post->shipping_address= $request->shipping_address;

        $post->save();

        return redirect()->route('orders.order_view');
    }

        public function showTotalSales()
    {
        $totalSales = \App\Models\Order::sum('total_amount');

        return view('order.total_sales', compact('totalSales'));
    }

    public function order_search(Request $request)
    {
        $query = Order::query();

        if ($request->has('search') && $request->search !== null) {
        $query->where('id', 'like', '%' . $request->search . '%');
        }

        $post = $query->get();

        return view('orders.odermanage',compact('post'));
    }


   
}
