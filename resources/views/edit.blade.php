<link rel="stylesheet" href="{{ asset('css/edit.css') }}">

<h1>Edit Page</h1>

<form action="/update/{{ $blog->id }}" method="POST">
    @csrf 
    @method('put')
    
    <label for="name">Write your order</label>
    <input type="text" name="name" placeholder="Enter your dish" value="{{ $blog->name }}" required>

    <label for="type">Write your Dishes</label>
    <input type="text" name="type" placeholder="Enter your dish type" value="{{ $blog->type }}" required>

    <label for="price">Enter price per list</label>
    <input type="number" name="price" placeholder="Enter your dish price" value="{{ $blog->price }}" step="0.01" required>

    <button type="submit" id="editButton">Update</button>
</form>

<script>
    // Set a timeout to hide the edit button after 5 minutes (300,000 milliseconds)
    setTimeout(function() {
        document.getElementById('editButton').style.display = 'none';
    }, 30); // 5 minutes in milliseconds
</script>
c