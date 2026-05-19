<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact Us - SkillNest</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="contact-page">

    @include('partials.header')

    <main class="flex-1">

        <section class="contact-wrapper">

            {{-- Decorations --}}
            <div class="contact-deco-circle-1"></div>
            <div class="contact-deco-circle-2"></div>
            <div class="contact-deco-circle-3"></div>
            <div class="contact-deco-square-1"></div>
            <div class="contact-deco-square-2"></div>

            {{-- HERO --}}
            <div class="contact-hero">
                <span class="contact-badge">
                    CONTACT SKILLNEST
                </span>

                <h1 class="contact-heading">
                    Hubungi Tim SkillNest
                </h1>

                <p class="contact-subtext">
                    Punya pertanyaan tentang layanan, akun,
                    atau kolaborasi UMKM?
                    Kirim pesanmu dan tim SkillNest akan
                    membantu dengan cepat.
                </p>
            </div>

            {{-- CARD --}}
         <div class="contact-card">

    <div class="contact-grid">

        {{-- LEFT --}}
        <div class="contact-left">

            <div class="contact-left-circle-1"></div>
            <div class="contact-left-circle-2"></div>

            <div class="contact-left-content">

                <h2 class="contact-left-title">
                    Mari Terhubung
                </h2>

                <p class="contact-left-sub">
                    Kami siap membantu mahasiswa
                    dan UMKM untuk berkolaborasi
                    melalui SkillNest.
                </p>

                {{-- CONTACT ITEMS --}}
                <div class="contact-items">

                    {{-- EMAIL --}}
                    <div class="contact-item">

                        <div class="contact-icon">
                            ✉
                        </div>

                        <div>
                            <p class="contact-item-label">
                                Email
                            </p>

                            <p class="contact-item-value">
                                hello@skillnest.com
                            </p>
                        </div>

                    </div>

                    {{-- PHONE --}}
                    <div class="contact-item">

                        <div class="contact-icon">
                            ☎
                        </div>

                        <div>
                            <p class="contact-item-label">
                                Telepon
                            </p>

                            <p class="contact-item-value">
                                +62 812 3456 7890
                            </p>
                        </div>

                    </div>

                    {{-- LOCATION --}}
                    <div class="contact-item">

                        <div class="contact-icon">
                            📍
                        </div>

                        <div>
                            <p class="contact-item-label">
                                Lokasi
                            </p>

                            <p class="contact-item-value">
                                Universitas Airlangga, Surabaya
                            </p>
                        </div>

                    </div>

                </div>

                {{-- BADGE --}}
                <div class="contact-response-badge">
                    Respon Maksimal 24 Jam
                </div>

            </div>

        </div>

        {{-- RIGHT --}}
        <div>

            <h2 class="contact-form-title">
                Kirim Pesan
            </h2>

            <p class="contact-form-sub">
                Isi form berikut agar tim SkillNest
                dapat menghubungimu kembali.
            </p>

            <form
                action="{{ route('contact.send') }}"
                method="POST"
                class="contact-form"
            >
                @csrf

                {{-- NAME + EMAIL --}}
                <div class="contact-form-row">

                    {{-- NAME --}}
                    <div>

                        <label class="contact-label">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Nama kamu"
                            class="input-field {{ $errors->has('name') ? 'input-error' : '' }}"
                        >

                        @error('name')
                            <p class="field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- EMAIL --}}
                    <div>

                        <label class="contact-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            class="input-field {{ $errors->has('email') ? 'input-error' : '' }}"
                        >

                        @error('email')
                            <p class="field-error">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>

                {{-- CATEGORY --}}
                <div>

                    <label class="contact-label">
                        Kategori Bantuan
                    </label>

                    <select
                        name="category"
                        class="contact-select {{ $errors->has('category') ? 'input-error' : '' }}"
                    >
                        <option value="">
                            Pilih kategori pesan
                        </option>

                        <option
                            value="umkm"
                            {{ old('category') == 'umkm' ? 'selected' : '' }}
                        >
                            Kerjasama UMKM
                        </option>

                        <option
                            value="jasa"
                            {{ old('category') == 'jasa' ? 'selected' : '' }}
                        >
                            Menjadi Penyedia Jasa
                        </option>

                        <option
                            value="partnership"
                            {{ old('category') == 'partnership' ? 'selected' : '' }}
                        >
                            Partnership
                        </option>

                        <option
                            value="lainnya"
                            {{ old('category') == 'lainnya' ? 'selected' : '' }}
                        >
                            Lainnya
                        </option>

                    </select>

                    @error('category')
                        <p class="field-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- MESSAGE --}}
                <div>

                    <label class="contact-label">
                        Pesan
                    </label>

                    <textarea
                        name="message"
                        placeholder="Tulis pesan atau pertanyaanmu di sini"
                        class="textarea-field {{ $errors->has('message') ? 'input-error' : '' }}"
                    >{{ old('message') }}</textarea>

                    @error('message')
                        <p class="field-error">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- SUCCESS --}}
                @if(session('success'))
                    <div class="success-box">
                        ✓ {{ session('success') }}
                    </div>
                @endif

                {{-- BUTTON --}}
                <button type="submit" class="btn-primary w-full">
                    Kirim Pesan
                </button>

            </form>

        </div>

    </div>

</div>
        </section>

    </main>

    @include('partials.footer')

</body>
</html>