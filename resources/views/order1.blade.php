<link rel="stylesheet" href="{{ asset('css/order1.css') }}">
<h1>Final Order Submission Form</h1>
<div id="messages">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</div>

<div id="messages"></div>

<form  action="oder" method="post">
    @csrf
    <input type="number" name="price" placeholder="Enter your food price" required>
    <input type="number" id="customer_id" name="customer_id" placeholder="Enter your customer ID number" required>
    <input type="number" id="table_id" name="table_id" placeholder="Enter your table ID number" required>
    <button type="submit">Submit</button>
</form>


