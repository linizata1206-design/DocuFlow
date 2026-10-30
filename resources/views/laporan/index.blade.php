<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - DocuFlow</title>

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
            max-width: 1000px;
            margin: 35px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
        }

        h1 {
            margin-top: 0;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 16px;
            margin-top: 25px;
        }

        .card {
            background: #eff6ff;
            border-radius: 10px;
            padding: 20px;
            border-left: 5px solid #2563eb;
        }

        .card h3 {
            font-size: 15px;
            margin-top: 0;
        }

        .number {
            font-size: 32px;
            font-weight: bold;
        }

        .back {
            display: inline-block;
            margin-top: 30px;
            color: #1d4ed8;
        }

        @media (max-width: 700px) {
            .cards {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            main {
                margin: 20px;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<header>DocuFlow — Laporan</header>

<main>
    <h1>Laporan Pengajuan Dokumen</h1>
    <p>Ringkasan status seluruh pengajuan yang tercatat di database.</p>

    <div class="cards">
        <div class="card">
            <h3>Total Pengajuan</h3>
            <div class="number">{{ $totalPengajuan }}</div>
        </div>

        <div class="card">
            <h3>Menunggu</h3>
            <div class="number">{{ $menunggu }}</div>
        </div>

        <div class="card">
            <h3>Disetujui</h3>
            <div class="number">{{ $disetujui }}</div>
        </div>

        <div class="card">
            <h3>Ditolak</h3>
            <div class="number">{{ $ditolak }}</div>
        </div>
    </div>

    <a class="back" href="{{ route('dashboard') }}">
        Kembali ke Dashboard
    </a>
</main>

</body>
</html>