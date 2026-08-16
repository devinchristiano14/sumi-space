<!DOCTYPE html>
<html lang="id">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>@yield('title')</title>

@vite([
'resources/css/app.css',
'resources/js/app.js'
])

<link rel="preconnect" href="https://fonts.googleapis.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

<div class="admin-wrapper">

@include('admin.sidebar')

<div class="admin-content">

@include('admin.topbar')

<div class="main-content">

@yield('content')

</div>

</div>

</div>

</body>

</html>