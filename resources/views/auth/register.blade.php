<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkyWings — Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Raleway:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --gold: #c9a84c;
            --gold-light: #f0d080;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Raleway', sans-serif;
            background-color: #0a0a0a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 20px;
        }
        .register-wrapper {
            width: 100%;
            max-width: 550px;
            background-color: #0d0d0d;
            border: 1px solid var(--gold);
            padding: 50px 45px;
        }
        .register-brand {
            font-family: 'Playfair Display', serif;
            color: var(--gold);
            font-size: 1.5rem;
            letter-spacing: 3px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }
        .register-title {
            font-family: 'Playfair Display', serif;
            color: #ffffff;
            font-size: 1.8rem;
            margin-bottom: 5px;
        }
        .gold-line {
            width: 40px;
            height: 1px;
            background-color: var(--gold);
            margin: 12px 0 30px;
        }
        .form-label {
            color: var(--gold);
            font-size: 0.7rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 8px;
        }
        .form-control {
            background-color: #0a0a0a !important;
            border: 1px solid #222 !important;
            border-radius: 2px !important;
            padding: 13px 16px !important;
            color: #ffffff !important;
            font-size: 0.9rem;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: var(--gold) !important;
            box-shadow: 0 0 0 0.1rem rgba(201,168,76,0.15) !important;
        }
        .form-control::placeholder { color: #333 !important; }
        .btn-register {
            background-color: var(--gold);
            color: #000;
            border: none;
            padding: 14px;
            border-radius: 2px;
            font-weight: 700;
            font-size: 0.8rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 10px;
        }
        .btn-register:hover {
            background-color: var(--gold-light);
            transform: translateY(-1px);
        }
        .register-footer {
            margin-top: 25px;
            color: #444;
            font-size: 0.82rem;
            text-align: center;
        }
        .register-footer a {
            color: var(--gold);
            text-decoration: none;
            font-weight: 600;
        }
        .invalid-feedback { font-size: 0.78rem; }
    </style>
</head>
<body>

    <div class="register-wrapper">

        <div class="register-brand">✈ SKYWINGS</div>

        <h2 class="register-title">Create Account</h2>
        <div class="gold-line"></div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-4">
                <label class="form-label">Full Name</label>
                <input type="text" name="name"
                       class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}"
                       placeholder="Enter your full name"
                       autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Email Address</label>
                <input type="email" name="email"
                       class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}"
                       placeholder="your@email.com">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Minimum 8 characters">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation"
                       class="form-control"
                       placeholder="Repeat your password">
            </div>

            <button type="submit" class="btn-register">
                Create My Account
            </button>

        </form>

        <div class="register-footer">
            Already have an account?
            <a href="{{ route('login') }}">Login here</a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>