<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pekerjaan Saya - SIMPLAST</title>

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
            background: #f4f4f4;
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

        .active-menu {
            background: rgba(255, 255, 255, 0.15);
            padding: 10px 12px;
            border-radius: 10px;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 30px;
            border-bottom: 1px solid #ddd;
        }

        .menu-toggle {
            font-size: 30px;
            color: #444;
            cursor: pointer;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            color: #444;
        }

        .admin-profile i {
            font-size: 28px;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 30px;
        }

        .title {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        /* ================= SUMMARY CARDS ================= */

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 18px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.06);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            background: #d8f7df;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-shrink: 0;
        }

        .icon-box i {
            font-size: 24px;
            color: #10c9a3;
        }

        .card h4 {
            font-size: 13px;
            color: #666;
            margin-bottom: 4px;
            font-weight: 500;
        }

        .card h2 {
            font-size: 20px;
            font-weight: 700;
            color: #111;
        }

        /* ================= TABLE BOX ================= */

        .table-box {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .table-header {
            padding: 18px 22px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #eee;
        }

        .table-header h3 {
            font-size: 18px;
            font-weight: 600;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #f8f8f8;
            padding: 14px 18px;
            font-size: 13px;
            text-align: left;
            color: #666;
            font-weight: 600;
        }

        table td {
            padding: 14px 18px;
            font-size: 14px;
            border-top: 1px solid #eee;
            vertical-align: middle;
        }

        /* ================= BADGE ================= */

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            padding: 5px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
        }

        .badge-green {
            background: #d8f7df;
            color: #1ca54f;
        }

        /* ================= EMPTY STATE ================= */

        .empty-state {
            text-align: center;
            padding: 70px 20px;
            color: #aaa;
        }

        .empty-state i {
            font-size: 54px;
            margin-bottom: 16px;
            display: block;
        }

        .empty-state p {
            font-size: 15px;
        }

        /* ================= RESPONSIVE ================= */

        @media (max-width: 900px) {

            .sidebar {
                width: 90px;
            }

            .sidebar .logo {
                font-size: 18px;
            }

            .sidebar .menu li a span {
                display: none;
            }

            .main {
                margin-left: 90px;
            }

            .card-container {
                grid-template-columns: 1fr 1fr;
            }

        }

        @media (max-width: 600px) {
            .card-container {
                grid-template-columns: 1fr;
            }
        }

    </style>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<div class="container">

    <!-- SIDEBAR -->
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
                    <i class="bi bi-cash"></i>
                    <span>Rekap Upah</span>
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
            </li>
        </ul>

    </div>

    <!-- MAIN -->
    <div class="main" id="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <i class="bi bi-list menu-toggle" id="menuToggle"></i>
            <div class="admin-profile">
                <i class="bi bi-person-circle"></i>
                <span>{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</span>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="content">

            <div class="title">Pekerjaan Saya</div>
            <div class="subtitle">Daftar item yang diberikan agen kepada Anda</div>

            <!-- SUMMARY CARDS -->
            <div class="card-container">

                <div class="card">
                    <div class="icon-box">
                        <i class="bi bi-briefcase"></i>
                    </div>
                    <div>
                        <h4>Total Pekerjaan</h4>
                        <h2>{{ $pekerjaan->count() }} Tugas</h2>
                    </div>
                </div>

                <div class="card">
                    <div class="icon-box" style="background:#e8f4ff;">
                        <i class="bi bi-boxes" style="color:#3b82f6;"></i>
                    </div>
                    <div>
                        <h4>Total Item Diterima</h4>
                        <h2>{{ number_format($pekerjaan->sum('jumlah'), 0, ',', '.') }} KG</h2>
                    </div>
                </div>

                @if($pekerjaan->count() > 0)
                <div class="card">
                    <div class="icon-box" style="background:#fff8e1;">
                        <i class="bi bi-calendar-check" style="color:#f59e0b;"></i>
                    </div>
                    <div>
                        <h4>Pekerjaan Terakhir</h4>
                        <h2>{{ \Carbon\Carbon::parse($pekerjaan->first()->tanggal_diberikan)->format('d M Y') }}</h2>
                    </div>
                </div>
                @endif

            </div>

            <!-- TABLE -->
            <div class="table-box">

                <div class="table-header">
                    <h3>Riwayat Pekerjaan</h3>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Diberikan</th>
                            <th>Agen</th>
                            <th>Item</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pekerjaan as $job)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($job->tanggal_diberikan)->format('d M Y') }}</td>
                            <td>{{ $job->agent->nama_agent ?? '-' }}</td>
                            <td>
                                <span class="badge badge-green">
                                    <i class="bi bi-box-seam"></i>
                                    {{ $job->item->nama_item ?? '-' }}
                                </span>
                            </td>
                            <td>{{ number_format($job->jumlah, 0, ',', '.') }} KG</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">
                                    <i class="bi bi-briefcase"></i>
                                    <p>Belum ada pekerjaan yang diberikan</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>

        </div>

    </div>

</div>

<script>

    const menuToggle = document.getElementById("menuToggle");
    const sidebar    = document.getElementById("sidebar");
    const main       = document.getElementById("main");

    menuToggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
        main.classList.toggle("full");
    });

</script>

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
