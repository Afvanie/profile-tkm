<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin TOE</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gradient-to-br from-[#003B73] via-[#005BAC] to-[#003B73] flex items-center justify-center px-6">

    <div class="w-full max-w-md">

        <div class="bg-white rounded-3xl shadow-2xl p-8">

            <div class="text-center mb-8">

                <img src="{{ asset('assets/images/logo.png') }}"
                     alt="Logo TOE"
                     class="w-20 h-20 object-contain mx-auto mb-4">

                <h1 class="text-3xl font-bold text-slate-800">
                    Login Admin
                </h1>

                <p class="mt-2 text-slate-500">
                    Masuk untuk mengelola website TOE Polinema.
                </p>

            </div>

            @if (session('error'))
                <div class="mb-5 rounded-xl bg-red-50 border border-red-200 text-red-700 px-4 py-3">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-5 rounded-xl bg-red-50 border border-red-200 text-red-700 px-4 py-3">
                    Email atau password salah.
                </div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-5">

                @csrf

                <div>
                    <label class="block mb-2 font-semibold text-slate-700">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-slate-700">
                        Password
                    </label>

                    <input type="password"
                           name="password"
                           class="w-full rounded-xl border border-slate-200 px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                           required>
                </div>

                <button type="submit"
                        class="w-full py-3 rounded-xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
                    Masuk
                </button>

            </form>

            <div class="mt-6 text-center">

                <a href="{{ route('home') }}"
                   class="text-sm text-slate-500 hover:text-blue-700">
                    Kembali ke website
                </a>

            </div>

        </div>

    </div>

</body>
</html>