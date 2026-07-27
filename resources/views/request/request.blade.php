<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pesanan - SIMPLAST</title>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- ICON -->
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
            font-size: 14px;
        }

        .container {
            display: flex;
        }

        /* ================= SIDEBAR ================= */

        .sidebar {
            width: 220px;
            background: linear-gradient(to bottom, #10c9a3, #00997b);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding: 22px 18px;
            color: white;
            overflow: auto;
            transition: 0.3s;
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 34px;
            transition: 0.3s;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin-bottom: 18px;
        }

        .menu-title span {
            font-size: 11px;
            opacity: 0.75;
            letter-spacing: 0.5px;
        }

        .menu li a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .menu li a:hover {
            transform: translateX(5px);
        }

        .logout-btn {
            background: none;
            border: none;
            width: 100%;
            padding: 0;
            cursor: pointer;
            color: white;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 500;
            transition: 0.3s;
        }

        .logout-btn:hover {
            transform: translateX(5px);
        }

        .sidebar.close {
            width: 78px;
        }

        .sidebar.close .logo {
            font-size: 16px;
        }

        .sidebar.close .menu li a span {
            display: none;
        }

        /* ================= MAIN ================= */

        .main {
            margin-left: 220px;
            width: 100%;
            transition: 0.3s;
        }

        .main.full {
            margin-left: 78px;
        }

        /* ================= TOPBAR ================= */

        .topbar {
            height: 56px;
            background: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 22px;
            border-bottom: 1px solid #ddd;
        }

        .menu-toggle {
            font-size: 22px;
            color: #444;
            cursor: pointer;
        }

        .admin-profile {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #444;
        }

        .admin-profile i {
            font-size: 22px;
        }

        /* ================= CONTENT ================= */

        .content {
            padding: 22px;
        }

        .title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 20px;
            font-size: 13px;
        }

        /* ================= FILTER ================= */

        .filter-box {
            background: white;
            border-radius: 10px;
            padding: 12px;
            display: flex;
            gap: 14px;
            align-items: center;
            margin-bottom: 18px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .input-group {
            position: relative;
        }

        .input-group i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #999;
            font-size: 13px;
        }

        .input {
            height: 40px;
            width: 220px;
            border: 1px solid #ddd;
            border-radius: 7px;
            padding: 0 12px 0 36px;
            outline: none;
            font-size: 13px;
        }

        .select {
            height: 40px;
            width: 160px;
            border: 1px solid #ddd;
            border-radius: 7px;
            padding: 0 12px;
            outline: none;
            background: white;
            font-size: 13px;
        }

        .date-input {
            height: 40px;
            width: 160px;
            border: 1px solid #ddd;
            border-radius: 7px;
            padding: 0 12px 0 36px;
            outline: none;
            font-size: 13px;
        }

        .btn-add {
            height: 40px;
            background: #01C094;
            color: white;
            border: none;
            border-radius: 7px;
            padding: 0 16px;
            font-size: 13px;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            margin-left: auto;
            white-space: nowrap;
        }

        .btn-add:hover {
            background: #019e7a;
        }

        /* ================= TABLE ================= */

        .table-box {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #f8f8f8;
            padding: 12px 14px;
            text-align: left;
            font-size: 12px;
            color: #666;
            white-space: nowrap;
        }

        table td {
            padding: 12px 14px;
            border-top: 1px solid #eee;
            font-size: 13px;
            vertical-align: middle;
        }

        .badge {
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }

        .green {
            background: #d8f7df;
            color: #1ca54f;
        }

        .red {
            background: #ffe0e0;
            color: #d94b4b;
        }

        /* ================= ACTION BUTTON ================= */

        .action {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 6px 10px;
            border: none;
            border-radius: 6px;
            font-size: 11px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }

        .btn-view {
            background: #e8fff7;
            color: #00b386;
        }

        .btn-edit {
            background: #fff4dd;
            color: #d99a00;
        }

        .btn-delete {
            background: #ffe5e5;
            color: #e53935;
        }

        .btn-view:hover {
            background: #00b386;
            color: white;
            transform: translateY(-2px);
        }

        .btn-more {
            background: #f1f3f5;
            color: #666;
        }

        .btn-more:hover {
            background: #dfe3e6;
            color: #111;
            transform: translateY(-2px);
        }

        /* ================= FOOTER ================= */

        .table-footer {
            padding: 16px 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 12px;
            color: #777;
        }

        /* ================= PAGINATION ================= */

        .pagination {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .pagination button {
            width: 28px;
            height: 28px;
            border: none;
            border-radius: 50%;
            background: #4a4a4a;
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            transition: 0.3s;
        }

        .pagination button:hover {
            background: #222;
        }

        .page-number {
            width: 24px;
            height: 24px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 13px;
            color: #111;
            transition: 0.3s;
        }

        .page-number:hover {
            background: #efefef;
        }

        .page-number.active {
            background: #d9d9d9;
            font-weight: 600;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:768px) {

            .sidebar {
                width: 78px;
            }

            .menu li a span {
                display: none;
            }

            .logo {
                font-size: 16px;
            }

            .main {
                margin-left: 78px;
            }

            .main.full {
                margin-left: 78px;
            }

            .filter-box {
                flex-direction: column;
                align-items: stretch;
            }

            .input,
            .select,
            .date-input {
                width: 100%;
            }

            .table-box {
                overflow-x: auto;
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

        <!-- MAIN -->
        <div class="main" id="main">

            <!-- TOPBAR -->
            <div class="topbar">

                <i class="bi bi-list menu-toggle" id="menuToggle"></i>

                <div class="admin-profile">
                    <i class="bi bi-person-circle"></i>
                    Admin
                </div>

            </div>

            <!-- CONTENT -->
            <div class="content">

                <div class="title">
                    Daftar Pesanan
                </div>

                <!-- FILTER -->
                <form method="GET" action="{{ route('request.index') }}" class="filter-box">

                    <div class="input-group">
                        <i class="bi bi-search"></i>
                        <input type="text" name="search" class="input" placeholder="Cari nama agen..."
                            value="{{ request('search') }}">
                    </div>

                    <select name="status" class="select" onchange="this.form.submit()">
                        <option value="">Semua Status</option>
                        <option value="{{ \App\Models\AgentRequest::STATUS_WAITING }}"
                            {{ request('status') == \App\Models\AgentRequest::STATUS_WAITING ? 'selected' : '' }}>
                            Menunggu
                        </option>
                        <option value="{{ \App\Models\AgentRequest::STATUS_APPROVED }}"
                            {{ request('status') == \App\Models\AgentRequest::STATUS_APPROVED ? 'selected' : '' }}>
                            Disetujui
                        </option>
                        <option value="{{ \App\Models\AgentRequest::STATUS_REJECTED }}"
                            {{ request('status') == \App\Models\AgentRequest::STATUS_REJECTED ? 'selected' : '' }}>
                            Ditolak
                        </option>
                        <option value="{{ \App\Models\AgentRequest::STATUS_RECEIVED }}"
                            {{ request('status') == \App\Models\AgentRequest::STATUS_RECEIVED ? 'selected' : '' }}>
                            Diterima
                        </option>
                    </select>

                    <div class="input-group">
                        <i class="bi bi-calendar-event"></i>
                        <input type="date" name="tanggal" class="date-input"
                            value="{{ request('tanggal') }}" onchange="this.form.submit()">
                    </div>

                    @if(request('search') || request('status') || request('tanggal'))
                    <a href="{{ route('request.index') }}" class="btn-add" style="background:#6c757d;">
                        <i class="bi bi-x-lg"></i> Reset
                    </a>
                    @endif

                    @hasrole('agent|superadmin')
                    <a href="{{route('request.create')}}" class="btn-add" style="margin-left:{{ request()->hasAny(['search','status','tanggal']) ? '0' : 'auto' }}">
                        <i class="bi bi-plus-lg"></i> Tambah
                    </a>
                    @endhasrole

                </form>

                <!-- TABLE -->
                <div class="table-box">

                    <table>

                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pesan</th>
                                <th>Nama Agen</th>
                                <th>Item</th>
                                <th>Total Karung</th>
                                <th>Total Berat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($requests as $req)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$req->tanggal_request}}</td>
                                <td>{{$req->agent->nama_agent}}</td>
                                <td><span class="badge green">{{$req->item->nama_item}}</span></td>
                                <td>{{$req->jumlah_barang}}</td>
                                <td>{{$req->total}}</td>
                                <td>
                                    @if($req->isWaiting())
                                    <span class="badge" style="background:#fff8e1; color:#f59e0b; border:1px solid #fcd34d;">
                                        <i class="bi bi-hourglass-split"></i>
                                        Menunggu
                                    </span>
                                    @elseif($req->isRejected())
                                    <span class="badge" style="background:#ffe0e0; color:#d94b4b; border:1px solid #fca5a5;">
                                        <i class="bi bi-x-circle-fill"></i>
                                        Ditolak
                                    </span>
                                    @elseif($req->isApproved())
                                    <span class="badge" style="background:#d8f7df; color:#1ca54f; border:1px solid #86efac;">
                                        <i class="bi bi-check-circle-fill"></i>
                                        Disetujui
                                    </span>
                                    @elseif($req->isReceived())
                                    <span class="badge" style="background:#e0f2fe; color:#0284c7; border:1px solid #7dd3fc;">
                                        <i class="bi bi-box-seam-fill"></i>
                                        Diterima
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action">

                                        {{--
                                            Detail selalu tampil untuk admin & agent.
                                            - Admin masuk ke Detail untuk approve/reject (konfirmasi).
                                            - Agent masuk ke Detail untuk sekadar melihat requestnya.
                                        --}}
                                        <a href="{{route('request.detail', $req->id)}}" class="btn btn-add">
                                            Detail
                                        </a>

                                        {{--
                                            Edit & Hapus HANYA untuk agent (pemilik request),
                                            dan hanya selama status masih Menunggu.
                                            Admin TIDAK pernah mendapat tombol ini — tugas admin
                                            hanya approve/reject lewat halaman Detail.
                                        --}}
                                        @hasrole('agent')
                                        @if($req->isWaiting())
                                        <a href="{{route('request.edit', $req->id)}}" class="btn btn-edit">
                                            Edit
                                        </a>

                                        <form action="{{route('request.delete', $req->id)}}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus Request ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-delete">
                                                Hapus
                                            </button>
                                        </form>
                                        @endif
                                        @endhasrole

                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" style="text-align:center; padding:24px; color:#999;">
                                    Belum ada data pesanan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>

                    </table>

                    <!-- FOOTER -->
                    <div class="table-footer">

                        <div>
                            Menampilkan {{ $requests->count() }} dari {{ $requests->total() }} pesanan
                        </div>

                        @if ($requests->lastPage() > 1)
                        <div class="pagination">
                            <button onclick="window.location='{{ $requests->previousPageUrl() }}'"
                                {{ $requests->onFirstPage() ? 'disabled' : '' }}>
                                <i class="bi bi-chevron-left"></i>
                            </button>

                            @for ($i = 1; $i <= $requests->lastPage(); $i++)
                                <div class="page-number {{ $requests->currentPage() == $i ? 'active' : '' }}"
                                    onclick="window.location='{{ $requests->url($i) }}'">
                                    {{ $i }}
                                </div>
                                @endfor

                                <button onclick="window.location='{{ $requests->nextPageUrl() }}'"
                                    {{ $requests->currentPage() == $requests->lastPage() ? 'disabled' : '' }}>
                                    <i class="bi bi-chevron-right"></i>
                                </button>
                        </div>
                        @endif

                    </div>
                </div>

            </div>

        </div>

    </div>

    <script>
        const menuToggle = document.getElementById("menuToggle");
        const sidebar = document.getElementById("sidebar");
        const main = document.getElementById("main");

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
    </script>
</body>

</html>