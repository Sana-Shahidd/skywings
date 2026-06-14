<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyWings Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --gold: #c9a84c;
            --gold-light: #f0d080;
            --black: #0a0a0a;
            --dark: #111111;
            --sidebar-width: 260px;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #0d0d0d;
            color: #ffffff;
        }
        /* Sidebar */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: var(--sidebar-width);
            background: linear-gradient(180deg, #050505 0%, #0d0d0d 100%);
            border-right: 1px solid var(--gold);
            z-index: 1000;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
        }
        .sidebar-brand {
            padding: 30px 20px;
            border-bottom: 1px solid #1a1a1a;
            text-align: center;
        }
        .sidebar-brand h4 {
            font-family: 'Playfair Display', serif;
            color: var(--gold);
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 3px;
            margin: 0;
        }
        .sidebar-brand p {
            color: #444;
            font-size: 0.65rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin: 8px 0 0;
        }
        .admin-badge-sidebar {
            background-color: var(--gold);
            color: #000;
            font-size: 0.6rem;
            padding: 3px 10px;
            letter-spacing: 2px;
            font-weight: 700;
            text-transform: uppercase;
            margin-top: 8px;
            display: inline-block;
        }
        /* Sidebar Nav */
        .sidebar-nav { padding: 25px 0; flex: 1; }
        .sidebar-nav-title {
            color: #333;
            font-size: 0.6rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            padding: 15px 25px 5px;
            font-weight: 700;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 11px 25px;
            color: #555 !important;
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.2s;
            border-left: 2px solid transparent;
            letter-spacing: 0.5px;
        }
        .sidebar-link:hover {
            background-color: rgba(201,168,76,0.05);
            color: var(--gold) !important;
            border-left-color: var(--gold);
        }
        .sidebar-link span { margin-right: 12px; font-size: 1rem; }
        /* Sidebar User */
        .sidebar-user {
            padding: 20px 25px;
            border-top: 1px solid #1a1a1a;
            background-color: #050505;
        }
        .sidebar-user p {
            color: #333;
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin: 0;
        }
        .sidebar-user h6 {
            color: var(--gold);
            font-size: 0.9rem;
            margin: 5px 0 12px;
        }
        .btn-sidebar-logout {
            background-color: transparent;
            color: #555;
            border: 1px solid #222;
            padding: 7px 15px;
            font-size: 0.75rem;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: all 0.2s;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        .btn-sidebar-logout:hover {
            border-color: var(--gold);
            color: var(--gold);
        }
        /* Main */
        .admin-main { margin-left: var(--sidebar-width); min-height: 100vh; }
        /* Topbar */
        .admin-topbar {
            background-color: #0a0a0a;
            border-bottom: 1px solid #1a1a1a;
            padding: 18px 35px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .admin-topbar h5 {
            color: var(--gold);
            font-weight: 700;
            margin: 0;
            font-size: 0.85rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }
        .topbar-right {
            color: #444;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }
        /* Content */
        .admin-content { padding: 35px; }
        /* Cards */
        .admin-card {
            background-color: #111;
            border: 1px solid #1a1a1a;
            border-radius: 3px;
            margin-bottom: 25px;
            transition: border-color 0.3s;
        }
        .admin-card:hover { border-color: #333; }
        .admin-card .card-header {
            background-color: #0a0a0a;
            border-bottom: 1px solid var(--gold);
            color: var(--gold);
            padding: 15px 20px;
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 0.78rem;
            text-transform: uppercase;
        }
        .admin-card .card-body { padding: 25px; }
        /* Stat Cards */
        .stat-card {
            border-radius: 3px;
            padding: 25px;
            color: white;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }
        .stat-card::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--gold);
            opacity: 0.3;
        }
        .stat-card h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            font-weight: 700;
            margin: 10px 0;
            color: var(--gold);
        }
        .stat-card p { opacity: 0.6; font-size: 0.75rem; letter-spacing: 2px; text-transform: uppercase; }
        /* Tables */
        .admin-table thead th {
            background-color: #0a0a0a;
            color: var(--gold);
            border-color: #1a1a1a;
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 14px 15px;
            font-weight: 700;
        }
        .admin-table tbody td {
            border-color: #1a1a1a;
            padding: 14px 15px;
            vertical-align: middle;
            font-size: 0.85rem;
            color: #888;
        }
        .admin-table tbody tr:hover { background-color: #111; }
        /* Forms */
        .admin-label {
            color: var(--gold);
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 8px;
            display: block;
        }
        .admin-input {
            background-color: #0a0a0a !important;
            border: 1px solid #222 !important;
            border-radius: 2px;
            padding: 12px 15px;
            font-size: 0.88rem;
            color: #ffffff !important;
            transition: border-color 0.3s;
            width: 100%;
        }
        .admin-input:focus {
            border-color: var(--gold) !important;
            box-shadow: 0 0 0 0.15rem rgba(201,168,76,0.1) !important;
            outline: none;
        }
        .admin-input option { background-color: #0a0a0a; }
        /* Buttons */
        .btn-admin {
            background-color: var(--gold);
            color: #000000;
            border: none;
            padding: 10px 25px;
            border-radius: 2px;
            font-weight: 700;
            font-size: 0.78rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }
        .btn-admin:hover {
            background-color: var(--gold-light);
            color: #000;
            transform: translateY(-1px);
        }
        /* Footer */
        .admin-footer {
            background-color: #0a0a0a;
            border-top: 1px solid #1a1a1a;
            padding: 20px 35px;
            color: #333;
            font-size: 0.75rem;
            text-align: center;
            letter-spacing: 1px;
        }
        /* Alerts */
        .alert-admin {
            background-color: rgba(201,168,76,0.08);
            border: 1px solid var(--gold);
            color: var(--gold);
            border-radius: 2px;
            padding: 12px 20px;
            font-size: 0.85rem;
        }
        /* Page Header */
        .page-header { margin-bottom: 30px; }
        .page-header h3 {
            font-family: 'Playfair Display', serif;
            color: #ffffff;
            font-size: 1.8rem;
            margin: 0 0 5px;
        }
        .page-header p { color: #444; font-size: 0.82rem; margin: 0; }
        .gold-line-sm {
            width: 40px;
            height: 1px;
            background-color: var(--gold);
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="admin-sidebar">
        <div class="sidebar-brand">
            <h4>✈ SKYWINGS</h4>
            <p>Control Panel</p>
            <span class="admin-badge-sidebar">Administrator</span>
        </div>

        <div class="sidebar-nav">
            <p class="sidebar-nav-title">Overview</p>
            <a href="/admin/dashboard" class="sidebar-link">
                <span>⬛</span> Dashboard
            </a>

            <p class="sidebar-nav-title">Operations</p>
            <a href="/admin/cities" class="sidebar-link">
                <span>🏙</span> Cities
            </a>
            <a href="/admin/flights" class="sidebar-link">
                <span>✈</span> Flights
            </a>
            <a href="/admin/schedules" class="sidebar-link">
                <span>📅</span> Schedules
            </a>

            <p class="sidebar-nav-title">People</p>
            <a href="/admin/users" class="sidebar-link">
                <span>👥</span> Passengers
            </a>
            <a href="/admin/staff" class="sidebar-link">
                <span>👨‍✈️</span> Staff
            </a>

            <p class="sidebar-nav-title">Records</p>
            <a href="/admin/bookings" class="sidebar-link">
                <span>🎫</span> Bookings
            </a>
        </div>

        <div class="sidebar-user">
            <p>Logged in as</p>
            <h6>{{ auth()->user()->name }}</h6>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-sidebar-logout">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <!-- Main -->
    <div class="admin-main">
        <div class="admin-topbar">
            <h5>SkyWings — Admin Control Panel</h5>
            <span class="topbar-right">
                {{ now()->format('l, d M Y') }}
            </span>
        </div>

        <div class="admin-content">
            @yield('content')
        </div>

        <div class="admin-footer">
            © 2024 SKYWINGS ADMIN PANEL — ALL RIGHTS RESERVED
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>