```blade
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | DocuFlow</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-white text-slate-800 antialiased">

    <main class="grid min-h-screen md:grid-cols-2">

        <!-- Panel Kiri -->
        <section class="flex flex-col items-center justify-center bg-blue-50 px-8 py-12 text-center">

            <div class="mb-7 flex h-16 w-16 items-center justify-center rounded-2xl bg-blue-600 text-white shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="h-9 w-9" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M7 3.75h7l5 5v11.5a.75.75 0 0 1-.75.75h-11.5a.75.75 0 0 1-.75-.75V4.5a.75.75 0 0 1 .75-.75Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14 4v5h5M9 14h6M9 17h6"/>
                </svg>
            </div>

            <h1 class="text-4xl font-bold tracking-tight text-slate-900">
                Docu<span class="text-blue-600">Flow</span>
            </h1>

            <p class="mt-4 max-w-xs leading-7 text-slate-500">
                Sistem Pengajuan dan Persetujuan Dokumen Internal
            </p>

            <!-- Ilustrasi Dokumen -->
<div class="my-8 flex h-56 w-full items-center justify-center">
    <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 320 250"
        style="width: 280px; height: 220px; max-width: 100%;"
        fill="none">

        <ellipse cx="160" cy="130" rx="135" ry="100" fill="#DBEAFE"/>

        <rect x="65" y="42" width="120" height="155" rx="10" fill="#BFDBFE"/>
        <path d="M155 42 L185 72 L155 72 Z" fill="#93C5FD"/>

        <rect x="125" y="70" width="120" height="150" rx="10" fill="white"/>
        <path d="M215 70 L245 100 L215 100 Z" fill="#DBEAFE"/>

        <g stroke="#BFDBFE" stroke-width="7" stroke-linecap="round">
            <path d="M85 95 H155"/>
            <path d="M85 117 H155"/>
            <path d="M85 139 H145"/>
            <path d="M145 125 H205"/>
            <path d="M145 148 H215"/>
            <path d="M145 171 H205"/>
            <path d="M145 194 H195"/>
        </g>

        <path d="M75 145 L115 160 V190 Q115 215 75 235 Q35 215 35 190 V160 Z"
            fill="#2563EB"/>
        <path d="M55 184 L69 198 L96 170"
            stroke="white" stroke-width="8" stroke-linecap="round"
            stroke-linejoin="round"/>

        <path d="M245 168 L275 180 V203 Q275 224 245 239 Q215 224 215 203 V180 Z"
            fill="#1D4ED8"/>
        <path d="M231 201 L242 212 L260 192"
            stroke="white" stroke-width="6" stroke-linecap="round"
            stroke-linejoin="round"/>
    </svg>
</div>

            <p class="text-sm text-slate-500">
                Sistem Manajemen Dokumen Internal
            </p>

        </section>

        <!-- Panel Kanan -->
        <section class="flex items-center justify-center px-6 py-12 sm:px-12 lg:px-20">

            <div class="w-full max-w-md">

                <div class="mb-8">
                    <h2 class="text-3xl font-bold tracking-tight text-slate-900">
                        Buat akun Anda
                    </h2>

                    <p class="mt-3 text-sm text-slate-500">
                        Daftarkan akun untuk mulai menggunakan DocuFlow.
                    </p>
                </div>

                @if ($errors->any())
                    <div class="mb-5 rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                        <ul class="list-inside list-disc">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="mb-2 block text-sm font-semibold">
                            Nama Lengkap
                        </label>

                        <input id="name" name="name" type="text"
                            value="{{ old('name') }}" required autofocus
                            autocomplete="name"
                            placeholder="Masukkan nama lengkap"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold">
                            Email
                        </label>

                        <input id="email" name="email" type="email"
                            value="{{ old('email') }}" required
                            autocomplete="username"
                            placeholder="nama@perusahaan.com"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                    </div>

                    <div>
                        <label for="password" class="mb-2 block text-sm font-semibold">
                            Kata Sandi
                        </label>

                        <input id="password" name="password" type="password"
                            required autocomplete="new-password"
                            placeholder="Minimal 8 karakter"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                    </div>

                    <div>
                        <label for="password_confirmation"
                            class="mb-2 block text-sm font-semibold">
                            Konfirmasi Kata Sandi
                        </label>

                        <input id="password_confirmation"
                            name="password_confirmation" type="password"
                            required autocomplete="new-password"
                            placeholder="Ulangi kata sandi"
                            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10">
                    </div>

                    <button type="submit"
                        class="w-full rounded-xl bg-blue-600 px-4 py-3.5 font-semibold text-white shadow-lg shadow-blue-600/20 transition hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-500/30">
                        Daftar ke DocuFlow
                    </button>

                </form>

                <p class="mt-7 text-center text-sm text-slate-500">
                    Sudah memiliki akun?
                    <a href="{{ route('login') }}"
                        class="font-semibold text-blue-600 hover:text-blue-700">
                        Masuk sekarang
                    </a>
                </p>

            </div>
        </section>

    </main>

</body>
</html>
```
