<!DOCTYPE html>
<html lang="az" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>İki addımlı doğrulama — RS Code</title>
    <link rel="icon" type="image/png" href="{{ asset('img/132.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
</head>
<body class="h-full bg-gray-50 font-sans antialiased flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-xl border border-gray-200 overflow-hidden">

            <div class="bg-gradient-to-r from-indigo-900 to-indigo-700 px-8 py-8 text-center">
                <img src="{{ asset('img/rs-code.png') }}" alt="RS Code" class="h-9 w-auto mx-auto mb-3 brightness-200">
                <p class="text-indigo-300 text-sm">İki addımlı doğrulama</p>
            </div>

            <div class="px-8 py-8">
                <div class="flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-50 mx-auto mb-5">
                    <svg class="w-7 h-7 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                    </svg>
                </div>

                <h1 class="text-gray-900 text-xl font-bold mb-1 text-center">Doğrulama kodu</h1>
                <p class="text-gray-500 text-sm mb-7 text-center">Google Authenticator tətbiqindəki 6 rəqəmli kodu daxil edin</p>

                @if($errors->any())
                <div class="mb-5 flex items-center gap-2 bg-red-50 border border-red-200 text-red-600 px-4 py-3 rounded-xl text-sm">
                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0"/></svg>
                    {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="/admin/2fa-challenge" class="space-y-5">
                    @csrf
                    <div>
                        <input type="text" name="code" maxlength="6" inputmode="numeric" autofocus
                               placeholder="000000"
                               class="admin-input text-center text-2xl font-mono tracking-[0.5em] py-4 @error('code') border-red-400 @enderror">
                    </div>
                    <button type="submit"
                            class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl transition-all hover:shadow-lg hover:shadow-indigo-500/30 text-sm">
                        Təsdiqlə
                    </button>
                </form>

                <div class="mt-5 text-center">
                    <a href="/admin/login" class="text-sm text-gray-400 hover:text-gray-600 transition-colors">
                        ← Geri qayıt
                    </a>
                </div>
            </div>
        </div>

        <p class="text-center text-gray-400 text-xs mt-6">
            © {{ date('Y') }} RS Code. Bütün hüquqlar qorunur.
        </p>
    </div>

</body>
</html>
