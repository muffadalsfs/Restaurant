<link rel="stylesheet" href="{{ asset('css/menu.css') }}">

<h1>Menu</h1>
<form action="/menu/store" method="POST" onsubmit="return validateForm()">
    @csrf
    <h1>List of Menu</h1>

    <h3>Veg Dishes</h3>
    <ul>
        <li>Paneer - $90</li>
        <li>Samosa - $90</li>
        <li>Pizza - $90</li>
    </ul>

    <h3>Non-Veg Dishes</h3>
    <ul>
        <li>Chicken - $90</li>
        <li>Chicken Samosa - $90</li>
        <li>Chicken Pizza - $90</li>
    </ul>

    <label for="name">Write your order</label>
    <input type="text" name="name" placeholder="Enter your dish" required>

    <label for="type">Write your Dishes Type</label>
    <select class="type"  name="type" required>
        <option value="">Select dish type</option>
        <option value="veg">Veg</option>
        <option value="non-veg">Non-Veg</option>
        <option value="both">Both</option>
    </select>

    <label for="price">Enter price per list</label>
    <input type="number" name="price" placeholder="Enter your dish price" required min="1">

    <input type="hidden" name="table_id" value="{{ session('table_id') }}">
    <button type="submit">Confirm Selection</button>
</form>

<script src="{{asset('js/menu.js')}}"></script>
