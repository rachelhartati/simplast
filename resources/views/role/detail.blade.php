<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Agen & Anggota - SIMPLAST</title>

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- ICON --}}
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

        .title {
            font-size: 30px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #666;
            margin-bottom: 25px;
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

        .header-action {
            display: flex;
            gap: 10px;
        }

        .search-box {
            position: relative;
        }

        .search-box input {
            padding: 10px 40px 10px 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            width: 250px;
        }

        .search-box i {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #777;
        }

        .btn-add {
            background: #01C094;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
        }

        /* ================= TABLE ================= */

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            text-align: left;
            padding: 14px;
            background: #f7f7f7;
            font-size: 14px;
        }

        table td {
            padding: 14px;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }

        .anggota-badge {
            background: #e8fff9;
            color: #01C094;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        /* ================= BUTTON AKSI ================= */

        .btn {
            padding: 7px 12px;
            border: none;
            border-radius: 6px;
            font-size: 12px;
            cursor: pointer;
        }

        .btn-view {
            background: #e8fff9;
            color: #01C094;
        }

        .btn-edit {
            background: #fff4dd;
            color: #d99a00;
        }

        .btn-delete {
            background: #ffe5e5;
            color: #e53935;
        }

        .action {
            display: flex;
            gap: 8px;
        }

        /* ================= PAGINATION ================= */

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #666;
        }

        .page-number {
            display: flex;
            gap: 8px;
        }

        .page-number a {
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 5px;
            background: #f0f0f0;
            color: #333;
            font-size: 13px;
        }

        .page-number .active {
            background: #01C094;
            color: white;
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

            .table-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .search-box input {
                width: 100%;
            }

        }

        /* ================= MODAL ================= */

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1055;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .modal.show {
            display: block;
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: 1.75rem auto;
            max-width: 500px;
            pointer-events: none;
        }

        .modal-dialog.modal-lg {
            max-width: 800px;
        }

        .modal-dialog-centered {
            display: flex;
            align-items: center;
            min-height: calc(100% - 3.5rem);
        }

        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            pointer-events: auto;
            background: #fff;
            border: 1px solid rgba(0, 0, 0, .2);
            border-radius: 10px;
            outline: 0;
        }

        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #dee2e6;
        }

        .modal-title {
            font-size: 16px;
            font-weight: 600;
        }

        .modal-body {
            padding: 1.25rem;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 8px;
            padding: 0.75rem 1.25rem;
            border-top: 1px solid #dee2e6;
        }

        .modal-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: #000;
            opacity: 0.5;
            z-index: 1050;
        }

        .btn-close {
            background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
            border: 0;
            width: 1.5rem;
            height: 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            opacity: 0.5;
        }

        .btn-close:hover {
            opacity: 0.8;
        }

        .fade {
            opacity: 0;
            transition: opacity .15s linear;
        }

        .fade.show {
            opacity: 1;
        }

        .fw-bold {
            font-weight: 700;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-size: 14px;
        }

        .form-control,
        .form-select {
            display: block;
            width: 100%;
            padding: 8px 12px;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 6px;
            outline: none;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #01C094;
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

        .text-muted {
            color: #6c757d;
            font-size: 12px;
        }

        .btn-primary {
            background: #01C094;
            color: white;
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary:hover {
            background: #019e7a;
        }

        .btn-outline-secondary {
            background: transparent;
            color: #555;
            border: 1px solid #ccc;
            padding: 8px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }

        .me-1 {
            margin-right: 4px;
        }

        .btn-outline-danger {
            background: transparent;
            color: #e53935;
            border: 1px solid #e53935;
            padding: 8px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
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

                {{-- TABLE BOX --}}
                <div class="table-box">

                    <div class="table-header">

                        <h3>Daftar Permissions</h3>

                    </div>

                    <form action="{{ route('role.permissions.update', $role->id) }}" method="POST">
                        @csrf

                        @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]"
                                value="{{ $permission->name }}" id="perm{{ $permission->id }}"
                                {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                            <label class="form-check-label" for="perm{{ $permission->id }}">
                                {{ $permission->name }}
                            </label>
                        </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Update</button>

                    </form>

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

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
