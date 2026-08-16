<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
</head>
<body>

<h2>Login Admin Sumi Space</h2>

@if(session('error'))
<p style="color:red;">
    {{ session('error') }}
</p>
@endif

<form method="POST" action="/admin/login">

@csrf

<label>Username</label><br>
<input type="text" name="username">

<br><br>

<label>Password</label><br>
<input type="password" name="password">

<br><br>

<button type="submit">
Login
</button>

</form>

</body>
</html>