<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Setoran - SIMPLAST</title>

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
            transition:0.3s;
            z-index:1000;
        }

        .logo{
            font-size:34px;
            font-weight:700;
            margin-bottom:50px;
            transition:0.3s;
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
        .logout-btn { background: none; border: none; width: 100%; padding: 0; cursor: pointer; color: white; display: flex; align-items: center; gap: 14px; font-size: 17px; font-weight: 500; transition: 0.3s; }
        .logout-btn:hover { transform: translateX(5px); }

        /* ================= MAIN ================= */

        .main{
            margin-left:260px;
            width:100%;
            transition:0.3s;
        }

        /* ================= SIDEBAR CLOSE ================= */

        .sidebar.close{
            width:90px;
        }

        .sidebar.close .logo{
            font-size:18px;
        }

        .sidebar.close .menu li a span{
            display:none;
        }

        .main.full{
            margin-left:90px;
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

        /* ================= FILTER ================= */

        .filter-box{
            background:white;
            border-radius:12px;
            padding:16px;
            display:flex;
            gap:20px;
            align-items:center;
            margin-bottom:25px;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
            flex-wrap:wrap;
            justify-content:space-between;
        }

        .filter-left{
            display:flex;
            gap:20px;
            align-items:center;
            flex-wrap:wrap;
        }

        .input-group{
            position:relative;
        }

        .input-group i{
            position:absolute;
            left:14px;
            top:50%;
            transform:translateY(-50%);
            color:#999;
        }

        .select{
            height:48px;
            width:220px;
            border:1px solid #ddd;
            border-radius:8px;
            padding:0 14px;
            outline:none;
            background:white;
            font-size:14px;
        }

        .date-input{
            height:48px;
            width:200px;
            border:1px solid #ddd;
            border-radius:8px;
            padding:0 14px;
            outline:none;
            font-size:14px;
        }

        /* ================= BUTTON ================= */

        .btn{
            height:48px;
            background:#00997b;
            color:white;
            border:none;
            padding:0 20px;
            border-radius:8px;
            cursor:pointer;
            font-weight:500;
            font-size:14px;
            display:flex;
            align-items:center;
            gap:8px;
            transition:0.3s;
        }

        .btn:hover{
            background:#00806a;
        }

        /* ================= TABLE ================= */

        .table-box{
            background:white;
            border-radius:16px;
            overflow:hidden;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        table th{
            background:#f8f8f8;
            padding:16px;
            text-align:left;
            font-size:13px;
            color:#666;
        }

        table td{
            padding:16px;
            border-top:1px solid #eee;
            font-size:14px;
            vertical-align:middle;
        }

        .badge{
            padding:6px 12px;
            border-radius:6px;
            font-size:12px;
            font-weight:600;
        }

        .badge-green{
            background:#d8f7df;
            color:#1ca54f;
        }

        /* ================= ACTION BUTTON ================= */

        .action{
            display:flex;
            align-items:center;
            gap:10px;
        }

        .btn-action{
            height:36px;
            padding:0 14px;
            border:none;
            border-radius:8px;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:6px;
            cursor:pointer;
            transition:0.3s;
            font-size:13px;
            font-weight:500;
            font-family:'Poppins', sans-serif;
            text-decoration:none;
            white-space:nowrap;
        }

        .action form{
            display:contents;
        }

        .btn-view{
            background:#e8fff7;
            color:#00b386;
        }

        .btn-view:hover{
            background:#00b386;
            color:white;
            transform:translateY(-2px);
        }

        .btn-print{
            background:#f1f3f5;
            color:#666;
        }

        .btn-print:hover{
            background:#dfe3e6;
            color:#111;
            transform:translateY(-2px);
        }

        .btn-edit{
            background:#fff8e1;
            color:#f59e0b;
        }

        .btn-edit:hover{
            background:#f59e0b;
            color:white;
            transform:translateY(-2px);
        }

        .btn-delete{
            background:#fff0f0;
            color:#ef4444;
        }

        .btn-delete:hover{
            background:#ef4444;
            color:white;
            transform:translateY(-2px);
        }

        /* ================= FOOTER ================= */

        .table-footer{
            padding:20px 24px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            font-size:13px;
            color:#777;
        }

        /* ================= PAGINATION ================= */

        .pagination{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .pagination button{
            width:34px;
            height:34px;
            border:none;
            border-radius:50%;
            background:#4a4a4a;
            color:white;
            cursor:pointer;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:14px;
            transition:0.3s;
        }

        .pagination button:hover{
            background:#222;
        }

        .page-number{
            width:28px;
            height:28px;
            border-radius:6px;
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            font-size:15px;
            color:#111;
            transition:0.3s;
        }

        .page-number:hover{
            background:#efefef;
        }

        .page-number.active{
            background:#d9d9d9;
            font-weight:600;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width:768px){

            .sidebar{
                width:90px;
            }

            .menu li a span{
                display:none;
            }

            .logo{
                font-size:18px;
            }

            .main{
                margin-left:90px;
            }

            .main.full{
                margin-left:90px;
            }

            .filter-box{
                flex-direction:column;
                align-items:stretch;
            }

            .select,
            .date-input{
                width:100%;
            }

            .table-box{
                overflow-x:auto;
            }

        }

    </style>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

<div class="container">

    <!-- SIDEBAR -->
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
                Setoran
            </div>

            <div class="subtitle">
                Catat setoran hasil kerja Agen
            </div>

            <!-- FILTER -->
            <form method="GET" action="{{ route('kelola-setoran') }}" class="filter-box">

                <div class="filter-left">

                    <div class="input-group">
                        <i class="bi bi-search"></i>
                        <input type="text" name="search" class="input" placeholder="Cari nama agen..."
                            value="{{ request('search') }}"
                            style="height:48px;width:240px;border:1px solid #ddd;border-radius:8px;padding:0 14px 0 42px;outline:none;font-size:14px;font-family:'Poppins',sans-serif;">
                    </div>

                    <input type="month" name="bulan" class="date-input"
                        value="{{ request('bulan') }}"
                        onchange="this.form.submit()">

                    @if(request('search') || request('bulan'))
                    <a href="{{ route('kelola-setoran') }}" class="btn" style="background:#6c757d;">
                        <i class="bi bi-x-lg"></i> Reset
                    </a>
                    @endif

                </div>

                <a href="{{route('kelola-setoran.create')}}" class="btn" style="text-decoration:none;">
                    <i class="bi bi-plus-lg"></i>
                    Buat Setoran
                </a>

            </form>

            <!-- TABLE -->
            <div class="table-box">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Anggota</th>
                            <th>Tanggal</th>
                            <th>Total (pcs)</th>
                            <th>Harga (pcs)</th>
                            <th>Total Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($storan as $stor)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$stor->agent->nama_agent}}</td>
                            <td>{{$stor->tanggal_setoran}}</td>
                            <td>{{$stor->jumlah_pcs}}</td>
                            <td>Rp {{ number_format($stor->harga_per_pcs, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($stor->total, 0, ',', '.') }}</td>
                            <td>
                                <div class="action">
                                    <a href="{{ route('storan.show', $stor->id) }}" class="btn-action btn-view">
                                    Detail 
                                    </a> 
                                    <a href="{{ route('storan.edit', $stor->id) }}" class="btn-action btn-edit">
                                    Edit
                                    </a>
                                    <form action="{{route('storan.destroy', $stor->id)  }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">
                                            
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>

                </table>

                <!-- FOOTER -->
                <div class="table-footer">

                    <div>
                        Menampilkan {{ $storan->count() }} dari {{ $storan->total() }} data
                    </div>

                    @if($storan->lastPage() > 1)
                    <div class="pagination">
                        <button onclick="window.location='{{ $storan->previousPageUrl() }}'"
                            {{ $storan->onFirstPage() ? 'disabled' : '' }}>
                            <i class="bi bi-chevron-left"></i>
                        </button>
                        @for($i = 1; $i <= $storan->lastPage(); $i++)
                        <div class="page-number {{ $storan->currentPage() == $i ? 'active' : '' }}"
                            onclick="window.location='{{ $storan->url($i) }}'">{{ $i }}</div>
                        @endfor
                        <button onclick="window.location='{{ $storan->nextPageUrl() }}'"
                            {{ $storan->currentPage() == $storan->lastPage() ? 'disabled' : '' }}>
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

    // SIDEBAR TOGGLE
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
