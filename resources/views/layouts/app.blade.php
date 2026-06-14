<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyWings - Premium Airline</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --gold: #c9a84c;
            --gold-light: #f0d080;
            --black: #0a0a0a;
            --dark: #111111;
            --dark-card: #1a1a1a;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #0a0a0a;
            color: #ffffff;
        }
        /* Navbar */
        .navbar {
            background-color: rgba(0,0,0,0.98) !important;
            border-bottom: 2px solid var(--gold);
            padding: 12px 0;
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: var(--gold) !important;
            letter-spacing: 3px;
        }
        .nav-link {
            color: #cccccc !important;
            font-weight: 600;
            letter-spacing: 1px;
            margin: 0 8px;
            transition: color 0.3s;
            font-size: 0.85rem;
        }
        .nav-link:hover { color: var(--gold) !important; }
        .btn-gold {
            background-color: var(--gold);
            color: #000000;
            font-weight: 700;
            border: none;
            padding: 8px 20px;
            border-radius: 3px;
            letter-spacing: 1px;
            font-size: 0.85rem;
            transition: all 0.3s;
        }
        .btn-gold:hover {
            background-color: var(--gold-light);
            color: #000;
            transform: translateY(-2px);
        }
        .user-badge {
            background-color: var(--gold);
            color: #000;
            font-size: 0.65rem;
            padding: 2px 8px;
            border-radius: 3px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        /* Page Content */
        .page-content {
            min-height: 80vh;
            padding: 40px 0;
        }
        /* Cards */
        .luxury-card {
            background-color: #1a1a1a;
            border: 1px solid #333;
            border-radius: 5px;
            transition: border-color 0.3s;
        }
        .luxury-card:hover { border-color: var(--gold); }
        .luxury-card .card-header {
            background-color: #111;
            border-bottom: 1px solid var(--gold);
            color: var(--gold);
            font-weight: 600;
            letter-spacing: 1px;
            padding: 15px 20px;
        }
        .luxury-card .card-body { padding: 25px; }
        /* Tables */
        .luxury-table {
            color: #cccccc;
        }
        .luxury-table thead th {
            background-color: #111;
            color: var(--gold);
            border-color: #333;
            font-size: 0.8rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 12px 15px;
        }
        .luxury-table tbody tr {
            border-color: #222;
            transition: background-color 0.2s;
        }
        .luxury-table tbody tr:hover {
            background-color: #1f1f1f;
        }
        .luxury-table tbody td {
            border-color: #222;
            padding: 12px 15px;
            color: #cccccc;
            vertical-align: middle;
        }
        /* Forms */
        .luxury-input {
            background-color: #1a1a1a !important;
            border: 1px solid #333 !important;
            color: #ffffff !important;
            border-radius: 3px;
            padding: 10px 15px;
        }
        .luxury-input:focus {
            border-color: var(--gold) !important;
            box-shadow: 0 0 0 0.2rem rgba(201,168,76,0.15) !important;
            background-color: #1a1a1a !important;
            color: #ffffff !important;
        }
        .luxury-label {
            color: var(--gold);
            font-size: 0.75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 8px;
        }
        /* Buttons */
        .btn-outline-gold {
            background-color: transparent;
            color: var(--gold);
            border: 1px solid var(--gold);
            padding: 8px 20px;
            border-radius: 3px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s;
        }
        .btn-outline-gold:hover {
            background-color: var(--gold);
            color: #000;
        }
        /* Alerts */
        .alert-luxury {
            background-color: #1a1a1a;
            border: 1px solid var(--gold);
            color: var(--gold);
            border-radius: 3px;
        }
        /* Page Title */
        .page-title {
            font-family: 'Playfair Display', serif;
            color: #ffffff;
            font-size: 2rem;
            margin-bottom: 5px;
        }
        .gold-line {
            width: 60px;
            height: 2px;
            background-color: var(--gold);
            margin: 10px 0 25px;
        }
        /* Footer */
        .luxury-footer {
            background-color: #050505;
            border-top: 1px solid var(--gold);
            color: #666;
            text-align: center;
            padding: 20px;
            margin-top: 60px;
            font-size: 0.85rem;
        }
        /* Badges */
        .badge-gold {
            background-color: var(--gold);
            color: #000;
            font-weight: 700;
        }
        .badge-booked { background-color: #28a745; }
        .badge-cancelled { background-color: #dc3545; }
        .badge-checkedin { background-color: #007bff; }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">✈ SKYWINGS</a>

            <button class="navbar-toggler border-0" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    @auth
                        {{-- User Links --}}
                        <li class="nav-item">
                            <a class="nav-link" href="/user/dashboard">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/search">
                                Search Flights
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/user/tickets">
                                My Tickets
                            </a>
                        </li>
                        <li class="nav-item mx-2">
                            <span class="nav-link text-warning">
                                👤 {{ auth()->user()->name }}
                                <span class="user-badge ms-1">PASSENGER</span>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-gold" href="#"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form"
                                  action="{{ route('logout') }}"
                                  method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-gold" href="/register">
                                Book Now
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="page-content">
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <div class="luxury-footer">
        © 2024 SkyWings Premium Airline Reservation System
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init({ duration: 800, once: true });</script>

</body>
</html>