<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - SIMPLAST</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            margin:0; padding:0;
            box-sizing:border-box;
            font-family:'Poppins', sans-serif;
        }

        body{ background:#f4f4f4; }

        .container{ display:flex; }

        /* ================= SIDEBAR ================= */

        .sidebar{
            width:260px;
            background:linear-gradient(to bottom, #10c9a3, #00997b);
            height:100vh; position:fixed; left:0; top:0;
            padding:30px 22px; color:white;
            overflow:auto; transition:0.3s; z-index:1000;
        }

        .logo{ font-size:34px; font-weight:700; margin-bottom:50px; transition:0.3s; }

        .menu{ list-style:none; }
        .menu li{ margin-bottom:28px; }
        .menu li a{
            text-decoration:none; color:white;
            display:flex; align-items:center; gap:14px;
            font-size:17px; font-weight:500; transition:0.3s;
        }
        .menu li a:hover{ transform:translateX(5px); }
        .logout-btn { background: none; border: none; width: 100%; padding: 0; cursor: pointer; color: white; display: flex; align-items: center; gap: 14px; font-size: 17px; font-weight: 500; transition: 0.3s; }
        .logout-btn:hover { transform: translateX(5px); }

        .active-menu{
            background:rgba(255,255,255,0.15);
            padding:10px 12px; border-radius:10px;
        }

        .sidebar.close{ width:90px; }
        .sidebar.close .logo{ font-size:18px; }
        .sidebar.close .menu li a span{ display:none; }

        /* ================= MAIN ================= */

        .main{ margin-left:260px; width:100%; transition:0.3s; }
        .main.full{ margin-left:90px; }

        /* ================= TOPBAR ================= */

        .topbar{
            height:70px; background:white;
            display:flex; justify-content:space-between; align-items:center;
            padding:0 30px; border-bottom:1px solid #ddd;
        }

        .menu-toggle{ font-size:30px; color:#444; cursor:pointer; }

        .admin-profile{
            display:flex; align-items:center; gap:10px;
            font-size:15px; color:#444; cursor:pointer;
        }
        .admin-profile i{ font-size:28px; }

        /* ================= CONTENT ================= */

        .content{ padding:30px; }

        .title{ font-size:32px; font-weight:700; margin-bottom:5px; }
        .subtitle{ color:#777; margin-bottom:30px; }

        /* ================= PROFILE CARD ================= */

        .profile-wrapper{
            display:grid;
            grid-template-columns:280px 1fr;
            gap:24px;
            align-items:start;
        }

        /* Avatar Card */
        .avatar-card{
            background:white; border-radius:16px;
            padding:30px 20px; text-align:center;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        .avatar-circle{
            width:100px; height:100px; border-radius:50%;
            background:linear-gradient(135deg, #10c9a3, #00997b);
            margin:0 auto 16px;
            display:flex; align-items:center; justify-content:center;
            font-size:40px; font-weight:700; color:white;
        }

        .avatar-name{
            font-size:18px; font-weight:700; color:#111; margin-bottom:6px;
        }

        .avatar-role{
            display:inline-block;
            background:#d8f7df; color:#1ca54f;
            padding:4px 14px; border-radius:20px;
            font-size:12px; font-weight:600; margin-bottom:20px;
        }

        .avatar-info{
            text-align:left; border-top:1px solid #eee; padding-top:18px;
        }

        .avatar-info-item{
            display:flex; align-items:center; gap:10px;
            padding:8px 0; font-size:13px; color:#555;
            border-bottom:1px solid #f5f5f5;
        }
        .avatar-info-item:last-child{ border-bottom:none; }
        .avatar-info-item i{ color:#00997b; font-size:16px; flex-shrink:0; }

        /* Form Card */
        .form-card{
            background:white; border-radius:16px;
            padding:30px; box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        .form-card-header{
            display:flex; align-items:center; gap:12px;
            margin-bottom:28px; padding-bottom:18px;
            border-bottom:1px solid #eee;
        }

        .form-card-header i{ font-size:22px; color:#00997b; }
        .form-card-header h3{ font-size:18px; font-weight:600; }

        /* ================= SECTION LABEL ================= */

        .section-label{
            font-size:12px; font-weight:600; color:#00997b;
            text-transform:uppercase; letter-spacing:0.8px;
            margin-bottom:16px; padding-bottom:8px;
            border-bottom:1px solid #eee;
        }

        /* ================= FORM GRID ================= */

        .row{
            display:flex; flex-wrap:wrap;
            margin:-10px; margin-bottom:24px;
        }
        .row > *{ padding:10px; }

        .col-6{ flex:0 0 50%; width:50%; }
        .col-12{ flex:0 0 100%; width:100%; }

        /* ================= FORM ELEMENTS ================= */

        .form-label{
            display:block; font-size:13px; font-weight:500;
            color:#444; margin-bottom:8px;
        }

        .form-control{
            display:block; width:100%; height:48px;
            padding:0 14px; font-size:14px;
            border:1px solid #ddd; border-radius:8px;
            outline:none; font-family:'Poppins', sans-serif;
            background:white; color:#333; transition:0.2s;
        }
        .form-control:focus{
            border-color:#00997b;
            box-shadow:0 0 0 3px rgba(0,153,123,0.08);
        }
        .form-control[readonly]{
            background:#f7f7f7; color:#888; cursor:default;
        }
        select.form-control{ cursor:pointer; }

        .form-text{ font-size:12px; color:#999; margin-top:5px; }

        .is-invalid{ border-color:#ef4444 !important; }
        .invalid-feedback{ font-size:12px; color:#ef4444; margin-top:5px; }

        /* ================= BUTTONS ================= */

        .form-actions{ display:flex; gap:12px; margin-top:8px; }

        .btn{
            height:48px; padding:0 24px; border:none;
            border-radius:8px; font-size:14px; font-weight:500;
            font-family:'Poppins', sans-serif; cursor:pointer;
            display:inline-flex; align-items:center; gap:8px;
            text-decoration:none; transition:0.2s;
        }

        .btn-save{ background:#00997b; color:white; }
        .btn-save:hover{ background:#00806a; transform:translateY(-1px); }

        .btn-cancel{ background:#f1f3f5; color:#555; }
        .btn-cancel:hover{ background:#dfe3e6; }

        /* ================= RESPONSIVE ================= */

        @media(max-width:900px){
            .profile-wrapper{ grid-template-columns:1fr; }
        }

        @media(max-width:768px){
            .sidebar{ width:90px; }
            .sidebar .logo{ font-size:18px; }
            .sidebar .menu li a span{ display:none; }
            .main{ margin-left:90px; }
            .main.full{ margin-left:90px; }
            .col-6{ flex:0 0 100%; width:100%; }
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
                <a href="{{ route('dashboard') }}">
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
            </li></ul>
    </div>

    <!-- MAIN -->
    <div class="main" id="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <i class="bi bi-list menu-toggle" id="menuToggle"></i>
            <a href="{{ route('profile.edit') }}" class="admin-profile" style="text-decoration:none;">
                <i class="bi bi-person-circle"></i>
                <span>{{ auth()->user()->nama_lengkap ?? auth()->user()->name }}</span>
            </a>
        </div>

        <!-- CONTENT -->
        <div class="content">

            <div class="title">Profil Saya</div>
            <div class="subtitle">Kelola informasi akun Anda</div>

            <div class="profile-wrapper">

                <!-- AVATAR CARD -->
                <div class="avatar-card">
                    <div class="avatar-circle">
                        {{ strtoupper(substr($user->nama_lengkap ?? 'U', 0, 1)) }}
                    </div>
                    <div class="avatar-name">{{ $user->nama_lengkap ?? '-' }}</div>
                    <div class="avatar-role">
                        {{ ucfirst($user->getRoleNames()->first() ?? 'user') }}
                    </div>

                    <div class="avatar-info">
                        <div class="avatar-info-item">
                            <i class="bi bi-telephone"></i>
                            <span>{{ $user->no_tlp ?? '-' }}</span>
                        </div>
                        <div class="avatar-info-item">
                            <i class="bi bi-geo-alt"></i>
                            <span>{{ $user->alamat ?? 'Belum diisi' }}</span>
                        </div>
                        @if($user->agent)
                        <div class="avatar-info-item">
                            <i class="bi bi-people"></i>
                            <span>{{ $user->agent->nama_agent }}</span>
                        </div>
                        @endif
                        <div class="avatar-info-item">
                            <i class="bi bi-circle-fill" style="font-size:10px;color:{{ $user->status ? '#1ca54f' : '#ef4444' }};"></i>
                            <span>{{ $user->status ? 'Aktif' : 'Nonaktif' }}</span>
                        </div>
                    </div>
                </div>

                <!-- FORM CARD -->
                <div class="form-card">

                    <div class="form-card-header">
                        <i class="bi bi-pencil-square"></i>
                        <h3>Edit Informasi Profil</h3>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- DATA DIRI -->
                        <div class="section-label">Data Diri</div>

                        <div class="row">

                            <div class="col-6">
                                <label class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                                    name="nama_lengkap"
                                    value="{{ old('nama_lengkap', $user->nama_lengkap) }}" required>
                                @error('nama_lengkap')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-6">
                                <label class="form-label">No Telephone</label>
                                <input type="text" class="form-control @error('no_tlp') is-invalid @enderror"
                                    name="no_tlp"
                                    value="{{ old('no_tlp', $user->no_tlp) }}" required>
                                @error('no_tlp')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                    name="alamat"
                                    value="{{ old('alamat', $user->alamat) }}"
                                    placeholder="Masukkan alamat lengkap">
                                @error('alamat')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <!-- KEAMANAN -->
                        <div class="section-label">Keamanan</div>

                        <div class="row">

                            <div class="col-6">
                                <label class="form-label">Password Baru</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    placeholder="Kosongkan jika tidak ingin ubah">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <p class="form-text">Minimal 6 karakter</p>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control"
                                    name="password_confirmation"
                                    placeholder="Ulangi password baru">
                            </div>

                        </div>

                        <!-- INFO READONLY -->
                        <div class="section-label">Informasi Akun</div>

                        <div class="row">

                            <div class="col-6">
                                <label class="form-label">Role</label>
                                <input type="text" class="form-control" readonly
                                    value="{{ ucfirst($user->getRoleNames()->first() ?? '-') }}">
                                <p class="form-text">Role tidak dapat diubah</p>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Agen</label>
                                <input type="text" class="form-control" readonly
                                    value="{{ $user->agent->nama_agent ?? 'Tidak ada agen' }}">
                                <p class="form-text">Agen tidak dapat diubah</p>
                            </div>

                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-save">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                            <a href="{{ route('dashboard') }}" class="btn btn-cancel">
                                <i class="bi bi-x-lg"></i> Batal
                            </a>
                        </div>

                    </form>

                </div>

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
