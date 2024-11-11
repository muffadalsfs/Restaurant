<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function customer()
{
    return $this->belongsTo(Customer::class); // Assuming 'customer_id' references a 'customers' table
}

public function table()
{
    return $this->belongsTo(Table::class); // Assuming 'table_id' references a 'tables' table
}
protected $fillable = ['customer_id', 'table_id', 'total_price'];
}
