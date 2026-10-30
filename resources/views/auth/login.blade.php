<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | DocuFlow</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: #ffffff;
            color: #172b4d;
        }

        .login-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 100vh;
        }

        /* PANEL KIRI */
        .brand-panel {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 55px 45px;
            text-align: center;
            background: linear-gradient(145deg, #f0f7ff, #e5f0ff);
        }

        .brand-logo {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 68px;
            height: 68px;
            margin-bottom: 20px;
            border-radius: 19px;
            color: white;
            background: #1764ed;
            box-shadow: 0 10px 25px rgba(23, 100, 237, 0.2);
        }

        .brand-logo svg {
            width: 39px;
            height: 39px;
        }

        .brand-title {
            margin: 0;
            font-size: 34px;
            font-weight: 800;
            letter-spacing: -1.2px;
            color: #172b4d;
        }

        .brand-title span {
            color: #1764ed;
        }

        .brand-description {
            max-width: 290px;
            margin: 12px 0 0;
            color: #64748b;
            font-size: 14px;
            line-height: 1.8;
        }

        .illustration {
            width: 100%;
            max-width: 390px;
            margin-top: 35px;
        }

        .brand-footer {
            margin-top: 25px;
            color: #8293ad;
            font-size: 12px;
        }

        /* PANEL KANAN */
        .form-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 55px 40px;
            background: #ffffff;
        }

        .form-container {
            width: 100%;
            max-width: 410px;
        }

        .form-title {
            margin: 0;
            font-size: 27px;
            font-weight: 750;
            letter-spacing: -0.5px;
            color: #172b4d;
        }

        .form-description {
            margin: 10px 0 32px;
            color: #7b879b;
            font-size: 14px;
        }

        .error-message {
            margin-bottom: 20px;
            padding: 12px 14px;
            border: 1px solid #fecaca;
            border-radius: 9px;
            background: #fef2f2;
            color: #b91c1c;
            font-size: 13px;
        }

        .status-message {
            margin-bottom: 20px;
            padding: 12px 14px;
            border-radius: 9px;
            background: #f0fdf4;
            color: #15803d;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 23px;
        }

        .label-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
            margin-bottom: 9px;
        }

        .form-label {
            display: block;
            color: #24344d;
            font-size: 14px;
            font-weight: 600;
        }

        .forgot-link,
        .register-link {
            color: #1764ed;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
        }

        .forgot-link:hover,
        .register-link:hover {
            text-decoration: underline;
        }

        .form-input {
            width: 100%;
            height: 49px;
            padding: 0 15px;
            border: 1px solid #d9e1ec;
            border-radius: 10px;
            outline: none;
            background: #f8fafc;
            color: #172b4d;
            font-size: 14px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-input::placeholder {
            color: #a0aec0;
        }

        .form-input:focus {
            border-color: #1764ed;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(23, 100, 237, 0.12);
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper .form-input {
            padding-right: 48px;
        }

        .toggle-password {
            position: absolute;
            top: 50%;
            right: 14px;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #8190a5;
            cursor: pointer;
            font-size: 12px;
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 3px 0 27px;
            color: #52627a;
            font-size: 13px;
            cursor: pointer;
        }

        .remember-row input {
            width: 15px;
            height: 15px;
            accent-color: #1764ed;
            cursor: pointer;
        }

        .submit-button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            min-height: 49px;
            padding: 13px 18px;
            border: none;
            border-radius: 9px;
            background: #1764ed;
            color: #ffffff;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            box-shadow: 0 6px 14px rgba(23, 100, 237, 0.16);
            transition: background 0.2s, transform 0.2s;
        }

        .submit-button:hover {
            background: #0d52ce;
            transform: translateY(-1px);
        }

        .register-text {
            margin-top: 26px;
            color: #8490a2;
            text-align: center;
            font-size: 13px;
        }

        /* RESPONSIVE */
        @media (max-width: 760px) {
            .login-layout {
                grid-template-columns: 1fr;
            }

            .brand-panel {
                padding: 35px 24px 28px;
            }

            .brand-logo {
                width: 55px;
                height: 55px;
                margin-bottom: 13px;
            }

            .brand-logo svg {
                width: 32px;
                height: 32px;
            }

            .brand-title {
                font-size: 29px;
            }

            .brand-description {
                margin-top: 8px;
            }

            .illustration {
                max-width: 230px;
                margin-top: 18px;
            }

            .brand-footer {
                margin-top: 12px;
            }

            .form-panel {
                padding: 38px 24px 45px;
            }

            .form-title {
                font-size: 24px;
            }

            .form-description {
                margin-bottom: 27px;
            }
        }

        @media (max-width: 380px) {
            .brand-panel {
                padding-right: 18px;
                padding-left: 18px;
            }

            .form-panel {
                padding-right: 20px;
                padding-left: 20px;
            }
        }
    </style>
</head>

<body>
    <main class="login-layout">

        <!-- PANEL KIRI: IDENTITAS DOCUFLOW -->
        <section class="brand-panel">

            <div class="brand-logo">
                <svg xmlns="http://www.w3.org/2000/svg"
                     viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="1.7"
                     stroke-linecap="round" stroke-linejoin="round">
                    <path d="M7 3.5h7l5 5v11a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-15a1 1 0 0 1 1-1Z"/>
                    <path d="M14 3.5v5h5"/>
                    <path d="M9 13h6M9 16h6"/>
                </svg>
            </div>

            <h1 class="brand-title">
                Docu<span>Flow</span>
            </h1>

            <p class="brand-description">
                Sistem Pengajuan dan<br>
                Persetujuan Dokumen Internal
            </p>

            <!-- Ilustrasi dokumen dan perisai keamanan -->
            <svg class="illustration"
                 xmlns="http://www.w3.org/2000/svg"
                 viewBox="0 0 390 330"
                 role="img"
                 aria-label="Ilustrasi dokumen dan perlindungan keamanan">

                <defs>
                    <linearGradient id="paperBlue" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="#dceaff"/>
                        <stop offset="100%" stop-color="#b7d2ff"/>
                    </linearGradient>

                    <linearGradient id="shieldBlue" x1="0" y1="0" x2="1" y2="1">
                        <stop offset="0%" stop-color="#3584ff"/>
                        <stop offset="100%" stop-color="#0752d5"/>
                    </linearGradient>

                    <filter id="paperShadow" x="-30%" y="-30%" width="160%" height="170%">
                        <feDropShadow dx="0" dy="9" stdDeviation="9"
                                      flood-color="#6089c7" flood-opacity="0.2"/>
                    </filter>
                </defs>

                <!-- Latar ilustrasi -->
                <ellipse cx="190" cy="178" rx="157" ry="118" fill="#dceaff" opacity="0.8"/>
                <circle cx="94" cy="195" r="60" fill="#c8ddff" opacity="0.7"/>
                <circle cx="286" cy="145" r="64" fill="#c8ddff" opacity="0.6"/>
                <ellipse cx="190" cy="270" rx="118" ry="15" fill="#b7ceef" opacity="0.35"/>

                <!-- Dokumen belakang -->
                <g transform="translate(62 74)" filter="url(#paperShadow)">
                    <path d="M17 0h112l28 28v149a10 10 0 0 1-10 10H17a10 10 0 0 1-10-10V10A10 10 0 0 1 17 0Z"
                          fill="url(#paperBlue)"/>
                    <path d="M129 0v28h28" fill="#a5c6fa"/>
                    <path d="M29 55h85M29 77h85M29 99h63M29 121h77"
                          stroke="#ffffff" stroke-width="7" stroke-linecap="round" opacity="0.85"/>
                </g>

                <!-- Dokumen utama -->
                <g transform="translate(147 100)" filter="url(#paperShadow)">
                    <path d="M18 0h111l28 28v156a10 10 0 0 1-10 10H18a10 10 0 0 1-10-10V10A10 10 0 0 1 18 0Z"
                          fill="#ffffff"/>
                    <path d="M129 0v28h28" fill="#e4efff"/>
                    <path d="M31 57h79M31 79h94M31 101h88M31 123h72M31 145h87"
                          stroke="#d6e4f7" stroke-width="7" stroke-linecap="round"/>
                </g>

                <!-- Perisai kiri -->
                <g transform="translate(44 177)" filter="url(#paperShadow)">
                    <path d="M43 0 79 13v31c0 28-21 43-36 51C28 87 7 72 7 44V13Z"
                          fill="url(#shieldBlue)"/>
                    <path d="m27 46 11 11 22-25"
                          stroke="#ffffff" stroke-width="7"
                          stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </g>

                <!-- Perisai kanan -->
                <g transform="translate(237 218)" filter="url(#paperShadow)">
                    <path d="M36 0 67 11v26c0 23-18 36-31 43C23 73 5 60 5 37V11Z"
                          fill="url(#shieldBlue)"/>
                    <path d="m23 37 9 9 17-20"
                          stroke="#ffffff" stroke-width="5"
                          stroke-linecap="round" stroke-linejoin="round" fill="none"/>
                </g>
            </svg>

            <p class="brand-footer">
                Sistem Manajemen Dokumen Internal
            </p>
        </section>

        <!-- PANEL KANAN: FORM LOGIN -->
        <section class="form-panel">
            <div class="form-container">

                <h2 class="form-title">Masuk ke akun Anda</h2>

                <p class="form-description">
                    Silakan gunakan akun perusahaan Anda.
                </p>

                @if ($errors->any())
                    <div class="error-message" role="alert">
                        Email atau kata sandi tidak valid.
                        Silakan periksa kembali.
                    </div>
                @endif

                @if (session('status'))
                    <div class="status-message" role="status">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email" class="form-label"
                               style="margin-bottom: 9px;">
                            Email
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="nama@perusahaan.com"
                            class="form-input"
                        >
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <div class="label-row">
                            <label for="password" class="form-label">
                                Password
                            </label>

                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                   class="forgot-link">
                                    Lupa password?
                                </a>
                            @endif
                        </div>

                        <div class="password-wrapper">
                            <input
                                id="password"
                                name="password"
                                type="password"
                                required
                                autocomplete="current-password"
                                placeholder="Masukkan password"
                                class="form-input"
                            >

                            <button type="button"
                                    class="toggle-password"
                                    id="togglePassword"
                                    aria-label="Tampilkan kata sandi">
                                Lihat
                            </button>
                        </div>
                    </div>

                    <!-- Ingat saya -->
                    <label class="remember-row">
                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                        >
                        <span>Ingat saya</span>
                    </label>

                    <!-- Tombol login -->
                    <button type="submit" class="submit-button">
                        Masuk
                    </button>
                </form>

                @if (Route::has('register'))
                    <p class="register-text">
                        Belum memiliki akun?
                        <a href="{{ route('register') }}"
                           class="register-link">
                            Daftar sekarang
                        </a>
                    </p>
                @endif

            </div>
        </section>

    </main>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            togglePassword.textContent = isPassword ? 'Sembunyi' : 'Lihat';
            togglePassword.setAttribute(
                'aria-label',
                isPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi'
            );
        });
    </script>
</body>
</html>
```
