<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - DocuFlow</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 245px;
            height: 100vh;
            background: #123b63;
            color: white;
            padding: 25px 18px;
        }

        .brand {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #cbd5e1;
            font-size: 13px;
            margin-bottom: 35px;
        }

        .menu-title {
            font-size: 11px;
            color: #a9c1d8;
            margin: 22px 10px 10px;
            text-transform: uppercase;
        }

        .menu {
            display: block;
            padding: 13px 15px;
            margin-bottom: 7px;
            color: #e2e8f0;
            text-decoration: none;
            border-radius: 8px;
        }

        .menu:hover,
        .menu.active {
            background: #245783;
            color: white;
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout button {
            width: 100%;
            padding: 12px;
            background: #dc2626;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .main {
            margin-left: 245px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 28px;
        }

        .topbar h1 {
            margin: 0 0 8px;
            font-size: 27px;
        }

        .topbar p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .profile {
            background: white;
            padding: 12px 18px;
            border-radius: 10px;
            box-shadow: 0 2px 8px #00000008;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 23px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000a;
        }

        .card-label {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 14px;
        }

        .card-number {
            font-size: 30px;
            font-weight: bold;
            color: #123b63;
        }

        .section {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 12px #0000000a;
            margin-bottom: 25px;
        }

        .section h2 {
            margin: 0 0 10px;
            font-size: 20px;
        }

        .section p {
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        .actions {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            padding: 12px 17px;
            background: #123b63;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 14px;
        }

        .button:hover {
            background: #245783;
        }

        .notice {
            background: #eff6ff;
            border-left: 4px solid #2563eb;
            padding: 15px;
            border-radius: 5px;
            font-size: 14px;
            line-height: 1.7;
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 200px;
            }

            .main {
                margin-left: 200px;
                padding: 20px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .logout {
                position: static;
                margin-top: 25px;
            }

            .main {
                margin-left: 0;
                padding: 18px;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <aside class="sidebar">
        <div class="brand">DocuFlow</div>
        <div class="subtitle">Sistem Pengelolaan Dokumen</div>

        <div class="menu-title">Menu Utama</div>

        <a href="{{ route('dashboard') }}" class="menu active">
            Dashboard
        </a>

        <a href="{{ route('pengguna.index') }}" class="menu">
            Manajemen Pengguna
        </a>

        <a href="{{ route('laporan.index') }}" class="menu">
            Laporan
        </a>

        <a href="{{ route('pengaturan.index') }}" class="menu">
            Pengaturan
        </a>

        <div class="logout">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Keluar dari Aplikasi</button>
            </form>
        </div>
    </aside>

    <main class="main">

        <div class="topbar">
            <div>
                <h1>Dashboard Admin</h1>
                <p>Kelola pengguna dan pantau aplikasi DocuFlow.</p>
            </div>

            <div class="profile">
                Admin: <strong>{{ auth()->user()->name }}</strong>
            </div>
        </div>

        <div class="cards">
            <div class="card">
                <div class="card-label">Total Pengguna</div>
                <div class="card-number">
                    {{ \App\Models\User::count() }}
                </div>
            </div>

            <div class="card">
                <div class="card-label">Jumlah Pegawai</div>
                <div class="card-number">
                    {{ \App\Models\User::where('role', 'pegawai')->count() }}
                </div>
            </div>

            <div class="card">
                <div class="card-label">Jumlah Atasan</div>
                <div class="card-number">
                    {{ \App\Models\User::where('role', 'atasan')->count() }}
                </div>
            </div>
        </div>

        <section class="section">
            <h2>Selamat Datang, Admin!</h2>

            <p>
                Dashboard ini digunakan oleh Admin Aplikasi untuk
                mengelola akun pengguna dan memantau informasi sistem
                DocuFlow.
            </p>

            <div class="notice">
                <strong>Informasi keamanan:</strong><br>
                Pendaftaran akun biasa ditujukan untuk Pegawai.
                Hak akses Atasan dan Admin Aplikasi harus ditetapkan
                secara khusus dan tidak boleh dipilih bebas melalui
                formulir pendaftaran.
            </div>
        </section>

        <section class="section">
            <h2>Manajemen Pengguna</h2>

            <p>
                Buka halaman manajemen pengguna untuk melihat akun
                yang terdaftar di dalam aplikasi.
            </p>

            <div class="actions">
                <a href="{{ route('pengguna.index') }}" class="button">
                    Kelola Pengguna
                </a>
            </div>
        </section>

        <section class="section">
            <h2>Laporan dan Pengaturan</h2>

            <p>
                Admin dapat membuka halaman laporan dan pengaturan
                aplikasi sesuai fitur yang tersedia.
            </p>

            <div class="actions">
                <a href="{{ route('laporan.index') }}" class="button">
                    Lihat Laporan
                </a>

                <a href="{{ route('pengaturan.index') }}" class="button">
                    Buka Pengaturan
                </a>
            </div>
        </section>

    </main>

</body>
</html>