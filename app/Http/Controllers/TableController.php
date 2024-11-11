<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Table;
use App\Models\Order;
class TableController extends Controller
{
    public function create()
    {
        return view('tables');
    }
    
    public function store(Request $request)
    {
        
        $tableCount = Table::count();

        // Check if the limit of 9 tables is reached
        if ($tableCount >= 9) {
            // Redirect back with an error message if the limit is reached
            return redirect()->back()->with('error', 'Table is not available. Maximum of 9 tables is already booked.');
        }
        $table = Table::where('number', $request->number)->first();  // Check if the table with the given number exists

        if ($table && $table->status === 'booked') {
            return redirect()->back()->with('error', 'This table is already booked.');
        }
        $customer=new Table();
        $customer->name=$request->name;
        $customer->number=$request->number;
        $customer->status=$request->status;
        $customer->save();

    
        return redirect('/menu');
    }
    public function index(Request $request,$id)
    {
        // Fetch all tables and check if they are booked
        $tables = Table::all();  // Assuming you have a 'Table' model
    
        // Get the booked tables (table IDs that have an order linked to them)
        $bookedTables = Order::pluck('table_id')->toArray(); // Get all table IDs from orders
    
        // Pass the tables and the booked ones to the view
        return view('tablebookingview', compact('tables', 'bookedTables'));
    }

}
