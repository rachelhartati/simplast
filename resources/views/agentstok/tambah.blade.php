<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Agen - SIMPLAST</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f5f5f5;
        }

        .container {
            display: flex;
        }

                /* ================= SIDEBAR ================= */

        .sidebar {
            width: 260px;
            background: linear-gradient(to bottom, #10c9a3, #00997b);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 30px 22px;
            color: white;
            overflow: auto;
            transition: 0.3s;
            z-index: 1000;
        }

        .logo {
            font-size: 34px;
            font-weight: 700;
            margin-bottom: 50px;
            transition: 0.3s;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 28px;
        }

        .menu li a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            gap: 14px;
            font-size: 17px;
            font-weight: 500;
            transition: 0.3s;
        }

        .menu li a:hover {
            transform: translateX(5px);
        }
        .logout-btn { background: none; border: none; width: 100%; padding: 0; cursor: pointer; color: white; display: flex; align-items: center; gap: 14px; font-size: 17px; font-weight: 500; transition: 0.3s; }
        .logout-btn:hover { transform: translateX(5px); }

        .sidebar.close {
            width: 90px;
        }

        .sidebar.close .logo {
            font-size: 18px;
        }

        .sidebar.close .menu li a span {
            display: none;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 260px;
            width: 100%;
            transition: 0.3s;
        }

        .main.full {
            margin-left: 90px;
        }

        /* ================= TOPBAR ================= */

        .topbar {
            height: 70px;
            background: white;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 25px;
        }

        .topbar-left i {
            font-size: 28px;
            color: #555;
            cursor: pointer;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #555;
            font-size: 15px;
        }

        .topbar-right i {
            font-size: 24px;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 25px;
        }

        /* ================= TABLE BOX ================= */

        .table-box {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table-header h3 {
            font-size: 22px;
        }

        /* ================= FORM ================= */

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
            font-weight: 500;
        }

        .form-control,
        .form-select {
            display: block;
            width: 100%;
            padding: 10px 12px;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            outline: none;
            font-family: 'Poppins', sans-serif;
            background: white;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #01C094;
        }

        .form-text {
            font-size: 12px;
            color: #888;
            margin-top: 4px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -8px;
        }

        .row.g-3>* {
            padding: 8px;
        }

        .col-md-6 {
            flex: 0 0 50%;
            width: 50%;
        }

        .col-md-12 {
            flex: 0 0 100%;
            width: 100%;
        }

        .form-actions {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }

        /* ================= BUTTON ================= */

        .btn {
            padding: 9px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-save {
            background: #01C094;
            color: white;
        }

        .btn-save:hover {
            background: #019e7a;
        }

        .btn-cancel {
            background: #f0f0f0;
            color: #555;
        }

        .btn-cancel:hover {
            background: #e0e0e0;
        }

        /* ================= SECTION LABEL ================= */

        .section-label {
            font-size: 13px;
            font-weight: 600;
            color: #01C094;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
            padding-bottom: 6px;
            border-bottom: 1px solid #eee;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:768px) {
            .sidebar {
                width: 90px;
            }

            .logo {
                font-size: 18px;
            }

            .menu li a span {
                display: none;
            }

            .main {
                margin-left: 90px;
            }

            .col-md-6 {
                flex: 0 0 100%;
                width: 100%;
            }
        }

    </style>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="container">

        <div class="sidebar" id="sidebar">

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

                <li class="menu-title">
                    <span>ADMIN</span>
                </li>

                @hasrole('admin|agent')
                <li>
                    <a href="{{ route('request.index') }}">
                        <i class="bi bi-box-arrow-up"></i>
                        <span>Kelola Request</span>
                    </a>
                </li>
                @endauth

                @hasrole('admin')
                <li>
                    <a href="{{ route('kelola-setoran') }}">
                        <i class="bi bi-wallet2"></i>
                        <span>Kelola Setoran</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('item.index')}}">
                        <i class="bi bi-box2"></i>
                        <span>Item</span>
                    </a>
                </li>
                @endhasrole

                <li class="menu-title">
                    <span>AGEN</span>
                </li>
                @hasrole('admin|agent')
                <li>
                    <a href="{{ route('agent.index') }}">
                        <i class="bi bi-people"></i>
                        <span>Agen & Anggota</span>
                    </a>
                </li>
                @endhasrole
                @hasrole('agent')
                 <li>
                    <a href="{{route('agentstok.index')}}">
                        <i class="bi bi-collection"></i>
                        <span>Stok Agen</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('storan-anggota.index') }}">
                        <i class="bi bi-send"></i>
                        <span>Setoran Anggota</span>
                    </a>
                </li>
                @endhasrole
                @hasrole('anggota')
                <li>
                <a href="{{ route('pekerjaan.index') }}" >
                    <i class="bi bi-briefcase"></i>
                    <span>Pekerjaan</span>
                </a>
            </li>
               @endhasrole

            @hasrole('anggota|agent')
            <li>
                <a href="{{ route('gaji.index') }}">
                    <i class="bi bi-cash"></i><span>Rekap Upah</span>
                </a>
            </li>
                @endhasrole
                @hasrole('admin')
                <li class="menu-title">
                    <span>LAINNYA</span>
                </li>

                <li>
                    <a href="{{route('user.index')}}">
                        <i class="bi bi-person"></i>
                        <span>User</span>
                    </a>
                </li>

                <li>
                    <a href="{{route('role.index')}}">
                        <i class="bi bi-key"></i>
                        <span>Role</span>
                    </a>
                </li>
                @endhasrole

                <li>
                <a href="{{ route('profile.edit') }}">
                   <i class="bi bi-person"></i><span>Profile</span>
                </a>
            </li>

            
            <li>
                <button type="button" class="logout-btn" onclick="confirmLogout()">
                    <i class="bi bi-box-arrow-right"></i><span>Logout</span>
                </button>
            </li></ul>

        </div>

        {{-- MAIN --}}
        <div class="main" id="main">

            {{-- TOPBAR --}}
            <div class="topbar">
                <div class="topbar-left">
                    <i class="bi bi-list menu-toggle" id="menuToggle"></i>
                </div>
                <div class="topbar-right">
                    <i class="bi bi-person-circle"></i>
                    <span>Admin</span>
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="content">

                <div class="table-box">

                    <div class="table-header">
                        <h3>Tambah Pekerjaan Anggota</h3>
                    </div>

                   <form action="{{ route('job.store') }}" method="POST">
                        @csrf

                        <div class="section-label">Informasi Distribusi</div>

                        <div class="row g-3">

                            {{-- Nama Agen --}}
                            <div class="col-md-6">
                                <label class="form-label">Nama Agen</label>
                                <input type="text" class="form-control" value="{{ $currentUser->agent->nama_agent }}"
                                    disabled>
                                <input type="hidden" name="agent_id" value="{{ $currentUser->agent_id }}">
                            </div>

                            {{-- Dropdown Anggota --}}
                            <div class="col-md-6">
                                <label class="form-label">Anggota</label>
                                <select class="form-select" name="user_id">
                                    <option value="" disabled selected>Pilih Anggota</option>
                                    @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Tanggal Diberikan --}}
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Diberikan</label>
                                <input type="date" class="form-control" name="tanggal_diberikan"
                                    value="{{ date('Y-m-d') }}">
                            </div>

                        </div>

                        <div class="section-label" style="margin-top: 20px;">Detail Barang</div>

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Item</label>
                                <select class="form-select" name="item_id">
                                    <option value="" disabled selected>Pilih item</option>
                                    @foreach($stok as $stoks)
                                    <option value="{{ $stoks->item->id }}">{{ $stoks->item->nama_item }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Jumlah (dalam KG)</label>
                                <input type="number" class="form-control" name="jumlah" placeholder="Masukkan jumlah"
                                    min="1" value="{{ old('jumlah') }}">
                                @error('jumlah')
                                <div style="color: red; font-size: 12px; margin-top: 4px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-save">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                            <a href="{{ route('agentstok.index') }}" class="btn btn-cancel">
                                <i class="bi bi-x-lg"></i> Batal
                            </a>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script>
        @if(session('success'))
        Swal.fire({ icon: 'success', title: 'Berhasil!', text: "{{ session('success') }}", timer: 2500, showConfirmButton: false });
        @endif
        @if(session('error'))
        Swal.fire({ icon: 'error', title: 'Gagal!', text: "{{ session('error') }}" });
        @endif
        @if(session('warning'))
        Swal.fire({ icon: 'warning', title: 'Perhatian!', text: "{{ session('warning') }}" });
        @endif
    </script>


    <script>
        // SIDEBAR TOGGLE
        const menuToggle = document.getElementById("menuToggle");
        const sidebar = document.getElementById("sidebar");
        const main = document.getElementById("main");

        menuToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            main.classList.toggle("full");
        });
    </script>
        </div>
    </div>
    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">@csrf</form>
    <script>
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Apakah kamu yakin ingin keluar?',
            icon: 'warning',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Batal',
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#6c757d',
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logoutForm').submit();
            }
        });
    }
    </script></body>

</html>
