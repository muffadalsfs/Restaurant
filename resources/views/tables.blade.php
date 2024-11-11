<link rel="stylesheet" href="{{ asset('css/tables.css') }}">

<h1>Book Table</h1>
@if(session('error'))
    <div class="error-message" style="color: red; font-weight: bold;">
        {{ session('error') }}
    </div>
@endif

<form id="tableForm" action="/tables" method="POST">
    @csrf

    <input type="text" name="name" placeholder="Table Name" required>

    <input type="number" name="number" placeholder="Table Number" required id="tableNumber">

    <input type="text" name="status" placeholder="Status (e.g., Available)" required>

    <label for="ac">AC Option</label>
    <select name="ac" id="ac">
        <option value="ac">AC</option>
        <option value="non-ac">Non-AC</option>
    </select>

    <button type="submit">Create Table</button>

    <div id="error-message" style="color: red; font-weight: bold; display: none;"></div>
</form>

<script>
    // Example array of booked table numbers; replace this with data from your server
    const bookedTables = @json($bookedTables ?? []);  // Ensure $bookedTables is passed from the controller

    document.getElementById('tableForm').addEventListener('submit', function(event) {
        const tableNumber = parseInt(document.getElementById('tableNumber').value, 10);
        const errorMessage = document.getElementById('error-message');

        // Check if table number exceeds the maximum allowed
        if (tableNumber > 9) {
            event.preventDefault();
            errorMessage.style.display = 'block';
            errorMessage.textContent = 'Error: The maximum  tables is 9. .';
        } 
        // Check if the table is already booked
        else if (bookedTables.includes(tableNumber)) {
            event.preventDefault();
            errorMessage.style.display = 'block';
            errorMessage.textContent = `Error: Table number ${tableNumber} is already booked. Please choose a different table.`;
        } else {
            errorMessage.style.display = 'none';  // Hide error message if input is valid
        }
    });
</script>
