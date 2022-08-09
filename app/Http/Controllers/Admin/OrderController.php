<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Session;
use App\Models\OrderDetail;
use App\Models\User;

class OrderController extends Controller
{
    public function orders()
    {
        $orders = Order::orderBy('id','Desc')->get();
        Session::flash('page', 'order');
        return view('admin.orders.view_orders', compact('orders'));

    }
    public function viewOrderDetails($order_id)
    {
        $orderDetails = Order::with('ordersDetails')->where('id',$order_id)->first();
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        Session::flash('page', 'order');
        return view('admin.orders.order_details', compact('orderDetails', 'userDetails'));
    }
    public function viewOrderInvoice($order_id)
    {
        $orderDetails = Order::with('ordersDetails')->where('id',$order_id)->first();
        $user_id = $orderDetails->user_id;
        $userDetails = User::where('id',$user_id)->first();
        Session::flash('page', 'order');
        return view('admin.orders.order_invoice', compact('orderDetails', 'userDetails')) ;
    }
    public function updateOrderStatus(Request $request, $id)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
           Order::where('id', $id)->update(['status'=>$data['order_status']]);
        //    $order = Order::where('id', $id)->first();
        //    $user = User::where('id',$order->user_id)->first();
        //     $data = collect(['status'=>$order->status,  'title'=>'Your oder has been', 'user'=>$user->name]);
        //     Notification::send($user, new OrderStatus($data));
            return redirect()->back()->with('success_message', 'Order Satatus has been updated sucessfully!');
        }
    }


    public function deteteOrder($id)
    {
        Order::where('id', $id)->delete();
        return redirect()->back()->with('success_message', 'Order has been deleted successfully!');
    }

}
