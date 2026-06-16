<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Item - SIMPLAST</title>

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
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 14px;
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

        /* ================= BUTTON AKSI ================= */

        .btn {
            padding: 7px 12px;
            border: none;
            border-radius: 6px;
            font-size: 12px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
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

                <div class="title">Kelola Item</div>
                <div class="subtitle">Daftar item dan harga barang yang tersedia</div>

                <div class="table-box">

                    <div class="table-header">

                        <h3>Daftar Item</h3>

                        <div class="header-action">

                            <form method="GET" action="{{ route('item.index') }}" style="display:flex;gap:10px;align-items:center;">
                                <div class="search-box">
                                    <input type="text" name="search" placeholder="Cari nama item..."
                                        value="{{ request('search') }}">
                                    <i class="bi bi-search"></i>
                                </div>

                                @if(request('search'))
                                <a href="{{ route('item.index') }}" class="btn-add" style="background:#6c757d;">
                                    <i class="bi bi-x-lg"></i> Reset
                                </a>
                                @endif
                            </form>

                            <a href="{{route('item.create')}}" class="btn-add">
                                <i class="bi bi-plus-lg"></i> Tambah
                            </a>

                        </div>

                    </div>

                    {{-- TABLE --}}
                    <table>

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Item</th>
                                <th>Harga Barang</th>
                                <th>Stok</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($item as $items)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $items->nama_item }}</td>
                                <td>Rp {{ number_format($items->harga_barang, 0, ',', '.') }}</td>
                                <td>{{$items->stok ?? '-'}}</td>
                                <td>
                                    <div class="action">
                                        <a href="{{route('item.edit', $items->id)}}" class="btn btn-edit">
                                            Edit
                                        </a>
                                        <form action="{{route('item.destroy', $items->id)}}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    {{-- PAGINATION --}}
                    <div class="pagination">

                        <span>
                            Menampilkan {{ $item->count() }} dari {{ $item->total() }} item
                        </span>

                        @if($item->lastPage() > 1)
                        <div class="page-number">

                            <a href="{{ $item->previousPageUrl() ?? '#' }}"
                                style="{{ $item->onFirstPage() ? 'pointer-events:none;opacity:0.4;' : '' }}">
                                <i class="bi bi-chevron-left"></i>
                            </a>

                            @for($i = 1; $i <= $item->lastPage(); $i++)
                            <a href="{{ $item->url($i) }}"
                                class="{{ $item->currentPage() == $i ? 'active' : '' }}">
                                {{ $i }}
                            </a>
                            @endfor

                            <a href="{{ $item->nextPageUrl() ?? '#' }}"
                                style="{{ $item->currentPage() == $item->lastPage() ? 'pointer-events:none;opacity:0.4;' : '' }}">
                                <i class="bi bi-chevron-right"></i>
                            </a>

                        </div>
                        @endif

                    </div>

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
