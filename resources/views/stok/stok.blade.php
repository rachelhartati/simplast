<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Stok - SIMPLAST</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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

        .logout-btn { background: none; border: none; width: 100%; padding: 0; cursor: pointer; color: white; display: flex; align-items: center; gap: 14px; font-size: 17px; font-weight: 500; transition: 0.3s; }
        .logout-btn:hover { transform: translateX(5px); }
        .menu li a:hover {
            transform: translateX(5px);
        }

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

        /* ================= ALERT ================= */

        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background: #d8f7df;
            color: #1ca54f;
            border-left: 4px solid #1ca54f;
        }

        .alert-danger {
            background: #ffe0e0;
            color: #d94b4b;
            border-left: 4px solid #d94b4b;
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
            font-size: 20px;
            font-weight: 600;
        }

        .header-action {
            display: flex;
            gap: 10px;
            align-items: center;
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
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
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
            font-family: 'Poppins', sans-serif;
            white-space: nowrap;
        }

        .btn-add:hover {
            background: #019e7a;
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
            font-size: 13px;
            color: #666;
        }

        table td {
            padding: 14px;
            font-size: 14px;
            border-bottom: 1px solid #eee;
            vertical-align: middle;
        }

        /* ================= BADGE STOK ================= */

        .stok-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .stok-aman {
            background: #d8f7df;
            color: #1ca54f;
        }

        .stok-rendah {
            background: #fff8e1;
            color: #f0a500;
        }

        .stok-habis {
            background: #ffe0e0;
            color: #d94b4b;
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
            font-family: 'Poppins', sans-serif;
        }

        .btn-edit {
            background: #fff4dd;
            color: #d99a00;
        }

        .btn-edit:hover {
            background: #d99a00;
            color: white;
        }

        .btn-delete {
            background: #ffe5e5;
            color: #e53935;
        }

        .btn-delete:hover {
            background: #e53935;
            color: white;
        }

        .action {
            display: flex;
            gap: 8px;
        }

        /* ================= PAGINATION ================= */

        .pagination-wrap {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: #666;
        }

        .page-links {
            display: flex;
            gap: 6px;
        }

        .page-links a {
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 6px;
            background: #f0f0f0;
            color: #333;
            font-size: 13px;
        }

        .page-links .active {
            background: #01C094;
            color: white;
        }

        /* ================= EMPTY STATE ================= */

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #aaa;
        }

        .empty-state i {
            font-size: 50px;
            margin-bottom: 14px;
            display: block;
        }

        .empty-state p {
            font-size: 15px;
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
                <a href="{{ route('pekerjaan.index') }}">
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
                <form action="{{ route('logout') }}" method="POST" style="margin:0;">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="bi bi-box-arrow-right"></i><span>Logout</span>
                    </button>
                </form>
            </li>

            </ul>

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
                    <span>{{ auth()->user()->name }}</span>
                </div>
            </div>

            {{-- CONTENT --}}
            <div class="content">

                <div class="title">Kelola Stok</div>
                <div class="subtitle">Data stok barang yang tersedia di gudang</div>

                @if(session('success'))
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle-fill"></i> {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}
                    </div>
                @endif

                <div class="table-box">

                    <div class="table-header">
                        <h3>Daftar Stok Barang</h3>
                        <div class="header-action">
                            <div class="search-box">
                                <input type="text" placeholder="Cari nama item...">
                                <i class="bi bi-search"></i>
                            </div>
                            <a href="{{ route('stok.create') }}" class="btn-add">
                                <i class="bi bi-plus-lg"></i> Tambah Stok
                            </a>
                        </div>
                    </div>

                    {{-- TABLE --}}
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Item</th>
                                <th>Jumlah Stok</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($stoks as $stok)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $stok->item->nama_item ?? '-' }}</td>
                                <td>{{ number_format($stok->jumlah_barang, 0, ',', '.') }} karung</td>
                                <td>
                                    @if($stok->jumlah_barang <= 0)
                                        <span class="stok-badge stok-habis">
                                            <i class="bi bi-x-circle-fill"></i> Stok Habis
                                        </span>
                                    @elseif($stok->jumlah_barang <= 10)
                                        <span class="stok-badge stok-rendah">
                                            <i class="bi bi-exclamation-circle-fill"></i> Stok Rendah
                                        </span>
                                    @else
                                        <span class="stok-badge stok-aman">
                                            <i class="bi bi-check-circle-fill"></i> Stok Aman
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action">
                                        <a href="{{ route('stok.edit', $stok->id) }}" class="btn btn-edit">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('stok.destroy', $stok->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus stok ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">
                                    <div class="empty-state">
                                        <i class="bi bi-archive"></i>
                                        <p>Belum ada data stok</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{-- PAGINATION --}}
                    @if(isset($stoks) && method_exists($stoks, 'links'))
                    <div class="pagination-wrap">
                        <span>Menampilkan {{ $stoks->count() }} dari {{ $stoks->total() }} data</span>
                        <div class="page-links">
                            @if($stoks->onFirstPage())
                                <a href="#"><i class="bi bi-chevron-left"></i></a>
                            @else
                                <a href="{{ $stoks->previousPageUrl() }}"><i class="bi bi-chevron-left"></i></a>
                            @endif

                            @for($i = 1; $i <= $stoks->lastPage(); $i++)
                                <a href="{{ $stoks->url($i) }}" class="{{ $stoks->currentPage() == $i ? 'active' : '' }}">{{ $i }}</a>
                            @endfor

                            @if($stoks->hasMorePages())
                                <a href="{{ $stoks->nextPageUrl() }}"><i class="bi bi-chevron-right"></i></a>
                            @else
                                <a href="#"><i class="bi bi-chevron-right"></i></a>
                            @endif
                        </div>
                    </div>
                    @endif

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

</body>

</html>
