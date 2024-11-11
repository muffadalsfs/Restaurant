@extends('layout.app')

@section('content')
    <section id="about">
        <h2>About Us</h2>
        <p>As the hotel's 24 hrs dining option, Timpani serves delicious buffets at each meal, as well as an abundance of à la carte choices. Guests can sample dishes from Italy, China, Thailand and India while enjoying superb service in our modern dining room. A private dining room is also available for intimate social gatherings and business luncheons. Timpani was recently recognized for its food and beverage excellence with the Rocheston Distinguished Award. Conferred by Rocheston, LLC New York, the award recognizes restaurants that have consistently maintained the highest standards of food quality and service, delighting guests at every touch point. Mystery audits and guest feedback were used in the assessment of the awards.</p>
    </section>

    <section id="menu-gallery">
    <h2>Veg Gallery</h2>
    <div class="gallery veg-gallery">
        <p><img src="{{ asset('images/panner.webp') }}" alt="Paneer"><br>Paneer</p>
        <p><img src="{{ asset('images/veg thali.webp') }}" alt="Veg Thali"><br>Veg Thali</p>
        <p><img src="{{ asset('images/food.webp') }}" alt="Salad"><br>Salad</p>
    </div>

    <h2>Non-Veg Gallery</h2>
    <div class="gallery non-veg-gallery">
        <p><img src="{{ asset('images/chicken.webp') }}" alt="Chicken"><br>Chicken</p>
        <p><img src="{{ asset('images/mutton.webp') }}" alt="Mutton"><br>Mutton</p>
        <p><img src="{{ asset('images/rool.webp') }}" alt="Roll"><br>Roll</p>
    </div>
</section> 

<section id="about" class="about-section">
    <h2>About KFC</h2>
    <p>Welcome to KFC, the home of world-famous fried chicken! Founded by Colonel Sanders in 1952, KFC serves delicious, freshly-prepared meals using only the finest ingredients. Whether you're craving crispy fried chicken, mouth-watering sides, or a variety of delicious dipping sauces, KFC offers a menu that caters to everyone. We’re committed to providing quality food, excellent service, and a fun dining experience for our customers around the globe.</p>
</section>


        <section id="chefs-gallery">
            <h2>Chefs Gallery</h2>
            <div class="gallery">
                <p><img src="{{ asset('images/cheif1.webp') }}" alt="Chef 1"><br>Chef 1</p>
                <p><img src="{{ asset('images/cheif2.webp') }}" alt="Chef 2"><br>Chef 2</p>
                <p><img src="{{ asset('images/cheif3.webp') }}" alt="Chef 3"><br>Chef 3</p>
            </div>
        </section>

    </section>
    <h2>Table Booking</h2>
    <div class="booking-cards">
    @foreach($menuItems as $menuItem)
    @foreach($latestOrders as $order)
        <div class="card">
            <!-- Static Image with fixed size -->
            <img src="{{ asset('images/black.webp') }}" alt="Static Image" width="200" height="200">
            
           
            <p><strong>Customer name: {{ $order->customer->name }}<br>
                Table Owner: {{ $order->table->name }}<br>
                <h3>menu: {{ $menuItem->name }} </h3>
                Total Price: ${{ $order->total_price }}</strong></p>
   @endforeach
   @endforeach
          
        </div>
 
</div>


@endsection

