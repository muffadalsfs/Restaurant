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

        if ($tableCount >= 9) {
            return redirect()->back()->with('error', 'Table is not available. Maximum of 9 tables is already booked.');
        }

        $table = Table::where('number', $request->number)->first();

        if ($table && $table->status === 'booked') {
            return redirect()->back()->with('error', 'This table is already booked.');
        }

        $customer = new Table();
        $customer->name = $request->name;
        $customer->number = $request->number;
        $customer->status = $request->status;
        $customer->save();

        return redirect('/menu');
    }

    public function index(Request $request, $id)
    {
        $tables = Table::all();
        $bookedTables = Order::pluck('table_id')->toArray();

        return view('tablebookingview', compact('tables', 'bookedTables'));
    }
}
