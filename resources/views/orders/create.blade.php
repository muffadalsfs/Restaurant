<form action="/orders/store" method="POST">
    @csrf
    <label for="customer_id">Customer ID</label>
    <input type="number" name="customer_id" required>

    <label for="table_id">Table ID</label>
    <input type="number" name="table_id" required>

    <label for="selected_items">Select Menu Items</label>
    <select name="selected_items[]" multiple required>
        @foreach($menuItems as $item)
            <option value="{{ $item->id }}">{{ $item->name }} - ${{ $item->price }}</option>
        @endforeach
    </select>

    <button type="submit">Place Order</button>
</form>
