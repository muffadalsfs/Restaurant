<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Menu;

class CustomerController extends Controller
{
    public function create()
    {
        return view('created');
    }

    public function store(Request $request)
    {
        $existingCustomer = Customer::where('email', $request->email)->first();

        if ($existingCustomer && $existingCustomer->status === 'booked') {
            return redirect()->back()->with('error', 'This email is already used for a booked customer.');
        }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->user_id = Auth::id();
        $customer->save();

        return redirect('/tables');
    }

    public function delete($id)
    {
        Order::destroy($id);

        return redirect('/order/confirm');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu item not found.');
        }

        return view('edit', ['blog' => $menu]);
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu item not found.');
        }

        $menu->name = $request->name;
        $menu->type = $request->type;
        $menu->price = $request->price;
        $menu->save();

        $selectedItems = Menu::whereIn('id', $request->input('selected_items', []))->get();
        $totalPrice = $selectedItems->sum('price');

        session([
            'menu_items' => $selectedItems,
            'total_price' => $totalPrice,
            'table_id' => $request->input('table_id')
        ]);

        return redirect('/order/confirm')->with('success', 'Menu item updated successfully!');
    }
}
