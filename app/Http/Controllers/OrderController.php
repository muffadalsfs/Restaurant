<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Customer;

class OrderController extends Controller
{
    public function confirm()
    {
        $orders = Order::all();
        $menuItems = Menu::all();

        return view('order', compact('orders', 'menuItems'));
    }

    public function store(Request $request)
    {
        $validPrices = Menu::pluck('price')->toArray();

        if (!in_array($request->price, $validPrices)) {
            return redirect()->back()->with('error', 'The price entered does not match the menu price.');
        }

        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->table_id = $request->table_id;
        $order->total_price = $request->price;
        $order->save();

        return redirect('/order/confirm');
    }

    public function home()
    {
        $menuItems = Menu::latest()->take(2)->get();
        $latestOrders = Order::latest()->take(2)->get();

        return view('welcome', [
            'menuItems' => $menuItems,
            'latestOrders' => $latestOrders
        ]);
    }
}
