<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Dokumen - DocuFlow</title>

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

        header {
            background: #173b65;
            color: white;
            padding: 22px 35px;
            font-size: 25px;
            font-weight: bold;
        }

        .container {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0 0 8px;
            color: #173b65;
            font-size: 28px;
        }

        .subtitle {
            color: #64748b;
            margin: 0;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            border-radius: 7px;
            text-decoration: none;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #1971b8;
            color: white;
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #173b65;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 14px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            padding: 15px 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #f8fafc;
            color: #334155;
        }

        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            background: #fef3c7;
            color: #92400e;
            font-size: 13px;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 45px 15px;
            color: #64748b;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px;
            }

            .card {
                padding: 18px;
            }
        }
    </style>
</head>

<body>

<header>DocuFlow</header>

<div class="container">
    <div class="card">

        <div class="top">
            <div>
                <h1>Pengajuan Dokumen</h1>
                <p class="subtitle">
                    Kelola dan pantau status pengajuan dokumenmu.
                </p>
            </div>

            <a href="{{ route('pengajuan.create') }}"
               class="btn btn-primary">
                + Ajukan Dokumen
            </a>
        </div>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        @if ($pengajuans->count() > 0)
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Dokumen</th>
                            <th>Kategori</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pengajuans as $pengajuan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengajuan->judul }}</td>
                                <td>{{ $pengajuan->kategori }}</td>
                                <td>
                                    {{ $pengajuan->created_at->format('d/m/Y') }}
                                </td>
                                <td>
                                    <span class="status">
                                        {{ $pengajuan->status }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty">
                <h3>Belum Ada Pengajuan</h3>
                <p>Kamu belum mengajukan dokumen apa pun.</p>

                <a href="{{ route('pengajuan.create') }}"
                   class="btn btn-primary">
                    Ajukan Dokumen Pertama
                </a>
            </div>
        @endif

        <br>

        <a href="{{ route('dashboard') }}"
           class="btn btn-secondary">
            Kembali ke Dashboard
        </a>

    </div>
</div>

</body>
</html>