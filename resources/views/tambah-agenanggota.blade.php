<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Agen / Anggota - SIMPLAST</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Poppins', sans-serif;
        }

        body{
            background:#f4f4f4;
        }

        .container{
            display:flex;
        }

        /* ================= SIDEBAR ================= */

        .sidebar{
            width:260px;
            background:linear-gradient(to bottom, #10c9a3, #00997b);
            height:100vh;
            position:fixed;
            left:0;
            top:0;
            padding:30px 22px;
            color:white;
            overflow:auto;
        }

        .logo{
            font-size:34px;
            font-weight:700;
            margin-bottom:50px;
        }

        .menu{
            list-style:none;
        }

        .menu li{
            margin-bottom:28px;
        }

        .menu li a{
            text-decoration:none;
            color:white;
            display:flex;
            align-items:center;
            gap:14px;
            font-size:17px;
            font-weight:500;
            transition:0.3s;
        }

        .menu li a:hover{
            transform:translateX(5px);
        }

        /* ================= ACTIVE MENU ================= */

        .active-menu{
            background:rgba(255,255,255,0.15);
            padding:12px;
            border-radius:10px;
        }

        /* ================= MAIN ================= */

        .main{
            margin-left:260px;
            width:100%;
        }

        /* ================= TOPBAR ================= */

        .topbar{
            height:70px;
            background:white;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:0 30px;
            border-bottom:1px solid #ddd;
        }

        .menu-toggle{
            font-size:30px;
            color:#444;
            cursor:pointer;
        }

        .admin-profile{
            display:flex;
            align-items:center;
            gap:10px;
            font-size:15px;
            color:#444;
        }

        .admin-profile i{
            font-size:28px;
        }

        /* ================= CONTENT ================= */

        .content{
            padding:30px;
        }

        .title{
            font-size:32px;
            font-weight:700;
            margin-bottom:5px;
        }

        .subtitle{
            color:#777;
            margin-bottom:30px;
        }

        /* ================= FORM ================= */

        .form-box{
            background:white;
            width:100%;
            padding:35px;
            border-radius:16px;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        .form-row{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:20px;
        }

        .form-group{
            margin-bottom:22px;
        }

        .form-group label{
            display:block;
            margin-bottom:10px;
            font-size:14px;
            font-weight:600;
            color:#333;
        }

        .input,
        .select{
            width:100%;
            height:52px;
            border:1px solid #ddd;
            border-radius:10px;
            padding:0 16px;
            font-size:14px;
            outline:none;
            transition:0.3s;
            background:white;
        }

        .input:focus,
        .select:focus,
        textarea:focus{
            border-color:#00997b;
        }

        textarea{
            width:100%;
            height:130px;
            border:1px solid #ddd;
            border-radius:10px;
            padding:16px;
            font-size:14px;
            outline:none;
            resize:none;
            transition:0.3s;
        }

        /* ================= BUTTON ================= */

        .button-group{
            display:flex;
            gap:15px;
            margin-top:35px;
        }

        .btn-submit{
            background:#00997b;
            color:white;
            border:none;
            padding:14px 28px;
            border-radius:10px;
            cursor:pointer;
            font-size:14px;
            font-weight:600;
            transition:0.3s;
        }

        .btn-submit:hover{
            background:#007a62;
        }

        .btn-cancel{
            background:#e5e5e5;
            color:#444;
            border:none;
            padding:14px 28px;
            border-radius:10px;
            cursor:pointer;
            font-size:14px;
            font-weight:600;
            text-decoration:none;
            transition:0.3s;
        }

        .btn-cancel:hover{
            background:#d5d5d5;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:900px){

            .sidebar{
                width:90px;
            }

            .logo{
                font-size:20px;
            }

            .menu li a span{
                display:none;
            }

            .main{
                margin-left:90px;
            }

            .form-row{
                grid-template-columns:1fr;
            }

        }

        @media(max-width:768px){

            .sidebar{
                display:none;
            }

            .main{
                margin-left:0;
            }

            .content{
                padding:20px;
            }

            .form-box{
                padding:20px;
            }

            .button-group{
                flex-direction:column;
            }

        }

    </style>
</head>

<body>

<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar">

        <div class="logo">
            SIMPLAST
        </div>

        <ul class="menu">

            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('kelola-pesanan') }}">
                    <i class="bi bi-file-earmark"></i>
                    <span>Kelola Pesanan</span>
                </a>
            </li>

            <li>
                <a href="{{ route('kelola-setoran') }}">
                    <i class="bi bi-wallet2"></i>
                    <span>Kelola Setoran</span>
                </a>
            </li>

            <li>
                <a href="{{ route('kelola-agenanggota') }}" class="active-menu">
                    <i class="bi bi-people"></i>
                    <span>Kelola Agen & Anggota</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="bi bi-cash"></i>
                    <span>Rekap Upah</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="bi bi-clock-history"></i>
                    <span>Riwayat</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li>

        </ul>

    </div>

    <!-- MAIN -->
    <div class="main">

        <!-- TOPBAR -->
        <div class="topbar">

            <i class="bi bi-list menu-toggle"></i>

            <div class="admin-profile">
                <i class="bi bi-person-circle"></i>
                Admin
            </div>

        </div>

        <!-- CONTENT -->
        <div class="content">

            <div class="title">
                Tambah Agen / Anggota
            </div>

            <div class="subtitle">
                Form input data agen atau anggota baru
            </div>

            <!-- FORM -->
            <div class="form-box">

                <form action="{{ route('simpan-agenanggota') }}" method="POST">

                    @csrf

                    <div class="form-row">

                        <!-- ROLE -->
                        <div class="form-group">

                            <label>Pilih Role</label>

                            <select name="role" class="select" required>

                                <option value="" disabled selected>
                                    Pilih role
                                </option>

                                <option value="Agen">
                                    Agen
                                </option>

                                <option value="Anggota">
                                    Anggota
                                </option>

                            </select>

                        </div>

                        <!-- NAMA -->
                        <div class="form-group">

                            <label>Nama</label>

                            <input type="text"
                                   name="nama"
                                   class="input"
                                   placeholder="Masukkan nama"
                                   required>

                        </div>

                    </div>

                    <div class="form-row">

                        <!-- NO HP -->
                        <div class="form-group">

                            <label>No HP</label>

                            <input type="text"
                                   name="no_hp"
                                   class="input"
                                   placeholder="Masukkan nomor HP"
                                   required>

                        </div>

                        <!-- PASSWORD -->
                        <div class="form-group">

                            <label>Password</label>

                            <input type="password"
                                   name="password"
                                   class="input"
                                   placeholder="Masukkan password"
                                   required>

                        </div>

                    </div>

                    <!-- ALAMAT -->
                    <div class="form-group">

                        <label>Alamat</label>

                        <textarea name="alamat"
                                  placeholder="Masukkan alamat"
                                  required></textarea>

                    </div>

                    <!-- BUTTON -->
                    <div class="button-group">

                        <button type="submit" class="btn-submit">
                            Simpan Data
                        </button>

                        <a href="{{ route('kelola-agenanggota') }}"
                           class="btn-cancel">
                            Batal
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>