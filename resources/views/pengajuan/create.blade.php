<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Dokumen - DocuFlow</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f6fb;
            color: #153b65;
        }

        header {
            background: #153b65;
            color: white;
            padding: 22px 40px;
            font-size: 25px;
            font-weight: bold;
        }

        main {
            max-width: 850px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        h1 {
            margin-top: 0;
            font-size: 28px;
        }

        .subtitle {
            color: #64748b;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin: 20px 0 8px;
            font-weight: bold;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #dbe3ef;
            border-radius: 7px;
            font-size: 15px;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        input:focus, select:focus, textarea:focus {
            outline: 2px solid #93c5fd;
            border-color: #1769aa;
        }

        .actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
        }

        .primary {
            background: #1769aa;
            color: white;
        }

        .secondary {
            background: #e8eef6;
            color: #153b65;
        }

        @media (max-width: 600px) {
            header {
                padding: 20px;
            }

            .card {
                padding: 22px;
            }
        }
    </style>
</head>

<body>
    <header>DocuFlow</header>

    <main>
        <div class="card">
            <h1>Ajukan Dokumen</h1>

            <p class="subtitle">
                Lengkapi informasi berikut untuk mengajukan dokumen.
            </p>

           <form action="{{ route('pengajuan.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

                <label for="judul">Judul Dokumen</label>
                <input
                    type="text"
                    id="judul"
                    name="judul"
                    placeholder="Contoh: Surat Cuti"
                    required
                >

                <label for="kategori">Kategori Dokumen</label>
                <select id="kategori" name="kategori" required>
                    <option value="">Pilih kategori</option>
                    <option value="Kepegawaian">Kepegawaian</option>
                    <option value="Operasional">Operasional</option>
                    <option value="Keuangan">Keuangan</option>
                    <option value="Akademik">Akademik</option>
                    <option value="Lainnya">Lainnya</option>
                </select>

                <label for="deskripsi">Deskripsi</label>
                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    placeholder="Jelaskan tujuan pengajuan dokumen..."
                    required
                ></textarea>

                <label for="file">Lampiran Dokumen</label>
                <input
    type="file"
    id="lampiran"
    name="lampiran"
    accept=".pdf,.doc,.docx"
    required
>

                <div class="actions">
                    <button type="submit" class="button primary">
                        Kirim Pengajuan
                    </button>

                    <a href="/dashboard" class="button secondary">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>