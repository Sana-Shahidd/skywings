<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyWings — Premium Airline Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
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
            border-bottom: 1px solid var(--gold);
            padding: 15px 0;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }
        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--gold) !important;
            letter-spacing: 3px;
            font-weight: 700;
        }
        .nav-link {
            color: #cccccc !important;
            font-weight: 600;
            letter-spacing: 1px;
            margin: 0 10px;
            transition: color 0.3s;
            font-size: 0.85rem;
            text-transform: uppercase;
        }
        .nav-link:hover { color: var(--gold) !important; }
        .btn-gold {
            background-color: var(--gold);
            color: #000000;
            font-weight: 700;
            border: none;
            padding: 10px 28px;
            border-radius: 2px;
            letter-spacing: 2px;
            font-size: 0.8rem;
            text-transform: uppercase;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-gold:hover {
            background-color: var(--gold-light);
            color: #000;
            transform: translateY(-2px);
        }
        .btn-outline-gold {
            background-color: transparent;
            color: var(--gold);
            border: 1px solid var(--gold);
            padding: 10px 28px;
            border-radius: 2px;
            font-weight: 700;
            letter-spacing: 2px;
            font-size: 0.8rem;
            text-transform: uppercase;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-outline-gold:hover {
            background-color: var(--gold);
            color: #000;
            transform: translateY(-2px);
        }
        /* Hero */
        .hero {
            min-height: 100vh;
            background:
                linear-gradient(rgba(0,0,0,0.80), rgba(0,0,0,0.80)),
                url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?w=1600')
                center/cover no-repeat fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 120px 20px 80px;
        }
        .hero-label {
            color: var(--gold);
            letter-spacing: 6px;
            text-transform: uppercase;
            font-size: 0.75rem;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: 4.5rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 2px;
            line-height: 1.1;
            margin-bottom: 20px;
        }
        .hero-title span { color: var(--gold); }
        .gold-line {
            width: 80px;
            height: 1px;
            background-color: var(--gold);
            margin: 20px auto;
        }
        .hero-subtitle {
            font-size: 1rem;
            color: #aaaaaa;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 40px;
            font-weight: 300;
        }
        /* Search Box */
        .search-box {
            background-color: rgba(10,10,10,0.95);
            border: 1px solid var(--gold);
            padding: 30px 40px;
            margin-top: 50px;
        }
        .search-box label {
            color: var(--gold);
            font-size: 0.7rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 8px;
            display: block;
        }
        .search-select {
            background-color: #111 !important;
            border: 1px solid #333 !important;
            color: #ffffff !important;
            padding: 14px 16px;
            border-radius: 0;
            font-size: 0.9rem;
            width: 100%;
        }
        .search-select:focus {
            border-color: var(--gold) !important;
            box-shadow: none !important;
            outline: none;
        }
        .search-select option { background-color: #111; }
        /* Stats Bar */
        .stats-bar {
            background-color: #111111;
            border-top: 1px solid #1a1a1a;
            border-bottom: 1px solid #1a1a1a;
            padding: 35px 0;
        }
        .stat-item { text-align: center; }
        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            color: var(--gold);
            font-weight: 700;
            line-height: 1;
        }
        .stat-label {
            color: #666;
            font-size: 0.7rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-top: 8px;
        }
        .stat-divider {
            border-left: 1px solid #222;
            height: 60px;
            margin: auto;
        }
        /* Sections */
        .section-label {
            color: var(--gold);
            font-size: 0.7rem;
            letter-spacing: 4px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .section-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.8rem;
            color: #ffffff;
        }
        /* Features */
        .features-section {
            padding: 100px 0;
            background-color: #0a0a0a;
        }
        .feature-card {
            background-color: #111;
            border: 1px solid #1a1a1a;
            padding: 40px 30px;
            text-align: center;
            transition: all 0.4s;
            height: 100%;
        }
        .feature-card:hover {
            border-color: var(--gold);
            transform: translateY(-8px);
        }
        .feature-icon { font-size: 3rem; margin-bottom: 20px; }
        .feature-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem;
            color: var(--gold);
            margin-bottom: 15px;
        }
        .feature-text { color: #666; font-size: 0.88rem; line-height: 1.9; }
        /* Routes Section */
        .routes-section {
            padding: 100px 0;
            background-color: #0d0d0d;
        }
        .route-card {
            background-color: #0a0a0a;
            border: 1px solid #1a1a1a;
            padding: 35px 20px;
            text-align: center;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }
        .route-card::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--gold);
            transition: width 0.4s;
        }
        .route-card:hover::before { width: 100%; }
        .route-card:hover { border-color: #333; }
        .route-flag { font-size: 2.5rem; margin-bottom: 12px; }
        .route-city {
            font-family: 'Playfair Display', serif;
            font-size: 1.4rem;
            color: #ffffff;
            margin-bottom: 5px;
        }
        .route-country {
            color: var(--gold);
            font-size: 0.7rem;
            letter-spacing: 3px;
            text-transform: uppercase;
        }
        /* Why Us */
        .why-section {
            padding: 100px 0;
            background-color: #0a0a0a;
        }
        .why-number {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            color: var(--gold);
            opacity: 0.15;
            line-height: 1;
            min-width: 70px;
        }
        .why-title {
            font-size: 1rem;
            color: #ffffff;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 8px;
            text-transform: uppercase;
        }
        .why-text { color: #666; font-size: 0.88rem; line-height: 1.9; }
        /* CTA */
        .cta-section {
            padding: 120px 0;
            background:
                linear-gradient(rgba(0,0,0,0.88), rgba(0,0,0,0.88)),
                url('https://images.unsplash.com/photo-1529074963764-98f45c47344b?w=1600')
                center/cover no-repeat fixed;
            text-align: center;
        }
        .cta-title {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: #ffffff;
            margin-bottom: 20px;
        }
        /* Footer */
        .footer {
            background-color: #050505;
            border-top: 1px solid #1a1a1a;
            padding: 70px 0 30px;
        }
        .footer-brand {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            color: var(--gold);
            letter-spacing: 3px;
            font-weight: 700;
        }
        .footer-text { color: #444; font-size: 0.85rem; line-height: 1.9; margin-top: 15px; }
        .footer-title {
            color: var(--gold);
            font-size: 0.7rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .footer-link {
            color: #444;
            text-decoration: none;
            font-size: 0.85rem;
            display: block;
            margin-bottom: 10px;
            transition: color 0.3s;
        }
        .footer-link:hover { color: var(--gold); }
        .footer-bottom {
            border-top: 1px solid #111;
            margin-top: 50px;
            padding-top: 25px;
            color: #333;
            font-size: 0.78rem;
            text-align: center;
            letter-spacing: 1px;
        }
        /* Scroll top */
        .scroll-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: var(--gold);
            color: #000;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s;
            z-index: 999;
        }
        .scroll-top:hover {
            background-color: var(--gold-light);
            color: #000;
            transform: translateY(-3px);
        }
        @media (max-width: 768px) {
            .hero-title { font-size: 2.5rem; }
            .cta-title { font-size: 2rem; }
        }
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
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#routes">Destinations</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn-gold" href="/register">Book Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section class="hero" id="home">
        <div class="container">
            <div data-aos="fade-up" data-aos-duration="1200">
                <p class="hero-label">Premium Airline Reservation System</p>
                <div class="gold-line"></div>
                <h1 class="hero-title">
                    Fly With <span>Elegance</span><br>
                    Travel in Style
                </h1>
                <p class="hero-subtitle">Your Journey Begins Here</p>
                <a href="/register" class="btn-gold me-3">Get Started</a>
                <a href="/login" class="btn-outline-gold">Login</a>
            </div>

            <!-- Quick Search -->
            <div class="row justify-content-center mt-5"
                 data-aos="fade-up" data-aos-delay="400">
                <div class="col-lg-10">
                    <div class="search-box">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-5">
                                <label>Departure City</label>
                                <select class="search-select">
                                    <option value="">Select City</option>
                                    <option>Karachi</option>
                                    <option>Lahore</option>
                                    <option>Islamabad</option>
                                    <option>Rawalpindi</option>
                                    <option>Dubai</option>
                                </select>
                            </div>
                            <div class="col-md-5">
                                <label>Arrival City</label>
                                <select class="search-select">
                                    <option value="">Select City</option>
                                    <option>Karachi</option>
                                    <option>Lahore</option>
                                    <option>Islamabad</option>
                                    <option>Rawalpindi</option>
                                    <option>Dubai</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a href="/register"
                                   class="btn-gold w-100 text-center py-3"
                                   style="display:block;">
                                    Search ✈
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Bar -->
    <section class="stats-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-md-3" data-aos="fade-up">
                    <div class="stat-item">
                        <div class="stat-number">50+</div>
                        <div class="stat-label">Daily Flights</div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-item">
                        <div class="stat-number">5</div>
                        <div class="stat-label">Destinations</div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Happy Passengers</div>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-item">
                        <div class="stat-number">99%</div>
                        <div class="stat-label">Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <p class="section-label">What We Offer</p>
                <h2 class="section-title">Premium Services</h2>
                <div class="gold-line"></div>
            </div>
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <div class="feature-card">
                        <div class="feature-icon">🔍</div>
                        <h5 class="feature-title">Smart Flight Search</h5>
                        <p class="feature-text">
                            Search available flights between major cities
                            instantly. Find the best routes and schedules
                            with ease.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">🎫</div>
                        <h5 class="feature-title">Instant E-Ticket</h5>
                        <p class="feature-text">
                            Book your ticket and receive a digital e-ticket
                            with a unique PNR code instantly on confirmation.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">✅</div>
                        <h5 class="feature-title">Easy Check-in</h5>
                        <p class="feature-text">
                            Show your PNR code to airline staff for quick
                            and seamless check-in at the airport counter.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">📋</div>
                        <h5 class="feature-title">Booking History</h5>
                        <p class="feature-text">
                            View all your past and upcoming bookings in one
                            place anytime you need from your dashboard.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="feature-icon">❌</div>
                        <h5 class="feature-title">Easy Cancellation</h5>
                        <p class="feature-text">
                            Cancel your booking anytime before departure
                            with just one click from your ticket page.
                        </p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card">
                        <div class="feature-icon">🔒</div>
                        <h5 class="feature-title">Secure & Reliable</h5>
                        <p class="feature-text">
                            Your data is fully secure. Encrypted passwords,
                            secure login and protected passenger information.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Routes -->
    <section class="routes-section" id="routes">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <p class="section-label">Where We Fly</p>
                <h2 class="section-title">Our Destinations</h2>
                <div class="gold-line"></div>
            </div>
            <div class="row g-4">
                <div class="col-6 col-md-4" data-aos="fade-up">
                    <div class="route-card">
                        <div class="route-flag">🏙</div>
                        <h5 class="route-city">Karachi</h5>
                        <p class="route-country">Pakistan</p>
                    </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="route-card">
                        <div class="route-flag">🏙</div>
                        <h5 class="route-city">Lahore</h5>
                        <p class="route-country">Pakistan</p>
                    </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="route-card">
                        <div class="route-flag">🏙</div>
                        <h5 class="route-city">Islamabad</h5>
                        <p class="route-country">Pakistan</p>
                    </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="route-card">
                        <div class="route-flag">🏙</div>
                        <h5 class="route-city">Rawalpindi</h5>
                        <p class="route-country">Pakistan</p>
                    </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="route-card">
                        <div class="route-flag">🌍</div>
                        <h5 class="route-city">Dubai</h5>
                        <p class="route-country">United Arab Emirates</p>
                    </div>
                </div>
                <div class="col-6 col-md-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="route-card">
                        <div class="route-flag">✈</div>
                        <h5 class="route-city">More Soon</h5>
                        <p class="route-country">Coming 2025</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us -->
    <section class="why-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 mb-5 mb-md-0" data-aos="fade-right">
                    <p class="section-label">Why Choose Us</p>
                    <h2 class="section-title">The SkyWings Difference</h2>
                    <div class="gold-line" style="margin:20px 0;"></div>
                    <p style="color:#555; font-size:0.9rem; line-height:1.9;">
                        We combine luxury with convenience to give you the
                        best airline reservation experience possible.
                    </p>
                </div>
                <div class="col-md-7" data-aos="fade-left">
                    <div class="d-flex mb-4">
                        <div class="why-number">01</div>
                        <div class="ms-3">
                            <h6 class="why-title">Instant Booking</h6>
                            <p class="why-text">
                                Book your flight in seconds and receive your
                                e-ticket immediately with a unique PNR code.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="why-number">02</div>
                        <div class="ms-3">
                            <h6 class="why-title">Easy Management</h6>
                            <p class="why-text">
                                View, manage and cancel your bookings anytime
                                from your personal premium dashboard.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="why-number">03</div>
                        <div class="ms-3">
                            <h6 class="why-title">Professional Staff</h6>
                            <p class="why-text">
                                Our trained airline staff verify your ticket
                                at the airport for a smooth check-in experience.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="why-number">04</div>
                        <div class="ms-3">
                            <h6 class="why-title">24/7 Access</h6>
                            <p class="why-text">
                                Access your bookings and manage your travel
                                plans anytime from anywhere in the world.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="container" data-aos="fade-up">
            <p class="section-label">Ready To Fly?</p>
            <h2 class="cta-title">Take Off With SkyWings</h2>
            <div class="gold-line"></div>
            <br>
            <p style="color:#aaa; font-size:1rem; margin-bottom:40px;">
                Join thousands of passengers who trust SkyWings
                for their premium travel experience.
            </p>
            <a href="/register" class="btn-gold me-3">Register Now</a>
            <a href="/login" class="btn-outline-gold">Login</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="footer-brand">✈ SKYWINGS</div>
                    <p class="footer-text">
                        Premium airline reservation system connecting
                        passengers to their destinations with elegance,
                        ease and reliability.
                    </p>
                </div>
                <div class="col-md-2 mb-4">
                    <h6 class="footer-title">Navigation</h6>
                    <a href="#home" class="footer-link">Home</a>
                    <a href="#features" class="footer-link">Features</a>
                    <a href="#routes" class="footer-link">Destinations</a>
                </div>
                <div class="col-md-2 mb-4">
                    <h6 class="footer-title">Account</h6>
                    <a href="/login" class="footer-link">Login</a>
                    <a href="/register" class="footer-link">Register</a>
                </div>
                <div class="col-md-4 mb-4">
                    <h6 class="footer-title">Destinations</h6>
                    <a href="#" class="footer-link">Karachi, Pakistan</a>
                    <a href="#" class="footer-link">Lahore, Pakistan</a>
                    <a href="#" class="footer-link">Islamabad, Pakistan</a>
                    <a href="#" class="footer-link">Dubai, UAE</a>
                </div>
            </div>
            <div class="footer-bottom">
                © 2024 SKYWINGS AIRLINE RESERVATION SYSTEM —
                ALL RIGHTS RESERVED
            </div>
        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#home" class="scroll-top">↑</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 900, once: true });
    </script>

</body>
</html>