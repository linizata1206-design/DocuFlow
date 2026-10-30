<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Pegawai - DocuFlow</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #26364b;
        }

        header {
            height: 82px;
            background: #123653;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 35px;
        }

        .brand {
            font-size: 27px;
            font-weight: bold;
        }

        .brand span {
            color: #68c5f3;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .avatar {
            width: 43px;
            height: 43px;
            border-radius: 50%;
            background: #dcecff;
            color: #174a70;
            display: grid;
            place-items: center;
            font-weight: bold;
            font-size: 18px;
        }

        .profile-name {
            font-size: 14px;
            font-weight: bold;
        }

        .profile-role {
            font-size: 12px;
            margin-top: 4px;
            color: #c7d8e8;
        }

        .layout {
            display: flex;
            min-height: calc(100vh - 82px);
        }

        aside {
            width: 245px;
            flex-shrink: 0;
            background: #123653;
            padding: 28px 15px;
            color: white;
        }

        .menu-title {
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1.5px;
            color: #8faec6;
            padding: 8px 15px 18px;
        }

        .menu {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 14px 15px;
            margin-bottom: 7px;
            border-radius: 8px;
            text-decoration: none;
            color: #d5e2ee;
            font-size: 14px;
            transition: .2s;
        }

        .menu:hover,
        .menu.active {
            background: #245477;
            color: white;
        }

        .menu.active {
            border-left: 4px solid #68c5f3;
            padding-left: 11px;
            font-weight: bold;
        }

        .menu-icon {
            width: 20px;
            text-align: center;
            font-size: 17px;
        }

        main {
            flex: 1;
            min-width: 0;
            padding: 32px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 27px;
        }

        h1 {
            font-size: 29px;
            color: #153b65;
            margin-bottom: 9px;
        }

        .subtitle {
            color: #718096;
            font-size: 14px;
            line-height: 1.6;
        }

        .button {
            display: inline-block;
            background: #1672b9;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 13px 18px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            white-space: nowrap;
            cursor: pointer;
        }

        .button:hover {
            background: #105b96;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: white;
            padding: 23px 21px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(25, 50, 80, .045);
            border-top: 4px solid #2481c4;
        }

        .stat-card.pending {
            border-top-color: #e8ad32;
        }

        .stat-card.approved {
            border-top-color: #27a56b;
        }

        .stat-card.rejected {
            border-top-color: #e25c62;
        }

        .stat-label {
            font-size: 13px;
            color: #718096;
            line-height: 1.5;
        }

        .stat-number {
            font-size: 34px;
            font-weight: bold;
            color: #173b61;
            margin: 13px 0 8px;
        }

        .stat-note {
            font-size: 11px;
            color: #94a3b8;
            line-height: 1.5;
        }

        .card {
            background: white;
            padding: 27px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(25, 50, 80, .045);
        }

        .table-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 23px;
        }

        h2 {
            font-size: 20px;
            color: #153b65;
        }

        .search {
            width: 235px;
            max-width: 100%;
            padding: 11px 14px;
            border: 1px solid #dbe4ef;
            border-radius: 8px;
            outline: none;
            font-size: 13px;
        }

        .search:focus {
            border-color: #368bc6;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 650px;
        }

        thead {
            background: #f5f8fc;
        }

        th {
            padding: 16px 13px;
            text-align: left;
            font-size: 11px;
            color: #60758d;
            letter-spacing: .3px;
        }

        td {
            padding: 17px 13px;
            border-bottom: 1px solid #edf1f6;
            font-size: 13px;
        }

        tbody tr:hover {
            background: #fafcff;
        }

        .doc-title {
            font-weight: bold;
            color: #30445c;
        }

        .category {
            color: #718096;
        }

        .badge {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .badge.pending {
            background: #fff1c9;
            color: #986b00;
        }

        .badge.approved {
            background: #d9f5e6;
            color: #18794e;
        }

        .badge.rejected {
            background: #ffe0e0;
            color: #bd343b;
        }

        .detail {
            display: inline-block;
            padding: 7px 12px;
            border-radius: 6px;
            background: #e6f2ff;
            color: #1769aa;
            text-decoration: none;
            font-size: 12px;
            font-weight: bold;
        }

        .detail:hover {
            background: #d2e8ff;
        }

        .empty {
            text-align: center;
            padding: 55px 15px;
            color: #7b8ba1;
        }

        .empty-icon {
            font-size: 35px;
            margin-bottom: 15px;
        }

        .empty strong {
            display: block;
            color: #30445c;
            margin-bottom: 9px;
        }

        footer {
            text-align: center;
            padding: 25px 10px 5px;
            font-size: 12px;
            color: #91a0b2;
        }

        @media (max-width: 1100px) {
            main {
                padding: 25px 20px;
            }

            .stats {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            aside {
                width: 205px;
            }
        }

        @media (max-width: 700px) {
            header {
                padding: 0 18px;
            }

            .brand {
                font-size: 23px;
            }

            .layout {
                display: block;
            }

            aside {
                width: 100%;
                padding: 12px;
            }

            .menu-title {
                padding: 8px 10px;
            }

            aside nav {
                display: flex;
                gap: 6px;
                overflow-x: auto;
            }

            .menu {
                flex-shrink: 0;
                padding: 11px;
                margin: 0;
            }

            .menu.active {
                padding-left: 7px;
            }

            main {
                padding: 22px 15px;
            }

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .stats {
                gap: 12px;
            }

            .stat-card {
                padding: 17px 14px;
            }

            .stat-number {
                font-size: 28px;
            }

            .card {
                padding: 18px 13px;
            }

            .table-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .search {
                width: 100%;
            }
        }
        .logout-btn {
    width: 100%;
    padding: 14px 18px;
    background: transparent;
    color: white;
    border: 1px solid #7c9bb5;
    border-radius: 8px;
    text-align: left;
    font-size: 15px;
    cursor: pointer;
}

.logout-btn:hover {
    background: #285675;
}
    </style>
</head>

<body>
    <header>
        <div class="brand">Docu<span>Flow</span></div>

        <div class="profile">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </div>

            <div>
                <div class="profile-name">{{ auth()->user()->name }}</div>
                <div class="profile-role">Pegawai</div>
            </div>
        </div>
    </header>

    <div class="layout">
        <aside>
            <div class="menu-title">MENU UTAMA</div>

            <nav>
                <a href="{{ route('dashboard') }}" class="menu active">
                    <span class="menu-icon">▦</span> Dashboard
                </a>

                <a href="/pengajuan" class="menu">
    &nbsp; Pengajuan Dokumen
</a>


                <a href="{{ route('pengajuan.index') }}" class="menu">
    <span class="menu-icon">📄</span> Dokumen Saya
</a>

<form action="{{ route('logout') }}" method="POST" style="margin-top: 20px;">
    @csrf
    <button type="submit" class="logout-btn">
        ↪ Logout
    </button>
</form>

            </nav>
        </aside>

        <main>
            <section class="page-heading">
                <div>
                    <h1>Dashboard Pegawai</h1>
                    <p class="subtitle">
                        Selamat datang, {{ auth()->user()->name }}!
                        Pantau pengajuan dokumenmu di sini.
                    </p>
                </div>

                <a href="/pengajuan/create" class="button">＋ Ajukan Dokumen</a>
            </section>

            <section class="stats">
    <div class="stat-card">
        <div class="stat-label">Total Pengajuan</div>
        <div class="stat-number">{{ $totalPengajuan }}</div>
        <div class="stat-note">Seluruh dokumen yang diajukan</div>
    </div>

    <div class="stat-card pending">
        <div class="stat-label">Menunggu Persetujuan</div>
        <div class="stat-number">{{ $menunggu }}</div>
        <div class="stat-note">Sedang menunggu pemeriksaan</div>
    </div>

    <div class="stat-card approved">
        <div class="stat-label">Disetujui</div>
        <div class="stat-number">{{ $disetujui }}</div>
        <div class="stat-note">Dokumen yang telah disetujui</div>
    </div>

    <div class="stat-card rejected">
        <div class="stat-label">Ditolak</div>
        <div class="stat-number">{{ $ditolak }}</div>
        <div class="stat-note">Dokumen yang ditolak</div>
    </div>
</section>

            <section class="card" id="dokumen">
                <div class="table-heading">
                    <h2>Pengajuan Terbaru</h2>

                    <input
                        type="search"
                        id="searchDokumen"
                        class="search"
                        placeholder="Cari dokumen..."
                        aria-label="Cari dokumen"
                    >
                </div>

                <div class="table-wrap">
                    <table id="tabelDokumen">
                        <thead>
                            <tr>
                                <th>NO.</th>
                                <th>JUDUL DOKUMEN</th>
                                <th>KATEGORI</th>
                                <th>TANGGAL</th>
                                <th>STATUS</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>

                        <tbody>
    @forelse ($pengajuans->take(5) as $index => $pengajuan)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $pengajuan->judul }}</td>
            <td>{{ $pengajuan->kategori }}</td>
            <td>{{ $pengajuan->created_at->format('d M Y') }}</td>
            <td>
                @if ($pengajuan->status === 'Menunggu')
                    <span class="status pending">Menunggu</span>
                @elseif ($pengajuan->status === 'Disetujui')
                    <span class="status approved">Disetujui</span>
                @elseif ($pengajuan->status === 'Ditolak')
                    <span class="status rejected">Ditolak</span>
                @else
                    <span>{{ $pengajuan->status }}</span>
                @endif
            </td>
            <td>
                <a href="{{ route('pengajuan.index') }}" class="button">
                    Detail
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6" style="text-align: center; padding: 24px;">
                Belum ada pengajuan dokumen.
            </td>
        </tr>
    @endforelse
</tbody>
                    </table>
                </div>

                <div class="empty" id="emptySearch" hidden>
                    <div class="empty-icon">⌕</div>
                    <strong>Dokumen tidak ditemukan</strong>
                    <p>Coba gunakan kata kunci yang berbeda.</p>
                </div>
            </section>

            <footer>
                © {{ date('Y') }} DocuFlow — Sistem Manajemen Dokumen Internal
            </footer>
        </main>
    </div>

    <script>
        const searchInput = document.getElementById('searchDokumen');
        const rows = document.querySelectorAll('#tabelDokumen tbody tr');
        const emptySearch = document.getElementById('emptySearch');

        searchInput.addEventListener('input', function () {
            const keyword = this.value.toLowerCase().trim();
            let visibleCount = 0;

            rows.forEach(function (row) {
                const matches = row.textContent.toLowerCase().includes(keyword);

                row.style.display = matches ? '' : 'none';

                if (matches) {
                    visibleCount++;
                }
            });

            emptySearch.hidden = visibleCount !== 0;
            document.querySelector('#tabelDokumen').style.display =
                visibleCount === 0 ? 'none' : 'table';
        });
    </script>
</body>
</html>