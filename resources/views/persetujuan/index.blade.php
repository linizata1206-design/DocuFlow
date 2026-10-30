<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persetujuan Dokumen - DocuFlow</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            margin: 0;
            color: #173b63;
        }

        header {
            background: #173b63;
            color: white;
            padding: 22px 35px;
            font-size: 25px;
            font-weight: bold;
        }

        main {
            max-width: 1100px;
            margin: 35px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
        }

        h1 {
            margin-top: 0;
        }

        .success {
            padding: 12px;
            background: #dcfce7;
            color: #166534;
            border-radius: 6px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        th, td {
            border-bottom: 1px solid #e2e8f0;
            padding: 14px;
            text-align: left;
        }

        th {
            background: #eff6ff;
        }

        button {
            border: 0;
            padding: 9px 12px;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            margin: 3px 0;
        }

        .approve {
            background: #15803d;
        }

        .reject {
            background: #dc2626;
        }

        .empty {
            text-align: center;
            padding: 35px;
            color: #64748b;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            color: #1d4ed8;
        }
    </style>
</head>
<body>

<header>DocuFlow — Persetujuan Dokumen</header>

<main>
    <h1>Persetujuan Dokumen</h1>
    <p>Periksa pengajuan dokumen yang menunggu persetujuan.</p>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($pengajuans->isEmpty())
        <div class="empty">
            <h3>Tidak Ada Pengajuan Menunggu</h3>
            <p>Belum ada dokumen yang perlu disetujui.</p>
        </div>
    @else
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pengajuans as $pengajuan)
                        <tr>
                            <td>{{ $pengajuan->judul }}</td>
                            <td>{{ $pengajuan->kategori }}</td>
                            <td>{{ $pengajuan->deskripsi }}</td>
                            <td>{{ $pengajuan->status }}</td>
                            <td>
                                <form action="{{ route('persetujuan.update', $pengajuan) }}"
                                      method="POST">
                                    @csrf
                                    @method('PATCH')

                                    <button class="approve"
                                            type="submit"
                                            name="status"
                                            value="Disetujui">
                                        Setujui
                                    </button>

                                    <button class="reject"
                                            type="submit"
                                            name="status"
                                            value="Ditolak">
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

    <a class="back" href="{{ route('dashboard') }}">Kembali ke Dashboard</a>
</main>

</body>
</html>