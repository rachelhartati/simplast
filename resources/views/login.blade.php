<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIMPLAST</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <!-- LEFT -->
    <div class="left">

        <div class="left-content">
            <h1>Selamat Datang</h1>
            <div class="line"></div>
            <p>
                Sistem Informasi Manajemen <br>
                Material Plastik
            </p>
        </div>

        <div class="circle c1"></div>
        <div class="circle c2"></div>
        <div class="circle c3"></div>
        <div class="circle c4"></div>

        <div class="check-wrapper">
            <div class="check-inner">
                <i data-lucide="check"></i>
            </div>
        </div>

    </div>

    <!-- RIGHT -->
    <div class="right">

        <div class="header-center">
            <div class="logo">
                SIMPL<span>A</span>ST
            </div>
        </div>

        <div class="form-container">

            @if(session('error'))
            <div style="background:#fff0f0;color:#c0392b;border:1px solid #f5c6cb;border-radius:8px;padding:12px 16px;margin-bottom:16px;font-size:14px;display:flex;align-items:center;gap:8px;">
                <i data-lucide="alert-circle" style="width:18px;height:18px;flex-shrink:0;"></i>
                {{ session('error') }}
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <label>No Telephone <span>*</span></label>
                <input
                    type="text"
                    name="no_tlp"
                    placeholder="Masukkan no telephone"
                >

                <label>Password <span>*</span></label>
                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                >

                <button type="submit">Log in</button>

            </form>
        </div>

        <div class="footer-note">
            <i data-lucide="lock"></i>
            <span>Sistem ini aman dan hanya dapat diakses oleh pengguna yang memiliki izin</span>
        </div>

    </div>

    <!-- LUCIDE ICON -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>lucide.createIcons();</script>


</body>
</html>