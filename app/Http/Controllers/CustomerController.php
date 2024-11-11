<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Menu;

class CustomerController extends Controller
{
    // Show the create view for the customer
    public function create()
    {
        return view('created');
    }

    // Store a new customer
    public function store(Request $request)
    {
        // Check if a customer with the given email already exists and is booked
        $existingCustomer = Customer::where('email', $request->email)->first();

        if ($existingCustomer && $existingCustomer->status === 'booked') {
            return redirect()->back()->with('error', 'This email is already used for a booked customer.');
        }

        // Create a new customer and save it
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->gender = $request->gender;
        $customer->user_id = Auth::id(); // Set the user ID of the authenticated user
        $customer->save();

        // Redirect to tables page after storing the customer
        return redirect('/tables');
    }

    // Delete an order by its ID
    public function delete($id)
    {
        // Delete the order with the given ID
        Order::destroy($id);

        // Redirect to the order confirmation page
        return redirect('/order/confirm');
    }

    // Edit a menu item
    public function edit($id)
    {
        // Find the menu item by its ID
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu item not found.');
        }

        // Return the view with the menu item data
        return view('edit', ['blog' => $menu]);
    }

    // Update a menu item
    public function update(Request $request, $id)
    {
        // Find the menu item by its ID
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu item not found.');
        }

        // Update the menu item with the request data
        $menu->name = $request->name;
        $menu->type = $request->type;
        $menu->price = $request->price;
        $menu->save();

        // Calculate the total price of selected items
        $selectedItems = Menu::whereIn('id', $request->input('selected_items', []))->get();
        $totalPrice = $selectedItems->sum('price');

        // Store updated data in the session
        session([
            'menu_items' => $selectedItems,
            'total_price' => $totalPrice,
            'table_id' => $request->input('table_id')
        ]);

        // Redirect to order confirmation page with success message
        return redirect('/order/confirm')->with('success', 'Menu item updated successfully!');
    }
}
