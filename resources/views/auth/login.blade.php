<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Login Admin</title>

@vite([
'resources/css/app.css',
'resources/js/app.js'
])

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center align-items-center vh-100">

<div class="col-md-5">

<div class="card shadow">

<div class="card-body p-5">

<h3 class="mb-4 text-center">

Login Admin

</h3>

<form method="POST" action={{ route('login.process') }}>

@csrf

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-4">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button class="btn btn-sumi w-100">

Login

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>