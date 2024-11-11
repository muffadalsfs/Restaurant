<link rel="stylesheet" href="{{asset('css/created.css')}}">
<h1> Customer Form</h1>
@if(session('error'))
    <div class="error-message" style="color: red; font-weight: bold;">
        {{ session('error') }}
    </div>
@endif
<form action="/customers" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Customer Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <select name="gender">
        <option value="M">Male</option>
        <option value="F">Female</option>
    </select>
    <button type="submit">Create Customer</button>
</form>
