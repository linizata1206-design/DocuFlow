<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Akun - DocuFlow</title>

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
            max-width: 700px;
            margin: 35px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
        }

        label {
            display: block;
            margin-top: 20px;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            box-sizing: border-box;
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 15px;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            background: #1976bd;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 6px;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            color: #1d4ed8;
        }
    </style>
</head>
<body>

<header>DocuFlow — Pengaturan</header>

<main>
    <h1>Pengaturan Akun</h1>
    <p>Kelola informasi akun yang kamu gunakan.</p>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengaturan.update') }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nama Pengguna</label>
        <input
            type="text"
            id="name"
            name="name"
            value="{{ old('name', $user->name) }}"
            required
        >

        <label for="email">Email</label>
        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email', $user->email) }}"
            required
        >

        <button type="submit">Simpan Perubahan</button>
    </form>

    <a class="back" href="{{ route('dashboard') }}">
        Kembali ke Dashboard
    </a>
</main>

</body>
</html>