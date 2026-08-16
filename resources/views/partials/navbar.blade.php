<nav class="navbar navbar-expand-lg fixed-top">

    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">

            <img src="{{ asset('assets/images/logo.png') }}" alt="Sumi Space">

        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">

                    <a class="nav-link" href="#hero">Home</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#about">Tentang</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#paket">Paket</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#price">Price List</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#gallery">Galeri</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="#faq">FAQ</a>

                </li>

                <li class="nav-item ms-lg-3">

                    <a href="{{ route('booking') }}" class="btn btn-sumi">

                        Booking Sekarang

                    </a>

                </li>

            </ul>

        </div>

    </div>

</nav>