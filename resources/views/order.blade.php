@extends('layout.app')
@section('contents')
<link rel="stylesheet" href="{{ asset('css/order.css') }}">

<h3>Order Summary</h3>
<h3><a href="/customers">Book New</a></h3>
<ul class="order-list">
    @foreach($orders as $item)

        <li class="order-item">
            <!-- Static Image on the left side -->
            <div class="image-container">
                <img src="{{ asset('images/food.webp') }}" alt="Order Image">
            </div>
             
            <!-- Customer and Order Details on the right side -->
            <div class="order-details">
                <p><strong>Customer Name:</strong> {{ $item->customer->name }}</p>
                <p><strong>Table Book Owner:</strong> {{ $item->table->name }}</p>
                
                <a href="{{ url('delete', $item->id) }}" class="delete-button">Delete</a>
                <a href="{{ url('edit', $item->id) }}" class="edit-button">edit</a>
            </div>
         
        </li>
    @endforeach

</ul>

@endsection

