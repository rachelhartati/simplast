<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Setoran - SIMPLAST</title>

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

        /* ================= FORM BOX ================= */

        .form-box{
            background:white;
            border-radius:16px;
            padding:30px;
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        .form-box-header{
            display:flex;
            align-items:center;
            gap:12px;
            margin-bottom:24px;
            padding-bottom:18px;
            border-bottom:1px solid #eee;
        }

        .form-box-header h3{
            font-size:20px;
            font-weight:600;
        }

        .form-box-header i{
            font-size:22px;
            color:#00997b;
        }

        /* ================= SECTION LABEL ================= */

        .section-label{
            font-size:13px;
            font-weight:600;
            color:#00997b;
            text-transform:uppercase;
            letter-spacing:0.5px;
            margin-bottom:16px;
            padding-bottom:8px;
            border-bottom:1px solid #eee;
        }

        /* ================= FORM GRID ================= */

        .row{
            display:flex;
            flex-wrap:wrap;
            margin:-10px;
            margin-bottom:24px;
        }

        .row > *{
            padding:10px;
        }

        .col-6{
            flex:0 0 50%;
            width:50%;
        }

        .col-12{
            flex:0 0 100%;
            width:100%;
        }

        /* ================= FORM ELEMENTS ================= */

        .form-label{
            display:block;
            font-size:13px;
            font-weight:500;
            color:#444;
            margin-bottom:8px;
        }

        .form-control,
        .form-select{
            display:block;
            width:100%;
            height:48px;
            padding:0 14px;
            font-size:14px;
            border:1px solid #ddd;
            border-radius:8px;
            outline:none;
            font-family:'Poppins', sans-serif;
            background:white;
            color:#333;
            transition:0.2s;
        }

        .form-control:focus,
        .form-select:focus{
            border-color:#00997b;
            box-shadow:0 0 0 3px rgba(0,153,123,0.08);
        }

        .form-control[readonly]{
            background:#f7f7f7;
            color:#888;
            cursor:default;
        }

        .form-select:disabled {
            background: #f7f7f7;
            color: #888;
            cursor: default;
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .form-text{
            font-size:12px;
            color:#999;
            margin-top:5px;
        }

        /* ================= BUTTONS ================= */

        .form-actions{
            display:flex;
            gap:12px;
            margin-top:10px;
        }

        .btn{
            height:48px;
            padding:0 24px;
            border:none;
            border-radius:8px;
            font-size:14px;
            font-weight:500;
            font-family:'Poppins', sans-serif;
            cursor:pointer;
            display:inline-flex;
            align-items:center;
            gap:8px;
            text-decoration:none;
            transition:0.2s;
        }

        .btn-save{
            background:#00997b;
            color:white;
        }

        .btn-save:hover{
            background:#00806a;
            transform:translateY(-1px);
        }

        .btn-cancel{
            background:#f1f3f5;
            color:#555;
        }

        .btn-cancel:hover{
            background:#dfe3e6;
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

            .col-6{
                flex:0 0 100%;
                width:100%;
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

            <div class="title">Edit Setoran</div>
            <div class="subtitle">Ubah data setoran yang sudah ada</div>

            <div class="form-box">

                <div class="form-box-header">
                    <i class="bi bi-pencil-square"></i>
                    <h3>Form Edit Setoran</h3>
                </div>

                <form action="{{ route('storan.update', $storan->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- BAGIAN INFORMASI SETORAN -->
                    <div class="section-label">Informasi Setoran</div>

                    <div class="row">

                        <div class="col-6">
                            <label class="form-label">Agen</label>
                            <select class="form-select" name="agent_id" required>
                                <option value="" disabled>Pilih Agen</option>
                                @foreach($agent as $agen)
                                <option value="{{ $agen->id }}" {{ $storan->agent_id == $agen->id ? 'selected' : '' }}>
                                    {{ $agen->nama_agent }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Tanggal Setoran</label>
                            <input type="date" class="form-control" name="tanggal_setoran"
                                value="{{ $storan->tanggal_setoran }}" required>
                        </div>

                    </div>

                    <!-- BAGIAN REQUEST -->
                    <div class="section-label">Request Agen</div>

                    <div class="row">

                        <div class="col-6">
                            <label class="form-label">Request</label>
                            <select class="form-select" name="req_id" id="req_select" required>
                                <option value="">-- Pilih Request --</option>
                                @foreach($agentRequests->where('agent_id', $storan->agent_id) as $req)
                                <option value="{{ $req['id'] }}"
                                    data-item-id="{{ $req['item_id'] }}"
                                    data-jumlah="{{ $req['jumlah_barang'] }}"
                                    data-harga="{{ $req['harga'] }}"
                                    {{ $storan->req_id == $req['id'] ? 'selected' : '' }}>
                                    {{ $req['label'] }}
                                </option>
                                @endforeach
                            </select>
                            <p class="form-text">Pilih agen terlebih dahulu untuk melihat daftar request</p>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Total Barang di Request (pcs)</label>
                            @php
                                $selectedReq = $agentRequests->firstWhere('id', $storan->req_id);
                            @endphp
                            <input type="number" class="form-control" id="jumlah_req" readonly
                                value="{{ $selectedReq ? $selectedReq['jumlah_barang'] : '' }}" placeholder="—">
                        </div>

                    </div>

                    <!-- BAGIAN DETAIL ITEM -->
                    <div class="section-label">Detail Item</div>

                    <div class="row">

                        <div class="col-6">
                            <label class="form-label">Item</label>
                            <select class="form-select" name="item_id" id="item_select" required>
                                <option value="" disabled>Pilih Item</option>
                                @foreach($items as $item)
                                <option value="{{ $item->id }}"
                                    data-harga="{{ $item->harga_barang }}"
                                    {{ $storan->item_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_item }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Harga per pcs (Rp)</label>
                            <input type="number" class="form-control" id="harga" name="harga_per_pcs"
                                value="{{ $storan->harga_per_pcs }}" placeholder="Harga otomatis diambil dari Item" readonly>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Jumlah (pcs)</label>
                            <input type="number" class="form-control" name="jumlah_pcs" id="jumlah"
                                value="{{ $storan->jumlah_pcs }}" placeholder="Masukkan jumlah" min="1" required>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Total Harga (Rp)</label>
                            <input type="text" class="form-control" id="total_display"
                                value="Rp {{ number_format($storan->total, 0, ',', '.') }}" readonly>
                            <input type="hidden" name="total" id="total_harga" value="{{ $storan->total }}">
                            <p class="form-text">Total dihitung otomatis dari jumlah × harga</p>
                        </div>

                    </div>

                    <!-- TOMBOL AKSI -->
                    <div class="form-actions">
                        <button type="submit" class="btn btn-save">
                            <i class="bi bi-save"></i> Simpan Perubahan
                        </button>
                        <a href="{{ route('kelola-setoran') }}" class="btn btn-cancel">
                            <i class="bi bi-x-lg"></i> Batal
                        </a>
                    </div>

                </form>

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

    const agentRequests = @json($agentRequests);

    const agentSelect       = document.querySelector('[name="agent_id"]');
    const reqSelect         = document.getElementById('req_select');
    const jumlahReqEl       = document.getElementById('jumlah_req');
    const itemSelect        = document.getElementById('item_select');
    const inputHarga        = document.getElementById('harga');
    const inputJumlah       = document.getElementById('jumlah');
    const inputTotal        = document.getElementById('total_harga');
    const inputTotalDisplay = document.getElementById('total_display');

    function hitungTotal() {
        const jumlah = parseInt(inputJumlah.value) || 0;
        const harga  = parseInt(inputHarga.value)  || 0;
        const total  = jumlah * harga;
        inputTotal.value = total;
        inputTotalDisplay.value = 'Rp ' + total.toLocaleString('id-ID');
    }

    // AGEN BERUBAH → ISI ULANG REQUEST DROPDOWN
    agentSelect.addEventListener('change', function () {
        const agentId = parseInt(this.value);
        reqSelect.innerHTML = '<option value="">-- Pilih Request --</option>';
        jumlahReqEl.value = '';
        agentRequests
            .filter(r => r.agent_id === agentId)
            .forEach(r => {
                const opt = document.createElement('option');
                opt.value = r.id;
                opt.textContent = r.label;
                opt.dataset.itemId = r.item_id;
                opt.dataset.jumlah = r.jumlah_barang;
                opt.dataset.harga  = r.harga;
                reqSelect.appendChild(opt);
            });
    });

    // REQUEST DIPILIH → AUTO ISI ITEM, HARGA, JUMLAH REQ
    reqSelect.addEventListener('change', function () {
        const opt = this.options[this.selectedIndex];
        if (!opt.value) {
            jumlahReqEl.value = '';
            itemSelect.disabled = false;
            itemSelect.name = 'item_id';
            const hidden = document.getElementById('item_id_hidden');
            if (hidden) hidden.remove();
            return;
        }
        const itemId = opt.dataset.itemId;
        const jumlah = opt.dataset.jumlah;
        const harga  = opt.dataset.harga;

        for (let i = 0; i < itemSelect.options.length; i++) {
            if (itemSelect.options[i].value == itemId) {
                itemSelect.selectedIndex = i;
                break;
            }
        }
        inputHarga.value  = harga ?? '';
        jumlahReqEl.value = jumlah ?? '';

        // lock item select
        itemSelect.disabled = true;
        itemSelect.name = '';
        let hidden = document.getElementById('item_id_hidden');
        if (!hidden) {
            hidden = document.createElement('input');
            hidden.type = 'hidden';
            hidden.id   = 'item_id_hidden';
            hidden.name = 'item_id';
            itemSelect.parentNode.appendChild(hidden);
        }
        hidden.value = itemId;

        hitungTotal();
    });

    // ITEM BERUBAH MANUAL → ISI HARGA
    itemSelect.addEventListener('change', function () {
        const harga = this.options[this.selectedIndex].getAttribute('data-harga') || 0;
        inputHarga.value = harga;
        hitungTotal();
    });

    inputJumlah.addEventListener('input', hitungTotal);
    inputHarga.addEventListener('input', hitungTotal);

    // ON LOAD: lock item jika req sudah dipilih
    if (reqSelect.value) {
        itemSelect.disabled = true;
        itemSelect.name = '';
        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.id   = 'item_id_hidden';
        hidden.name = 'item_id';
        hidden.value = itemSelect.value;
        itemSelect.parentNode.appendChild(hidden);
    }

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
