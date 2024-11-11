<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function showMenu()
    {
        return view('menu');
    }

    public function storeSelection(Request $request)
    {
        $selectedItems = Menu::whereIn('id', $request->input('selected_items', []))->get();
        $totalPrice = $selectedItems->sum('price');

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->type = $request->type;
        $menu->price = $request->price;
        $menu->save();

        session([
            'menu_items' => $selectedItems,
            'total_price' => $totalPrice,
            'table_id' => $request->input('table_id')
        ]);

        return redirect('oder1');
    }

    public function create()
    {
        $menuItems = Menu::all();
        return view('orders.create', compact('menuItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'table_id' => 'required|exists:tables,id',
            'selected_items' => 'required|array',
            'selected_items.*' => 'exists:menu,id'
        ]);

        $selectedItems = Menu::whereIn('id', $request->input('selected_items'))->get();
        $totalPrice = $selectedItems->sum('price');

        $order = Order::create([
            'customer_id' => $request->customer_id,
            'table_id' => $request->table_id,
            'total_price' => $totalPrice
        ]);

        return redirect()->route('order.confirm')->with('success', 'Order placed successfully!');
    }
}
