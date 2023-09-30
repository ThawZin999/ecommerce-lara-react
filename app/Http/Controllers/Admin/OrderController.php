<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function all() {
        $order = ProductOrder::with('user','product');

         if(request()->status){
            $status = request()->status;
            $order->where('status',$status);
         }

        $order = $order->latest()->paginate(10);
        return view('admin.order.all', compact('order'));
    }

    public function changeOrderStatus() {
        $id = request()->id;
        $status = request()->status;
        $product_order = ProductOrder::where('id',$id);
        $order_qty = $product_order->first()->total_quantity;
        $product_id = Product::where('id',$product_order->first()->product_id);
        $total_quantity = $product_id->first()->total_quantity;


        $product_order->update([
            'status' => $status
        ]);

        $product_id->update([
            'total_quantity' => $total_quantity - $order_qty
        ]);

        return redirect('/admin/order')->with('success',"Order Status Changed.");
    }
}
