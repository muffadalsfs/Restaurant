<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Table;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Customer;
class OrderController extends Controller
{
    public function confirm()
{
    $order=Order::all();
  $menu=Menu::all();





    return view('order', compact('order','menu'));
 

}
public function store(Request $request){
    $validPrices = [90, 180, 270, 360, 450, 540]; 
   // Fetch all dish prices from the database (e.g., from a 'dishes' table)
   $validPrices = Menu::pluck('price')->toArray(); // Assuming 'price' is the column in your 'dishes' table

   // Check if the entered price matches a valid menu price
   if (!in_array($request->price, $validPrices)) {
       // Return with an error message if the price doesn't match
       return redirect()->back()->with('error', 'The price entered does not match the menu price.');
   } 


    $order=new Order();
    $order->customer_id=$request->customer_id;
    $order->table_id=$request->table_id;
    $order->total_price=$request->price;
     
    $order->save();
    return redirect('/order/confirm');
}
// Only assign customer_id if provided (do not automatically set to null)

public function home()
{
    // Fetch all menu items
    $menuItems = Menu::latest()->take(2)->get();

    // Fetch the latest 2 orders
    $latestOrders = Order::latest()->take(2)->get();

    // Pass both the menu items and orders to the view
    return view('welcome', ['menuItems' => $menuItems, 'latestOrders' => $latestOrders]);
}

}
