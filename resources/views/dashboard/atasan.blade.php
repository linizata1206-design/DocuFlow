<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Atasan - DocuFlow</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #173b63;
        }

        header {
            height: 82px;
            background: #123b59;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 35px;
        }

        .logo {
            font-size: 27px;
            font-weight: bold;
        }

        .logo span {
            color: #60c5f5;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #dbeafe;
            color: #123b59;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
            font-size: 20px;
        }

        .profile small {
            display: block;
            margin-top: 4px;
            color: #cbd5e1;
        }

        .layout {
            display: flex;
            min-height: calc(100vh - 82px);
        }

        aside {
            width: 250px;
            flex-shrink: 0;
            background: #123b59;
            padding: 30px 16px;
            color: white;
        }

        .menu-title {
            font-size: 12px;
            letter-spacing: 1.5px;
            color: #a8c6dd;
            margin: 0 15px 20px;
            font-weight: bold;
        }

        .menu {
            display: block;
            padding: 15px 18px;
            margin-bottom: 8px;
            border-radius: 8px;
            text-decoration: none;
            color: #e2e8f0;
        }

        .menu.active,
        .menu:hover {
            background: #285676;
            color: white;
        }

        .menu.active {
            border-left: 4px solid #60c5f5;
        }

        .logout-form {
            margin-top: 30px;
        }

        .logout-button {
            width: 100%;
            padding: 13px 18px;
            border: 1px solid #94a3b8;
            border-radius: 8px;
            background: transparent;
            color: white;
            font-size: 14px;
            text-align: left;
            cursor: pointer;
        }

        .logout-button:hover {
            background: #285676;
        }

        main {
            flex: 1;
            min-width: 0;
            padding: 35px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0 0 10px;
            font-size: 30px;
        }

        .subtitle {
            margin: 0;
            color: #64748b;
            line-height: 1.6;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
            border-top: 4px solid #1682c4;
        }

        .stat-card.orange {
            border-top-color: #f59e0b;
        }

        .stat-card.green {
            border-top-color: #16a36a;
        }

        .stat-label {
            color: #64748b;
            font-size: 14px;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            margin-top: 12px;
        }

        .panel {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.04);
            margin-bottom: 22px;
        }

        .panel-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .panel-heading h2 {
            margin: 0;
            font-size: 21px;
        }

        .badge {
            background: #fef3c7;
            color: #92400e;
            border-radius: 20px;
            padding: 7px 12px;
            font-size: 12px;
            font-weight: bold;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        th {
            background: #eff6ff;
            color: #45617e;
            font-size: 12px;
            text-transform: uppercase;
            text-align: left;
            padding: 16px 13px;
        }

        td {
            padding: 16px 13px;
            border-bottom: 1px solid #e2e8f0;
            font-size: 14px;
            vertical-align: top;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #fef3c7;
            color: #92400e;
            font-size: 12px;
            font-weight: bold;
        }

        .action-form {
            display: flex;
            gap: 7px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            border: 0;
            border-radius: 6px;
            padding: 10px 13px;
            color: white;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-approve {
            background: #15803d;
        }

        .btn-approve:hover {
            background: #166534;
        }

        .btn-reject {
            background: #dc2626;
        }

        .btn-reject:hover {
            background: #b91c1c;
        }

        .empty {
            text-align: center;
            padding: 40px 15px;
            color: #64748b;
        }

        .empty-icon {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .success {
            padding: 14px 16px;
            border-radius: 8px;
            background: #dcfce7;
            color: #166534;
            margin-bottom: 20px;
        }

        .error {
            padding: 14px 16px;
            border-radius: 8px;
            background: #fee2e2;
            color: #991b1b;
            margin-bottom: 20px;
        }

        footer {
            color: #94a3b8;
            font-size: 12px;
            text-align: center;
            margin-top: 25px;
        }

        @media (max-width: 900px) {
            .layout {
                display: block;
            }

            aside {
                width: 100%;
                padding: 15px;
            }

            aside .menu-title {
                margin-top: 5px;
            }

            .logout-form {
                margin-top: 10px;
            }

            main {
                padding: 20px;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 500px) {
            header {
                padding: 0 18px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            h1 {
                font-size: 25px;
            }

            .panel {
                padding: 16px;
            }
        }
    </style>
</head>

<body>

<header>
    <div class="logo">Docu<span>Flow</span></div>

    <div class="profile">
        <div class="avatar">
            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
        </div>

        <div>
            <strong>{{ auth()->user()->name }}</strong>
            <small>Atasan</small>
        </div>
    </div>
</header>

<div class="layout">

    <aside>
        <p class="menu-title">MENU UTAMA</p>

        <a href="{{ route('dashboard') }}" class="menu active">
            ▦ &nbsp; Dashboard
        </a>

        <a href="{{ route('persetujuan.index') }}" class="menu">
            ✓ &nbsp; Persetujuan Dokumen
        </a>

        <form action="{{ route('logout') }}" method="POST" class="logout-form">
            @csrf
            <button type="submit" class="logout-button">
                ↪ &nbsp; Logout
            </button>
        </form>
    </aside>

    <main>

        <div class="page-heading">
            <div>
                <h1>Dashboard Atasan</h1>
                <p class="subtitle">
                    Selamat datang, {{ auth()->user()->name }}!
                    Kelola pengajuan dokumen pegawai di sini.
                </p>
            </div>
        </div>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
        @endif

        <section class="stats">

            <div class="stat-card">
                <div class="stat-label">Total Pengajuan</div>
                <div class="stat-number">
                    {{ \App\Models\Pengajuan::count() }}
                </div>
            </div>

            <div class="stat-card orange">
                <div class="stat-label">Menunggu Persetujuan</div>
                <div class="stat-number">
                    {{ \App\Models\Pengajuan::where('status', 'Menunggu')->count() }}
                </div>
            </div>

            <div class="stat-card green">
                <div class="stat-label">Sudah Diproses</div>
                <div class="stat-number">
                    {{ \App\Models\Pengajuan::whereIn('status', ['Disetujui', 'Ditolak'])->count() }}
                </div>
            </div>

        </section>

        <section class="panel">

            <div class="panel-heading">
                <h2>Dokumen Menunggu Persetujuan</h2>
                <span class="badge">
                    {{ \App\Models\Pengajuan::where('status', 'Menunggu')->count() }} Menunggu
                </span>
            </div>

            @php
                $pengajuans = \App\Models\Pengajuan::where('status', 'Menunggu')
                    ->latest()
                    ->get();
            @endphp

            @if ($pengajuans->isEmpty())

                <div class="empty">
                    <div class="empty-icon">✓</div>
                    <h3>Tidak Ada Pengajuan Menunggu</h3>
                    <p>Semua pengajuan sudah diproses atau belum ada dokumen baru.</p>
                </div>

            @else

                <div class="table-wrapper">
                    <table>
                        <thead>
                            <tr>
                                <th>Judul Dokumen</th>
                                <th>Kategori</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pengajuans as $pengajuan)
                                <tr>
                                    <td><strong>{{ $pengajuan->judul }}</strong></td>
                                    <td>{{ $pengajuan->kategori }}</td>
                                    <td>{{ $pengajuan->deskripsi ?: '-' }}</td>
                                    <td><span class="status">{{ $pengajuan->status }}</span></td>

                                    <td>
                                        <form
                                            action="{{ route('persetujuan.update', $pengajuan) }}"
                                            method="POST"
                                            class="action-form"
                                        >
                                            @csrf
                                            @method('PATCH')

                                            <button
                                                type="submit"
                                                name="status"
                                                value="Disetujui"
                                                class="btn btn-approve"
                                            >
                                                Setujui
                                            </button>

                                            <button
                                                type="submit"
                                                name="status"
                                                value="Ditolak"
                                                class="btn btn-reject"
                                            >
                                                Tolak
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            @endif

        </section>

        <footer>
            © {{ date('Y') }} DocuFlow — Sistem Manajemen Dokumen Internal
        </footer>

    </main>

</div>

</body>
</html>