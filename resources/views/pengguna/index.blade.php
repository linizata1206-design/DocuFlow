<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna - DocuFlow</title>

    <style>
        * {
            box-sizing: border-box;
        }

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

        .card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            padding: 22px;
            border-radius: 10px;
            margin: 25px 0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 16px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input, select {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            font-size: 14px;
        }

        button {
            border: none;
            padding: 10px 14px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            color: white;
        }

        .btn-add {
            background: #173b63;
            margin-top: 18px;
        }

        .btn-update {
            background: #2563eb;
        }

        .btn-delete {
            background: #dc2626;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 13px;
            border-bottom: 1px solid #e2e8f0;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #eff6ff;
        }

        .role-form {
            display: flex;
            gap: 8px;
            min-width: 230px;
        }

        .role-form select {
            min-width: 130px;
        }

        .role {
            display: inline-block;
            background: #dbeafe;
            padding: 6px 10px;
            border-radius: 5px;
            white-space: nowrap;
        }

        .alert {
            padding: 13px 16px;
            margin: 15px 0;
            border-radius: 7px;
        }

        .success {
            background: #dcfce7;
            color: #166534;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
        }

        .validation {
            color: #b91c1c;
            font-size: 14px;
        }

        .actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .back {
            display: inline-block;
            margin-top: 25px;
            color: #1d4ed8;
        }

        @media (max-width: 650px) {
            main {
                margin: 15px;
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<header>DocuFlow — Manajemen Pengguna</header>

<main>
    <h1>Manajemen Pengguna</h1>
    <p>Admin dapat menambahkan akun, mengatur peran, dan menghapus akun pengguna.</p>

    @if (session('success'))
        <div class="alert success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert error">{{ session('error') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert error">
            <strong>Periksa kembali data yang dimasukkan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="card">
        <h2>Tambah Akun Pengguna</h2>

        <form action="{{ route('pengguna.store') }}" method="POST">
            @csrf

            <div class="form-grid">
                <div>
                    <label for="name">Nama Lengkap</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name') }}"
                        required
                    >
                </div>

                <div>
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                    >
                </div>

                <div>
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        minlength="8"
                        required
                    >
                    <small>Minimal 8 karakter.</small>
                </div>

                <div>
                    <label for="role">Peran Pengguna</label>
                    <select id="role" name="role" required>
                        <option value="pegawai">Pegawai</option>
                        <option value="atasan">Atasan</option>
                        <option value="admin_aplikasi">Admin Aplikasi</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn-add">+ Tambah Pengguna</button>
        </form>
    </section>

    <section>
        <h2>Daftar Akun Terdaftar</h2>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role Saat Ini</th>
                        <th>Ubah Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($penggunas as $pengguna)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengguna->name }}</td>
                            <td>{{ $pengguna->email }}</td>

                            <td>
                                <span class="role">
                                    {{ $pengguna->role ?? 'Belum ditentukan' }}
                                </span>
                            </td>

                            <td>
                                @if ($pengguna->id !== auth()->id())
                                    <form
                                        action="{{ route('pengguna.updateRole', $pengguna->id) }}"
                                        method="POST"
                                        class="role-form"
                                    >
                                        @csrf
                                        @method('PATCH')

                                        <select name="role" required>
                                            <option value="pegawai"
                                                {{ $pengguna->role === 'pegawai' ? 'selected' : '' }}>
                                                Pegawai
                                            </option>

                                            <option value="atasan"
                                                {{ $pengguna->role === 'atasan' ? 'selected' : '' }}>
                                                Atasan
                                            </option>

                                            <option value="admin_aplikasi"
                                                {{ $pengguna->role === 'admin_aplikasi' ? 'selected' : '' }}>
                                                Admin Aplikasi
                                            </option>
                                        </select>

                                        <button type="submit" class="btn-update">
                                            Simpan
                                        </button>
                                    </form>
                                @else
                                    <small>Akun yang sedang digunakan</small>
                                @endif
                            </td>

                            <td>
                                @if ($pengguna->id !== auth()->id())
                                    <form
                                        action="{{ route('pengguna.destroy', $pengguna->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus akun {{ addslashes($pengguna->name) }}?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                @else
                                    <small>Tidak dapat menghapus akun sendiri</small>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align:center; padding:25px;">
                                Belum ada pengguna terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>

    <a class="back" href="{{ route('dashboard') }}">
        ← Kembali ke Dashboard
    </a>
</main>

</body>
</html>