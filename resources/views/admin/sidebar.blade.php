<div class="sidebar">

    <div class="text-center py-4">

        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" class="sidebar-logo">

    </div>

    <ul class="sidebar-menu">

        <li>
            <a href="{{ route('admin.dashboard') }}">
                📊 Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('paket.index') }}">
                📦 Paket Foto
            </a>
        </li>

        <li>
            <a href="{{ route('pricelist.index') }}">
                💰 Price List
            </a>
        </li>

        <li>
            <a href="{{ route('jadwal.index') }}">
                📅 Jadwal
            </a>
        </li>

        <li>
            <a href="{{ route('booking.index') }}">
                📋 Booking
            </a>
        </li>

        <li>
            <a href="{{ route('galeri.index') }}">
                🖼️ Galeri
            </a>
        </li>

        <li class="nav-item">

            <a
            href="{{ route('faq.index') }}"
            class="nav-link">

                <i class="bi bi-patch-question"></i>

                FAQ

            </a>

        </li>

        {{-- }}
        <li>
            <a href="{{ route(faq.index) }}>
                ❓ FAQ
            </a>
        </li>
        --}}
    </ul>

    <div class="sidebar-footer">

    <form action="{{ route('logout') }}" method="POST">

    @csrf

    <button
    class="btn btn-danger w-100">

    Logout

    </button>

    </form>

    </div>

</div>