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
    <select class="type" name="type" required>
        <option value="">Select dish type</option>
        <option value="veg">Veg</option>
        <option value="non-veg">Non-Veg</option>
        <option value="both">Both</option>
    </select>

    <label for="price">Enter price per dish</label>
    <input type="number" name="price" placeholder="Enter your dish price" required min="1">

    <input type="hidden" name="table_id" value="{{ session('table_id') }}">
    <button type="submit">Confirm Selection</button>
</form>

<script>
function validateForm() {
    // Get the values of form fields
    const name = document.querySelector('input[name="name"]').value.toLowerCase();  // Dish name
    const type = document.querySelector('select[name="type"]').value.toLowerCase();  // Dish type
    const price = parseInt(document.querySelector('input[name="price"]').value);  // Dish price

    // Predefined available menu items (lowercase for comparison)
    const availableOrder = [
        'paneer', 'samosa', 'pizza', 
        'chicken', 'chicken samosa', 'chicken pizza'
    ];

    // Predefined prices (for each dish)
    const dishPrices = {
        'paneer': 90,
        'samosa': 90,
        'pizza': 90,
        'chicken': 90,
        'chicken samosa': 90,
        'chicken pizza': 90
    };

    // Check if the dish is available in the menu
    if (!availableOrder.includes(name)) {
        alert("The selected order is not available on the menu.");
        return false;  // Prevent form submission
    }

    // Check if the price entered matches the predefined price for that dish
    if (dishPrices[name] !== price) {
        alert(`The price for ${name} is incorrect. Please enter the correct price.`);
        return false;  // Prevent form submission
    }

    // Check if the dish type is valid
    const availableDishTypes = ['veg', 'non-veg', 'both'];
    if (!availableDishTypes.includes(type)) {
        alert("Please enter a valid dish type: 'veg', 'non-veg', or 'both'.");
        return false;  // Prevent form submission
    }

    // If all checks pass, the form will be submitted
    return true;
}
</script>
