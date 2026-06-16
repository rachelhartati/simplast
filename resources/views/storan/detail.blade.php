<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Setoran - SIMPLAST</title>

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

        /* ================= DETAIL CARD ================= */

        .detail-card{
            background:white;
            border-radius:16px;
            padding:30px;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        .detail-card .card-header{
            display:flex;
            align-items:center;
            justify-content:space-between;
            margin-bottom:28px;
            padding-bottom:18px;
            border-bottom:1px solid #eee;
        }

        .detail-card .card-header h2{
            font-size:20px;
            font-weight:600;
            color:#111;
        }

        .badge{
            padding:6px 14px;
            border-radius:6px;
            font-size:13px;
            font-weight:600;
        }

        .badge-green{
            background:#d8f7df;
            color:#1ca54f;
        }

        .badge-yellow{
            background:#fff8e1;
            color:#f59e0b;
        }

        .detail-row{
            display:flex;
            align-items:flex-start;
            padding:14px 0;
            border-bottom:1px solid #f3f3f3;
        }

        .detail-row:last-child{
            border-bottom:none;
        }

        .detail-label{
            width:200px;
            font-size:14px;
            color:#777;
            flex-shrink:0;
            display:flex;
            align-items:center;
            gap:8px;
        }

        .detail-label i{
            font-size:16px;
            color:#00997b;
        }

        .detail-value{
            font-size:14px;
            font-weight:500;
            color:#111;
        }

        /* ================= BUTTON ================= */

        .btn-back{
            display:inline-flex;
            align-items:center;
            gap:8px;
            height:44px;
            padding:0 20px;
            background:#f1f3f5;
            color:#444;
            border:none;
            border-radius:8px;
            text-decoration:none;
            font-size:14px;
            font-weight:500;
            transition:0.3s;
            margin-top:24px;
        }

        .btn-back:hover{
            background:#dfe3e6;
            color:#111;
        }

        .btn-edit{
            display:inline-flex;
            align-items:center;
            gap:8px;
            height:44px;
            padding:0 20px;
            background:#fff8e1;
            color:#f59e0b;
            border:none;
            border-radius:8px;
            text-decoration:none;
            font-size:14px;
            font-weight:500;
            transition:0.3s;
            margin-top:24px;
            margin-left:10px;
        }

        .btn-edit:hover{
            background:#f59e0b;
            color:white;
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

            .detail-label{
                width:150px;
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
                Detail Setoran
            </div>

            <div class="subtitle">
                Informasi lengkap data setoran
            </div>

            <!-- DETAIL CARD -->
            <div class="detail-card">


                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-people"></i>
                        Agen
                    </div>
                    <div class="detail-value">{{ $storan->agent->nama_agent ?? '-' }}</div>
                </div>

                @if($storan->agentRequest)
                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-file-earmark-text"></i>
                        No. Request
                    </div>
                    <div class="detail-value">Req #{{ $storan->agentRequest->id }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-calendar2-check"></i>
                        Tgl. Request
                    </div>
                    <div class="detail-value">{{ \Carbon\Carbon::parse($storan->agentRequest->tanggal_request)->translatedFormat('d F Y') }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-box-seam"></i>
                        Total Barang di Request
                    </div>
                    <div class="detail-value">{{ number_format($storan->agentRequest->jumlah_barang, 0, ',', '.') }} karung</div>
                </div>
                @endif

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-box2"></i>
                        Item
                    </div>
                    <div class="detail-value">{{ $storan->item->nama_item ?? '-' }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-calendar3"></i>
                        Tanggal Setoran
                    </div>
                    <div class="detail-value">{{ \Carbon\Carbon::parse($storan->tanggal_setoran)->translatedFormat('d F Y') }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-layers"></i>
                        Jumlah (pcs)
                    </div>
                    <div class="detail-value">{{ number_format($storan->jumlah_pcs, 0, ',', '.') }} pcs</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-tag"></i>
                        Harga per pcs
                    </div>
                    <div class="detail-value">Rp {{ number_format($storan->harga_per_pcs, 0, ',', '.') }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-cash-stack"></i>
                        Total Harga
                    </div>
                    <div class="detail-value">Rp {{ number_format($storan->total, 0, ',', '.') }}</div>
                </div>

                <div class="detail-row">
                    <div class="detail-label">
                        <i class="bi bi-clock-history"></i>
                        Dibuat Pada
                    </div>
                    <div class="detail-value">{{ $storan->created_at->translatedFormat('d F Y, H:i') }}</div>
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
