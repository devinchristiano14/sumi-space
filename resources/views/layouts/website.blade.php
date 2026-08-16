<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | Sumi Space</title>

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

</head>

<body>

@include('partials.navbar')

<main>

    @yield('content')

</main>

@include('partials.footer')

<script>

const navbar = document.querySelector(".navbar");

window.addEventListener("scroll",function(){

    if(window.scrollY>50){

        navbar.classList.add("navbar-scroll");

    }else{

        navbar.classList.remove("navbar-scroll");

    }

});

</script>

<script src="https://cdn.jsdelivr.net/npm/flatpickr">

</script>

</body>

</html>