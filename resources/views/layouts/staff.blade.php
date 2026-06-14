<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyWings Staff Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --staff-primary: #00695c;
            --staff-dark: #004d40;
            --staff-light: #00897b;
            --staff-orange: #f4a261;
            --staff-white: #e0f2f1;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #f0f5f4;
        }
        /* Top Navbar */
        .staff-navbar {
            background: linear-gradient(135deg, #004d40, #00695c);
            border-bottom: 3px solid var(--staff-orange);
            padding: 0;
        }
        .staff-navbar .navbar-brand {
            color: #ffffff !important;
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: 2px;
            padding: 15px 25px;
            background-color: rgba(0,0,0,0.2);
            margin-right: 10px;
        }
        .staff-navbar .nav-link {
            color: var(--staff-white) !important;
            padding: 20px 15px !important;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.2s;
            border-bottom: 3px solid transparent;
            margin-bottom: -3px;
        }
        .staff-navbar .nav-link:hover {
            color: #ffffff !important;
            border-bottom-color: var(--staff-orange);
            background-color: rgba(0,0,0,0.1);
        }
        .staff-badge {
            background-color: var(--staff-orange);
            color: #000;
            font-size: 0.65rem;
            padding: 2px 8px;
            border-radius: 3px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        .staff-user-info {
            background-color: rgba(0,0,0,0.2);
            color: #ffffff;
            padding: 20px 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .btn-staff-logout {
            background-color: var(--staff-orange);
            color: #000;
            border: none;
            padding: 8px 20px;
            border-radius: 3px;
            font-weight: 700;
            font-size: 0.8rem;
            margin: 15px;
            transition: all 0.2s;
        }
        .btn-staff-logout:hover {
            background-color: #e8945a;
            transform: translateY(-1px);
        }
        /* Page Content */
        .staff-content {
            padding: 30px;
            min-height: 85vh;
        }
        /* Cards */
        .staff-card {
            background-color: #ffffff;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06);
            margin-bottom: 25px;
            overflow: hidden;
        }
        .staff-card .card-header {
            background: linear-gradient(135deg, #004d40, #00695c);
            color: #ffffff;
            padding: 15px 20px;
            font-weight: 600;
            letter-spacing: 1px;
            font-size: 0.9rem;
            border-bottom: 2px solid var(--staff-orange);
        }
        .staff-card .card-body { padding: 25px; }
        /* Stats */
        .staff-stat {
            background: linear-gradient(135deg, #004d40, #00695c);
            border-radius: 8px;
            padding: 25px;
            color: white;
            margin-bottom: 20px;
            border-left: 4px solid var(--staff-orange);
        }
        .staff-stat h2 {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--staff-orange);
        }
        /* Tables */
        .staff-table thead th {
            background-color: #e0f2f1;
            color: var(--staff-primary);
            border-color: #b2dfdb;
            font-size: 0.78rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            padding: 12px 15px;
            font-weight: 700;
        }
        .staff-table tbody td {
            border-color: #f0f0f0;
            padding: 12px 15px;
            vertical-align: middle;
            font-size: 0.88rem;
            color: #444;
        }
        .staff-table tbody tr:hover {
            background-color: #f0faf8;
        }
        /* Buttons */
        .btn-staff {
            background: linear-gradient(135deg, #004d40, #00695c);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 5px;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            transition: all 0.3s;
        }
        .btn-staff:hover {
            background: linear-gradient(135deg, #00695c, #00897b);
            color: white;
            transform: translateY(-1px);
        }
        /* PNR Input */
        .pnr-input {
            background-color: #f9fffe;
            border: 2px solid #b2dfdb;
            border-radius: 5px;
            padding: 15px 20px;
            font-size: 1.1rem;
            font-weight: 600;
            letter-spacing: 2px;
            color: #004d40;
            transition: border-color 0.3s;
        }
        .pnr-input:focus {
            border-color: var(--staff-primary);
            box-shadow: 0 0 0 0.2rem rgba(0,105,92,0.15);
        }
        /* Footer */
        .staff-footer {
            background: linear-gradient(135deg, #004d40, #00695c);
            border-top: 3px solid var(--staff-orange);
            color: var(--staff-white);
            text-align: center;
            padding: 15px;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>

    <!-- Staff Navbar -->
    <nav class="navbar navbar-expand-lg staff-navbar">
        <div class="container-fluid p-0">

            <a class="navbar-brand" href="/staff/dashboard">
                ✈ SKYWINGS
            </a>

            <button class="navbar-toggler border-0 ms-2" type="button"
                    data-bs-toggle="collapse" data-bs-target="#staffNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="staffNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/staff/dashboard">
                            🏠 Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/staff/verify">
                            🔍 Verify Ticket
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/staff/logs">
                            📋 Checkin Logs
                        </a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <span class="staff-user-info">
                            👤 {{ auth()->user()->name }}
                            <span class="staff-badge ms-2">STAFF</span>
                        </span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-staff-logout">
                                🚪 Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Content -->
    <div class="staff-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    <!-- Footer -->
    <div class="staff-footer">
        © 2024 SkyWings Staff Panel — All Rights Reserved
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>