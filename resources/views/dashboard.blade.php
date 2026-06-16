<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SIMPLAST</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body { background: #f4f4f4; }

        .container { display: flex; }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 260px;
            background: linear-gradient(to bottom, #10c9a3, #00997b);
            height: 100vh;
            position: fixed;
            left: 0; top: 0;
            padding: 30px 22px;
            color: white;
            overflow: auto;
            transition: 0.3s;
            z-index: 1000;
        }

        .logo { font-size: 34px; font-weight: 700; margin-bottom: 50px; transition: 0.3s; }

        .menu { list-style: none; }
        .menu li { margin-bottom: 28px; }
        .menu li a {
            text-decoration: none; color: white;
            display: flex; align-items: center; gap: 14px;
            font-size: 17px; font-weight: 500; transition: 0.3s;
        }
        .menu li a:hover { transform: translateX(5px); }
        .logout-btn { background: none; border: none; width: 100%; padding: 0; cursor: pointer; color: white; display: flex; align-items: center; gap: 14px; font-size: 17px; font-weight: 500; transition: 0.3s; text-decoration: none; }
        .logout-btn:hover { transform: translateX(5px); }

        .active-menu {
            background: rgba(255,255,255,0.15);
            padding: 10px 12px;
            border-radius: 10px;
        }

        .sidebar.close { width: 90px; }
        .sidebar.close .logo { font-size: 18px; }
        .sidebar.close .menu li a span { display: none; }

        /* ================= MAIN ================= */

        .main { margin-left: 260px; width: 100%; transition: 0.3s; }
        .main.full { margin-left: 90px; }

        /* ================= TOPBAR ================= */

        .topbar {
            height: 70px; background: white;
            display: flex; justify-content: space-between; align-items: center;
            padding: 0 30px; border-bottom: 1px solid #ddd;
        }

        .menu-toggle { font-size: 30px; color: #444; cursor: pointer; }

        .admin-profile {
            display: flex; align-items: center; gap: 10px;
            font-size: 15px; color: #444;
        }
        .admin-profile i { font-size: 28px; }

        /* ================= CONTENT ================= */

        .content { padding: 30px; }

        .title { font-size: 30px; font-weight: 700; margin-bottom: 5px; }
        .subtitle { color: #777; margin-bottom: 30px; }

        /* ================= STAT CARDS ================= */

        .item-card-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 16px;
            margin-bottom: 32px;
        }
        .item-card {
            background: #fff;
            border-radius: 12px;
            padding: 20px 16px;
            text-align: center;
            text-decoration: none;
            color: #333;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border: 2px solid transparent;
            transition: 0.2s;
            cursor: pointer;
        }
        .item-card:hover { border-color: #10c9a3; transform: translateY(-3px); box-shadow: 0 6px 16px rgba(16,201,163,0.15); }
        .item-card-icon { font-size: 32px; color: #10c9a3; margin-bottom: 10px; }
        .item-card-name { font-weight: 700; font-size: 15px; margin-bottom: 6px; }
        .item-card-stok { font-size: 13px; color: #666; }
        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 16px;
            margin-bottom: 28px;
        }

        .card {
            background: white; border-radius: 14px;
            padding: 20px; display: flex; align-items: center; gap: 15px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.06); transition: 0.3s;
        }
        .card:hover { transform: translateY(-3px); box-shadow: 0 6px 18px rgba(0,0,0,0.1); }

        .icon-box {
            width: 50px; height: 50px; border-radius: 12px;
            background: #d8f7df;
            display: flex; justify-content: center; align-items: center; flex-shrink: 0;
        }
        .icon-box i { font-size: 22px; color: #10c9a3; }
        .icon-box.blue  { background: #e8f4ff; } .icon-box.blue i  { color: #3b82f6; }
        .icon-box.yellow{ background: #fff8e1; } .icon-box.yellow i{ color: #f59e0b; }
        .icon-box.red   { background: #fff0f0; } .icon-box.red i   { color: #ef4444; }
        .icon-box.purple{ background: #f5f0ff; } .icon-box.purple i{ color: #8b5cf6; }

        .card h4 { font-size: 12px; color: #777; font-weight: 500; margin-bottom: 4px; }
        .card h2 { font-size: 22px; font-weight: 700; color: #111; }
        .card small { font-size: 11px; color: #aaa; }

        /* ================= TABLE BOX ================= */

        .grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px; }
        .grid-bottom { display: grid; grid-template-columns: 2fr 1fr; gap: 20px; }

        .table-box {
            background: white; border-radius: 14px;
            overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .table-header {
            padding: 16px 20px;
            display: flex; justify-content: space-between; align-items: center;
            border-bottom: 1px solid #eee; font-weight: 600; font-size: 15px;
        }

        .btn-lihat {
            background: #10c9a3; color: white; border: none;
            padding: 6px 14px; border-radius: 6px; font-size: 12px;
            cursor: pointer; font-family: 'Poppins', sans-serif; transition: 0.3s;
            text-decoration: none; display: inline-block;
        }
        .btn-lihat:hover { background: #0cab89; }

        table { width: 100%; border-collapse: collapse; }

        table th {
            background: #f8f8f8; padding: 13px 16px;
            font-size: 12px; text-align: left; color: #666; font-weight: 600;
        }

        table td {
            padding: 13px 16px; font-size: 13px;
            border-top: 1px solid #eee; vertical-align: middle;
        }

        /* ================= BADGE ================= */

        .badge {
            display: inline-flex; align-items: center; gap: 4px;
            padding: 4px 10px; border-radius: 6px; font-size: 11px; font-weight: 600;
        }
        .badge-green  { background: #d8f7df; color: #1ca54f; }
        .badge-yellow { background: #fff8e1; color: #f0a500; }
        .badge-red    { background: #fff0f0; color: #ef4444; }
        .badge-blue   { background: #e8f4ff; color: #3b82f6; }

        /* ================= INFO CARD ================= */

        .info-card {
            background: white; border-radius: 14px;
            padding: 22px; box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        .info-card h3 { font-size: 16px; font-weight: 600; margin-bottom: 20px; }

        .info-item { display: flex; align-items: center; gap: 14px; margin-bottom: 18px; }
        .info-icon {
            width: 42px; height: 42px; border-radius: 10px;
            background: #f0f0f0; display: flex; justify-content: center; align-items: center;
        }
        .info-icon i { font-size: 18px; color: #666; }
        .info-item small { color: #999; font-size: 11px; }
        .info-item p { font-weight: 600; margin-top: 2px; font-size: 14px; }

        /* ================= EMPTY STATE ================= */

        .empty-row td { text-align: center; padding: 30px; color: #aaa; font-size: 13px; }

        /* ================= RESPONSIVE ================= */

        @media(max-width: 1000px) {
            .grid-2, .grid-bottom { grid-template-columns: 1fr; }
        }

        @media(max-width: 768px) {
            .sidebar { width: 90px; }
            .sidebar .logo { font-size: 18px; }
            .sidebar .menu li a span { display: none; }
            .main { margin-left: 90px; }
            .main.full { margin-left: 90px; }
            .content { padding: 20px; }
        }

    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
<div class="container">

    <!-- SIDEBAR -->
    <div class="sidebar" id="sidebar">

        <div class="logo">SIMPLAST</div>

        <ul class="menu">

            <li>
                <a href="{{ route('dashboard') }}" class="active-menu">
                    <i class="bi bi-grid"></i><span>Dashboard</span>
                </a>
            </li>

            <li class="menu-title"><span>ADMIN</span></li>

            @hasrole('admin|agent')
            <li>
                <a href="{{ route('request.index') }}">
                    <i class="bi bi-box-arrow-up"></i><span>Kelola Request</span>
                </a>
            </li>
            @endauth

            @hasrole('admin')
            <li>
                <a href="{{ route('kelola-setoran') }}">
                    <i class="bi bi-wallet2"></i><span>Kelola Setoran</span>
                </a>
            </li>
            <li>
                <a href="{{ route('item.index') }}">
                    <i class="bi bi-box2"></i><span>Item</span>
                </a>
            </li>
            @endhasrole

            <li class="menu-title"><span>AGEN</span></li>

            @hasrole('admin|agent')
            <li>
                <a href="{{ route('agent.index') }}">
                    <i class="bi bi-people"></i><span>Agen & Anggota</span>
                </a>
            </li>
            @endhasrole

            @hasrole('agent')
            <li>
                <a href="{{ route('agentstok.index') }}">
                    <i class="bi bi-collection"></i><span>Stok Agen</span>
                </a>
            </li>
            <li>
                <a href="{{ route('storan-anggota.index') }}">
                    <i class="bi bi-send"></i><span>Setoran Anggota</span>
                </a>
            </li>
            @endhasrole

            @hasrole('anggota')
            <li>
                <a href="{{ route('pekerjaan.index') }}">
                    <i class="bi bi-briefcase"></i><span>Pekerjaan</span>
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
            <li class="menu-title"><span>LAINNYA</span></li>
            <li>
                <a href="{{ route('user.index') }}">
                    <i class="bi bi-person"></i><span>User</span>
                </a>
            </li>
            <li>
                <a href="{{ route('role.index') }}">
                    <i class="bi bi-key"></i><span>Role</span>
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

            {{-- ==================== ADMIN ==================== --}}
            @hasrole('admin')

            <div class="title">Dashboard Admin</div>
            <div class="subtitle">Selamat datang, {{ auth()->user()->nama_lengkap ?? auth()->user()->name }}! Berikut ringkasan sistem.</div>

            <!-- STAT CARDS -->
            <div class="card-container">
                <div class="card">
                    <div class="icon-box"><i class="bi bi-people-fill"></i></div>
                    <div>
                        <h4>Total Agen</h4>
                        <h2>{{ $totalAgen }}</h2>
                        <small>Agen terdaftar</small>
                    </div>
                </div>
                <div class="card">
                    <div class="icon-box blue"><i class="bi bi-person-badge-fill"></i></div>
                    <div>
                        <h4>Total Anggota</h4>
                        <h2>{{ $totalAnggota }}</h2>
                        <small>Anggota terdaftar</small>
                    </div>
                </div>
                <div class="card">
                    <div class="icon-box yellow"><i class="bi bi-box-seam-fill"></i></div>
                    <div>
                        <h4>Total Item</h4>
                        <h2>{{ $totalItem }}</h2>
                        <small>Jenis item</small>
                    </div>
                </div>
                <div class="card">
                    <div class="icon-box purple"><i class="bi bi-wallet-fill"></i></div>
                    <div>
                        <h4>Total Setoran</h4>
                        <h2>{{ $totalSetoran }}</h2>
                        <small>Data setoran</small>
                    </div>
                </div>
                <div class="card">
                    <div class="icon-box red"><i class="bi bi-cash-stack"></i></div>
                    <div>
                        <h4>Total Upah</h4>
                        <h2>Rp {{ number_format($totalUpah, 0, ',', '.') }}</h2>
                        <small>Dibayarkan</small>
                    </div>
                </div>
            </div>

            <!-- TABLES -->
            <div class="grid-2">

                <!-- REQUEST TERBARU -->
                <div class="table-box">
                    <div class="table-header">
                        Request Terbaru
                        <a href="{{ route('request.index') }}" class="btn-lihat">Lihat Semua</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Agen</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($requestTerbaru as $req)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $req->agent->nama_agent ?? '-' }}</td>
                                <td>{{ $req->jumlah_barang ?? '-' }}</td>
                                <td>{{ \Carbon\Carbon::parse($req->created_at)->format('d M Y') }}</td>
                                <td>
                                    @if($req->status === 'approved')
                                        <span class="badge badge-green">Disetujui</span>
                                    @elseif($req->status === 'rejected')
                                        <span class="badge badge-red">Ditolak</span>
                                    @else
                                        <span class="badge badge-yellow">Pending</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr class="empty-row"><td colspan="5">Belum ada request</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- SETORAN TERBARU -->
                <div class="table-box">
                    <div class="table-header">
                        Setoran Terbaru
                        <a href="{{ route('kelola-setoran') }}" class="btn-lihat">Lihat Semua</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Agen</th>
                                <th>Total (pcs)</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($setoranTerbaru as $stor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $stor->agent->nama_agent ?? '-' }}</td>
                                <td>{{ number_format($stor->jumlah_pcs, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($stor->tanggal_setoran)->format('d M Y') }}</td>
                                <td>
                                    <span class="badge badge-green">{{ ucfirst(str_replace('_',' ',$stor->status)) }}</span>
                                </td>
                            </tr>
                            @empty
                            <tr class="empty-row"><td colspan="5">Belum ada setoran</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            <!-- INFO SISTEM -->
            <div class="grid-bottom">
                <div></div>
                <div class="info-card">
                    <h3>Informasi Sistem</h3>
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-calendar-event"></i></div>
                        <div>
                            <small>Tanggal Hari Ini</small>
                            <p>{{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-clock"></i></div>
                        <div>
                            <small>Waktu</small>
                            <p id="clock"></p>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="info-icon"><i class="bi bi-shield-check"></i></div>
                        <div>
                            <small>Login Sebagai</small>
                            <p>Administrator</p>
                        </div>
                    </div>
                </div>
            </div>

            @endhasrole

            {{-- ==================== AGENT ==================== --}}
            @hasrole('agent')

            <div class="title">Dashboard Agen</div>
            <div class="subtitle">Selamat datang, {{ auth()->user()->nama_lengkap ?? auth()->user()->name }}!</div>

            <!-- STAT CARDS -->
            <div class="card-container">
                <div class="card">
                    <div class="icon-box blue"><i class="bi bi-people-fill"></i></div>
                    <div>
                        <h4>Total Anggota</h4>
                        <h2>{{ $totalAnggota }}</h2>
                        <small>Di bawah agen ini</small>
                    </div>
                </div>
                <div class="card">
                    <div class="icon-box yellow"><i class="bi bi-boxes"></i></div>
                    <div>
                        <h4>Total Stok</h4>
                        <h2>{{ number_format($totalStok, 0, ',', '.') }} KG</h2>
                        <small>Stok tersedia</small>
                    </div>
                </div>
                <div class="card">
                    <div class="icon-box"><i class="bi bi-send-fill"></i></div>
                    <div>
                        <h4>Setoran Anggota</h4>
                        <h2>{{ $totalSetoran }}</h2>
                        <small>Total setoran</small>
                    </div>
                </div>
                <div class="card">
                    <div class="icon-box purple"><i class="bi bi-briefcase-fill"></i></div>
                    <div>
                        <h4>Total Distribusi</h4>
                        <h2>{{ $totalDistribusi }}</h2>
                        <small>Item diberikan</small>
                    </div>
                </div>
            </div>

            <!-- ITEM CARDS -->
            <div class="subtitle" style="margin-bottom:16px;">Klik item untuk membuat request</div>
            <div class="item-card-grid">
                @foreach($items as $item)
                <a href="{{ route('request.create', ['item_id' => $item->id]) }}" class="item-card">
                    <div class="item-card-icon"><i class="bi bi-box-seam"></i></div>
                    <div class="item-card-name">{{ $item->nama_item }}</div>
                    <div class="item-card-stok">Stok: <strong>{{ number_format($item->stok, 0, ',', '.') }} karung</strong></div>
                </a>
                @endforeach
            </div>

            <!-- TABLES -->
            <div class="grid-2">

                <!-- DISTRIBUSI TERBARU -->
                <div class="table-box">
                    <div class="table-header">
                        Distribusi Terbaru
                        <a href="{{ route('agentstok.index') }}" class="btn-lihat">Lihat Semua</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Anggota</th>
                                <th>Item</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($distribusiTerbaru as $job)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $job->user->nama_lengkap ?? '-' }}</td>
                                <td><span class="badge badge-blue">{{ $job->item->nama_item ?? '-' }}</span></td>
                                <td>{{ number_format($job->jumlah, 0, ',', '.') }} KG</td>
                                <td>{{ \Carbon\Carbon::parse($job->tanggal_diberikan)->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr class="empty-row"><td colspan="5">Belum ada distribusi</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- SETORAN ANGGOTA TERBARU -->
                <div class="table-box">
                    <div class="table-header">
                        Setoran Anggota Terbaru
                        <a href="{{ route('storan-anggota.index') }}" class="btn-lihat">Lihat Semua</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Anggota</th>
                                <th>Item</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($setoranTerbaru as $stor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $stor->user->nama_lengkap ?? '-' }}</td>
                                <td>{{ $stor->item->nama_item ?? '-' }}</td>
                                <td>{{ number_format($stor->jumlah_pcs, 0, ',', '.') }} pcs</td>
                                <td>{{ \Carbon\Carbon::parse($stor->tanggal)->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr class="empty-row"><td colspan="5">Belum ada setoran</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            @endhasrole

            {{-- ==================== ANGGOTA ==================== --}}
            @hasrole('anggota')

            <div class="title">Dashboard Anggota</div>
            <div class="subtitle">Selamat datang, {{ auth()->user()->nama_lengkap ?? auth()->user()->name }}!</div>

            <!-- STAT CARDS -->
            <div class="card-container">
                <div class="card">
                    <div class="icon-box"><i class="bi bi-briefcase-fill"></i></div>
                    <div>
                        <h4>Total Pekerjaan</h4>
                        <h2>{{ $totalPekerjaan }}</h2>
                        <small>Diberikan agen</small>
                    </div>
                </div>
                <div class="card">
                    <div class="icon-box yellow"><i class="bi bi-boxes"></i></div>
                    <div>
                        <h4>Item Diterima</h4>
                        <h2>{{ number_format($totalItemDiterima, 0, ',', '.') }} KG</h2>
                        <small>Total keseluruhan</small>
                    </div>
                </div>
                <div class="card">
                    <div class="icon-box blue"><i class="bi bi-send-fill"></i></div>
                    <div>
                        <h4>Total Setoran</h4>
                        <h2>{{ $totalSetoran }}</h2>
                        <small>Data setoran</small>
                    </div>
                </div>
                <div class="card">
                    <div class="icon-box red"><i class="bi bi-cash-stack"></i></div>
                    <div>
                        <h4>Total Gaji</h4>
                        <h2>Rp {{ number_format($totalGaji, 0, ',', '.') }}</h2>
                        <small>Diterima</small>
                    </div>
                </div>
            </div>

            <!-- TABLES -->
            <div class="grid-2">

                <!-- PEKERJAAN TERBARU -->
                <div class="table-box">
                    <div class="table-header">
                        Pekerjaan Terbaru
                        <a href="{{ route('pekerjaan.index') }}" class="btn-lihat">Lihat Semua</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Agen</th>
                                <th>Item</th>
                                <th>Jumlah</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pekerjaanTerbaru as $job)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $job->agent->nama_agent ?? '-' }}</td>
                                <td><span class="badge badge-green">{{ $job->item->nama_item ?? '-' }}</span></td>
                                <td>{{ number_format($job->jumlah, 0, ',', '.') }} KG</td>
                                <td>{{ \Carbon\Carbon::parse($job->tanggal_diberikan)->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr class="empty-row"><td colspan="5">Belum ada pekerjaan</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- SETORAN TERBARU -->
                <div class="table-box">
                    <div class="table-header">
                        Setoran Terbaru
                        <a href="{{ route('storan-anggota.index') }}" class="btn-lihat">Lihat Semua</a>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Item</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($setoranTerbaru as $stor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $stor->item->nama_item ?? '-' }}</td>
                                <td>{{ number_format($stor->jumlah_pcs, 0, ',', '.') }} pcs</td>
                                <td>Rp {{ number_format($stor->total, 0, ',', '.') }}</td>
                                <td>{{ \Carbon\Carbon::parse($stor->tanggal)->format('d M Y') }}</td>
                            </tr>
                            @empty
                            <tr class="empty-row"><td colspan="5">Belum ada setoran</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

            @endhasrole

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

    function updateClock() {
        const now = new Date();
        const h = String(now.getHours()).padStart(2,'0');
        const m = String(now.getMinutes()).padStart(2,'0');
        const s = String(now.getSeconds()).padStart(2,'0');
        const el = document.getElementById("clock");
        if (el) el.innerText = `${h}:${m}:${s}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>

<script>
    @if(session('success'))
    Swal.fire({ icon: 'success', title: 'Berhasil!', text: "{{ session('success') }}", timer: 2500, showConfirmButton: false });
    @endif
    @if(session('error'))
    Swal.fire({ icon: 'error', title: 'Gagal!', text: "{{ session('error') }}" });
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
