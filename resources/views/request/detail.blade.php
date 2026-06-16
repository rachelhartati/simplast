<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Request - SIMPLAST</title>

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

        .sidebar.close {
            width: 90px;
        }

        .sidebar.close .logo {
            font-size: 18px;
        }

        .sidebar.close .menu li a span {
            display: none;
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

        .page-header {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 28px;
        }

        .btn-back {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: white;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: #555;
            text-decoration: none;
            transition: 0.2s;
            cursor: pointer;
        }

        .btn-back:hover {
            background: #f0f0f0;
        }

        .title {
            font-size: 26px;
            font-weight: 700;
        }

        /* ================= ALERT ================= */

        .alert {
            padding: 14px 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 500;
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

        /* ================= CARD DETAIL ================= */

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-bottom: 24px;
        }

        .card-header {
            padding: 20px 28px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .card-header-title {
            font-size: 16px;
            font-weight: 600;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card-header-title i {
            font-size: 20px;
            color: #10c9a3;
        }

        .card-body {
            padding: 28px;
        }

        /* ================= DETAIL GRID ================= */

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
        }

        .detail-item {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .detail-item.full {
            grid-column: 1 / -1;
        }

        .detail-label {
            font-size: 12px;
            color: #999;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-value {
            font-size: 15px;
            color: #222;
            font-weight: 500;
        }

        /* ================= BADGE STATUS ================= */

        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .badge-waiting {
            background: #fff8e1;
            color: #f0a500;
        }

        .badge-approved {
            background: #d8f7df;
            color: #1ca54f;
        }

        .badge-rejected {
            background: #ffe0e0;
            color: #d94b4b;
        }

        .badge-received {
            background: #e3f2fd;
            color: #1565c0;
        }

        /* ================= DIVIDER ================= */

        .divider {
            height: 1px;
            background: #f0f0f0;
            margin: 24px 0;
        }

        /* ================= INFO BOX ================= */

        .info-box {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 18px 20px;
            border-left: 4px solid #10c9a3;
        }

        .info-box.rejected {
            border-left-color: #d94b4b;
            background: #fff8f8;
        }

        .info-box-label {
            font-size: 12px;
            color: #888;
            font-weight: 500;
            margin-bottom: 6px;
        }

        .info-box-value {
            font-size: 14px;
            color: #333;
            font-weight: 500;
        }

        /* ================= ACTION BUTTONS ================= */

        .action-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            padding: 28px;
        }

        .action-title {
            font-size: 15px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
        }

        .action-buttons {
            display: flex;
            gap: 14px;
        }

        .btn-approve {
            flex: 1;
            height: 52px;
            background: #10c9a3;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.2s;
        }

        .btn-approve:hover {
            background: #0daa8a;
            transform: translateY(-2px);
        }

        .btn-reject {
            flex: 1;
            height: 52px;
            background: white;
            color: #d94b4b;
            border: 2px solid #d94b4b;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: 0.2s;
        }

        .btn-reject:hover {
            background: #d94b4b;
            color: white;
            transform: translateY(-2px);
        }

        /* ================= MODAL ================= */

        .modal-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.45);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal {
            background: white;
            border-radius: 18px;
            padding: 36px;
            width: 100%;
            max-width: 460px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
            animation: modalIn 0.2s ease;
        }

        @keyframes modalIn {
            from {
                transform: scale(0.92);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .modal-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin: 0 auto 20px;
        }

        .modal-icon.approve {
            background: #d8f7df;
            color: #1ca54f;
        }

        .modal-icon.reject {
            background: #ffe0e0;
            color: #d94b4b;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 8px;
            color: #111;
        }

        .modal-desc {
            font-size: 14px;
            color: #777;
            text-align: center;
            margin-bottom: 24px;
            line-height: 1.6;
        }

        .modal-desc span {
            font-weight: 600;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #444;
            margin-bottom: 8px;
        }

        .form-textarea {
            width: 100%;
            height: 110px;
            border: 1.5px solid #ddd;
            border-radius: 10px;
            padding: 12px 14px;
            font-size: 14px;
            font-family: 'Poppins', sans-serif;
            outline: none;
            resize: none;
            transition: border-color 0.2s;
        }

        .form-textarea:focus {
            border-color: #10c9a3;
        }

        .form-textarea.reject-area:focus {
            border-color: #d94b4b;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
        }

        .btn-modal-cancel {
            flex: 1;
            height: 46px;
            background: #f4f4f4;
            color: #555;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-modal-cancel:hover {
            background: #e8e8e8;
        }

        .btn-modal-approve {
            flex: 1;
            height: 46px;
            background: #10c9a3;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-modal-approve:hover {
            background: #0daa8a;
        }

        .btn-modal-reject {
            flex: 1;
            height: 46px;
            background: #d94b4b;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-modal-reject:hover {
            background: #c03b3b;
        }

        /* ================= RESPONSIVE ================= */

        @media(max-width: 768px) {
            .sidebar {
                width: 90px;
            }

            .menu li a span {
                display: none;
            }

            .logo {
                font-size: 18px;
            }

            .main {
                margin-left: 90px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
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
                    {{ auth()->user()->name }}
                </div>
            </div>

            <!-- CONTENT -->
            <div class="content">

                <!-- HEADER -->
                <div class="page-header">
                    <div class="title">Detail Request Pesanan</div>
                </div>

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

                <!-- CARD DETAIL REQUEST -->
                <div class="card">
                    <div class="card-header">
                        <div class="card-header-title">
                            <i class="bi bi-file-earmark-text"></i>
                            Informasi Request
                        </div>
                        @php
                            $statusClass = match($agentRequest->status) {
                                'approved' => 'badge-approved',
                                'rejected' => 'badge-rejected',
                                'received' => 'badge-received',
                                default    => 'badge-waiting',
                            };
                            $statusIcon = match($agentRequest->status) {
                                'approved' => 'bi-check-circle-fill',
                                'rejected' => 'bi-x-circle-fill',
                                'received' => 'bi-box-seam',
                                default    => 'bi-clock-fill',
                            };
                            $statusLabel = match($agentRequest->status) {
                                'approved' => 'Disetujui',
                                'rejected' => 'Ditolak',
                                'received' => 'Diterima',
                                default    => 'Menunggu',
                            };
                        @endphp
                        <span class="badge {{ $statusClass }}">
                            <i class="bi {{ $statusIcon }}"></i>
                            {{ $statusLabel }}
                        </span>
                    </div>

                    <div class="card-body">
                        <div class="detail-grid">

                            <div class="detail-item">
                                <span class="detail-label">Nama Agen</span>
                                <span class="detail-value">{{ $agentRequest->agent->nama_agent ?? '-' }}</span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Tanggal Request</span>
                                <span class="detail-value">{{ \Carbon\Carbon::parse($agentRequest->tanggal_request)->translatedFormat('d F Y') }}</span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Nama Barang</span>
                                <span class="detail-value">{{ $agentRequest->item->nama_item ?? '-' }}</span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Jumlah Barang</span>
                                <span class="detail-value">{{ $agentRequest->jumlah_barang }} karung</span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Total</span>
                                <span class="detail-value">{{ number_format($agentRequest->total, 0, ',', '.') }} KG</span>
                            </div>

                            <div class="detail-item">
                                <span class="detail-label">Status</span>
                                <span class="detail-value">
                                    <span class="badge {{ $statusClass }}">
                                        <i class="bi {{ $statusIcon }}"></i>
                                        {{ $statusLabel }}
                                    </span>
                                </span>
                            </div>

                        </div>

                        {{-- Info Approved --}}
                        @if($agentRequest->isApproved())
                            <div class="divider"></div>
                            <div class="info-box">
                                <div class="info-box-label">Disetujui oleh</div>
                                <div class="info-box-value">
                                    {{ $agentRequest->approver->name ?? '-' }}
                                    &nbsp;&bull;&nbsp;
                                    {{ $agentRequest->approved_at ? \Carbon\Carbon::parse($agentRequest->approved_at)->translatedFormat('d F Y, H:i') : '-' }}
                                </div>
                            </div>
                        @endif

                        {{-- Info Rejected --}}
                        @if($agentRequest->isRejected())
                            <div class="divider"></div>
                            <div class="info-box rejected">
                                <div class="info-box-label">Ditolak oleh</div>
                                <div class="info-box-value">
                                    {{ $agentRequest->rejector->name ?? '-' }}
                                    &nbsp;&bull;&nbsp;
                                    {{ $agentRequest->rejected_at ? \Carbon\Carbon::parse($agentRequest->rejected_at)->translatedFormat('d F Y, H:i') : '-' }}
                                </div>
                                @if($agentRequest->rejected_reason)
                                    <div class="info-box-label" style="margin-top:12px;">Alasan Penolakan</div>
                                    <div class="info-box-value">{{ $agentRequest->rejected_reason }}</div>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>

                @hasrole('admin|superadmin')
                @if($agentRequest->isWaiting())
                    <div class="action-card">
                        <div class="action-title">Tindakan</div>
                        <div class="action-buttons">
                            <button class="btn-approve" onclick="openModal('modalApprove')">
                                <i class="bi bi-check-circle"></i>
                                Setujui Request
                            </button>
                            <button class="btn-reject" onclick="openModal('modalReject')">
                                <i class="bi bi-x-circle"></i>
                                Tolak Request
                            </button>
                        </div>
                    </div>
                @endif
                @endhasrole
            </div>
        </div>
    </div>

    <!-- ===== MODAL APPROVE ===== -->
    <div class="modal-overlay" id="modalApprove">
        <div class="modal">
            <div class="modal-icon approve">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="modal-title">Konfirmasi Persetujuan</div>
            <div class="modal-desc">
                Apakah Anda yakin ingin menyetujui request dari
                <span>{{ $agentRequest->agent->nama_agent ?? '-' }}</span>
                sebanyak <span>{{ $agentRequest->jumlah_barang }} karung</span>?
                <br>Tindakan ini tidak dapat dibatalkan.
            </div>
            <div class="modal-actions">
                <button class="btn-modal-cancel" onclick="closeModal('modalApprove')">Batal</button>
                <form action="{{route('request.approve', $agentRequest->id)}}" method="POST" style="flex:1;">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn-modal-approve" style="width:100%;">
                        <i class="bi bi-check-lg"></i> Ya, Setujui
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- ===== MODAL REJECT ===== -->
    <div class="modal-overlay" id="modalReject">
        <div class="modal">
            <div class="modal-icon reject">
                <i class="bi bi-x-circle-fill"></i>
            </div>
            <div class="modal-title">Konfirmasi Penolakan</div>
            <div class="modal-desc">
                Anda akan menolak request dari
                <span>{{ $agentRequest->agent->nama_agent ?? '-' }}</span>.
                Harap berikan alasan penolakan dengan jelas.
            </div>
            <form action="{{route('request.reject', $agentRequest->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label class="form-label" for="rejected_reason">Alasan Penolakan <span style="color:#d94b4b;">*</span></label>
                    <textarea
                        class="form-textarea reject-area"
                        id="rejected_reason"
                        name="rejected_reason"
                        placeholder="Tuliskan alasan penolakan di sini..."
                        required
                    ></textarea>
                </div>
                <div class="modal-actions">
                    <button type="button" class="btn-modal-cancel" onclick="closeModal('modalReject')">Batal</button>
                    <button type="submit" class="btn-modal-reject">
                        <i class="bi bi-x-lg"></i> Ya, Tolak
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Sidebar toggle
        const menuToggle = document.getElementById("menuToggle");
        const sidebar = document.getElementById("sidebar");
        const main = document.getElementById("main");

        menuToggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
            main.classList.toggle("full");
        });

        // Modal
        function openModal(id) {
            document.getElementById(id).classList.add('active');
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
        }

        // Tutup modal jika klik di luar
        document.querySelectorAll('.modal-overlay').forEach(overlay => {
            overlay.addEventListener('click', function (e) {
                if (e.target === this) {
                    this.classList.remove('active');
                }
            });
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
