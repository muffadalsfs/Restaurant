<link rel="stylesheet" href="{{asset('css/register.css')}}">
<h1>REGISTER PAGE</h1>
<form action="register" method="post">
    @csrf
    <label for="name">NAME</label>
    <input type="text" name="name" placeholder="ENTER YOUR NAME" required>
    
    <label for="email">EMAIL</label>
    <input type="email" name="email" placeholder="ENTER YOUR EMAIL" required>
    
    <label for="password">PASSWORD</label>
    <input type="password" name="password" placeholder="ENTER YOUR PASSWORD" required>
    
    <label for="confirm_password">CONFIRM PASSWORD</label>
    <input type="password" name="confirm_password" placeholder="ENTER YOUR CONFIRM PASSWORD" required>

    <button type="submit">Register</button>
    <a href="login">Back</a>
</form>
