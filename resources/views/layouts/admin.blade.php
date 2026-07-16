<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - D-III Teknik Mesin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=plus-jakarta-sans:400,500,600,700,800,900" rel="stylesheet" />

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .admin-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .admin-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .admin-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(148, 163, 184, 0.35);
            border-radius: 999px;
        }

        .admin-sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            border-radius: 14px;
            font-size: 14px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .admin-sidebar-link svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .admin-sidebar-default {
            color: rgb(203 213 225);
        }

        .admin-sidebar-default:hover {
            background: rgba(255, 255, 255, 0.08);
            color: white;
        }

        .admin-sidebar-active {
            background: white;
            color: #0B376C;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.22);
        }
    </style>

    @stack('styles')
</head>

<body class="bg-slate-100 text-slate-800">

@php
    $navigationGroups = [
        [
            'label' => 'Menu Website',
            'items' => [
                [
                    'title' => 'Dashboard',
                    'route' => route('admin.dashboard'),
                    'active' => request()->routeIs('admin.dashboard'),
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l9-9 9 9M4 10v10h6v-6h4v6h6V10" /></svg>',
                ],
                [
                    'title' => 'Konten Beranda',
                    'route' => route('admin.home-content.index'),
                    'active' => request()->routeIs('admin.home-content.*'),
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5h16M4 12h16M4 19h10" /></svg>',
                ],
                [
                    'title' => 'Konten Profil',
                    'route' => route('admin.profile-contents.index'),
                    'active' => request()->routeIs('admin.profile-contents.*'),
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M5 4h14a2 2 0 012 2v12a2 2 0 01-2 2H5a2 2 0 01-2-2V6a2 2 0 012-2z" /></svg>',
                ],
                [
                    'title' => 'Akreditasi',
                    'route' => route('admin.accreditations.index'),
                    'active' => request()->routeIs('admin.accreditations.*'),
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M12 3l7 4v5c0 5-3 9-7 9s-7-4-7-9V7l7-4z" /></svg>',
                ],
                [
                    'title' => 'Dosen & Staff',
                    'route' => route('admin.lecturer-staff.index'),
                    'active' => request()->routeIs('admin.lecturer-staff.*'),
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-3.87M9 20H4v-2a4 4 0 015-3.87M12 12a4 4 0 100-8 4 4 0 000 8z" /></svg>',
                ],
                [
                    'title' => 'Akademik',
                    'route' => route('admin.academic-documents.index'),
                    'active' => request()->routeIs('admin.academic-documents.*'),
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13M12 6.253C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253" /></svg>',
                ],
                [
                    'title' => 'Dokumentasi Fasilitas',
                    'route' => route('admin.facilities.index'),
                    'active' => request()->routeIs('admin.facilities.*'),
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M4 20h16a2 2 0 002-2V6a2 2 0 00-2-2H4a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>',
                ],
            ],
        ],
        [
            'label' => 'Pengaturan',
            'items' => [
                [
                    'title' => 'Pengelola Admin',
                    'route' => route('admin.admin-users.index'),
                    'active' => request()->routeIs('admin.admin-users.*'),
                    'icon' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.5 21a6.5 6.5 0 0113 0M19 8h2m-1-1v2" /></svg>',
                ],
            ],
        ],
    ];
@endphp

<div class="min-h-screen">

    {{-- Mobile Overlay --}}
    <div id="adminOverlay"
         class="fixed inset-0 z-40 hidden bg-slate-950/50 backdrop-blur-sm lg:hidden">
    </div>


    {{-- Sidebar --}}
    <aside id="adminSidebar"
           class="fixed inset-y-0 left-0 z-50 w-72 -translate-x-full bg-[#071B3A] text-white shadow-2xl transition-transform duration-300 lg:translate-x-0">

        <div class="relative flex h-full flex-col overflow-hidden">

            {{-- Soft Accent --}}
            <div class="pointer-events-none absolute inset-0 overflow-hidden">
                <div class="absolute -right-28 -top-28 h-72 w-72 rounded-full bg-blue-400/15 blur-3xl"></div>
                <div class="absolute -bottom-28 -left-28 h-72 w-72 rounded-full bg-yellow-300/10 blur-3xl"></div>
            </div>


            {{-- Brand --}}
            <div class="relative px-5 py-5">

                <div class="flex items-center justify-between gap-3">

                    <div class="flex min-w-0 items-center gap-3">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-white shadow-lg">
                            <img src="{{ asset('assets/images/logo.png') }}"
                                 alt="Logo Polinema"
                                 class="h-8 w-8 object-contain">
                        </div>

                        <div class="min-w-0">
                            <h1 class="truncate text-base font-extrabold">
                                Admin Panel
                            </h1>

                            <p class="mt-0.5 truncate text-xs font-medium text-blue-100/70">
                                D-III Teknik Mesin
                            </p>
                        </div>

                    </div>

                    <button type="button"
                            id="closeAdminSidebar"
                            class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10 text-white transition hover:bg-white/15 lg:hidden">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>

                    </button>

                </div>

            </div>


            {{-- Navigation --}}
            <nav class="relative flex-1 overflow-y-auto px-4 pb-4 admin-scrollbar">

                @foreach ($navigationGroups as $group)

                    <div class="{{ $loop->first ? 'pt-2' : 'pt-5 mt-4 border-t border-white/10' }}">

                        <p class="mb-2 px-3 text-[11px] font-extrabold uppercase tracking-[0.22em] text-blue-100/45">
                            {{ $group['label'] }}
                        </p>

                        <div class="space-y-1.5">
                            @foreach ($group['items'] as $item)

                                <a href="{{ $item['route'] }}"
                                   class="admin-sidebar-link {{ $item['active'] ? 'admin-sidebar-active' : 'admin-sidebar-default' }}">

                                    {!! $item['icon'] !!}

                                    <span class="truncate">
                                        {{ $item['title'] }}
                                    </span>

                                </a>

                            @endforeach
                        </div>

                    </div>

                @endforeach


                <div class="mt-5 border-t border-white/10 pt-5">

                    <a href="{{ url('/') }}"
                       target="_blank"
                       class="admin-sidebar-link admin-sidebar-default">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M14 3h7v7M10 14L21 3M5 5h5M5 10h5M5 15h14M5 20h14" />
                        </svg>

                        <span>Lihat Website</span>

                    </a>

                </div>

            </nav>


            {{-- Sidebar Footer --}}
            <div class="relative border-t border-white/10 p-4">

                <div class="mb-3 rounded-2xl border border-white/10 bg-white/5 p-3">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-yellow-300 text-sm font-black text-slate-900">
                            A
                        </div>

                        <div class="min-w-0">
                            <p class="truncate text-sm font-bold text-white">
                                Administrator
                            </p>

                            <p class="mt-0.5 truncate text-xs text-slate-400">
                                Pengelola Website
                            </p>
                        </div>

                    </div>

                </div>

                @if (Route::has('admin.logout'))
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf

                        <button type="submit"
                                class="flex w-full items-center justify-center gap-2 rounded-2xl bg-red-500/10 px-4 py-3 text-sm font-extrabold text-red-200 transition hover:bg-red-500 hover:text-white">

                            <svg xmlns="http://www.w3.org/2000/svg"
                                 class="h-5 w-5"
                                 fill="none"
                                 viewBox="0 0 24 24"
                                 stroke="currentColor"
                                 stroke-width="2">
                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
                            </svg>

                            Logout

                        </button>
                    </form>
                @endif

            </div>

        </div>

    </aside>


    {{-- Main --}}
    <div class="min-h-screen lg:pl-72">

        {{-- Topbar --}}
        <header class="sticky top-0 z-30 border-b border-slate-200/80 bg-white/85 backdrop-blur-xl">

            <div class="flex h-20 items-center justify-between gap-4 px-4 sm:px-6 lg:px-8">

                <div class="flex min-w-0 items-center gap-4">

                    <button type="button"
                            id="openAdminSidebar"
                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl border border-slate-200 bg-white text-slate-700 shadow-sm transition hover:bg-slate-50 lg:hidden">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-6 w-6"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor"
                             stroke-width="2">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                    </button>

                    <div class="min-w-0">
                        <p class="hidden text-xs font-extrabold uppercase tracking-[0.2em] text-blue-700 sm:block">
                            Admin Website
                        </p>

                        <h2 class="truncate text-lg font-black text-slate-900 sm:text-2xl">
                            @yield('title', 'Admin Panel')
                        </h2>
                    </div>

                </div>


                <div class="flex shrink-0 items-center gap-3">

                    <a href="{{ url('/') }}"
                       target="_blank"
                       class="hidden items-center justify-center rounded-2xl border border-slate-200 bg-white px-4 py-2.5 text-sm font-extrabold text-slate-700 shadow-sm transition hover:border-blue-200 hover:bg-blue-50 hover:text-blue-700 md:inline-flex">
                        Lihat Website
                    </a>

                    <div class="hidden items-center gap-3 rounded-2xl border border-slate-200 bg-white px-3 py-2 shadow-sm sm:flex">

                        <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-blue-50 text-sm font-black text-blue-700">
                            A
                        </div>

                        <div>
                            <p class="text-sm font-extrabold leading-none text-slate-800">
                                Admin
                            </p>

                            <p class="mt-1 text-xs text-slate-500">
                                D-III Teknik Mesin
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </header>


        {{-- Page Content --}}
        <main class="relative p-4 sm:p-6 lg:p-8">

            <div class="pointer-events-none fixed inset-0 -z-10">
                <div class="absolute left-1/3 top-0 h-96 w-96 rounded-full bg-blue-100/70 blur-3xl"></div>
                <div class="absolute bottom-0 right-0 h-96 w-96 rounded-full bg-yellow-100/70 blur-3xl"></div>
            </div>

            <div class="mx-auto max-w-7xl">
                @yield('content')
            </div>

        </main>

    </div>

</div>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('adminOverlay');
        const openButton = document.getElementById('openAdminSidebar');
        const closeButton = document.getElementById('closeAdminSidebar');

        function openSidebar() {
            if (!sidebar || !overlay) return;

            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.classList.add('overflow-hidden');
        }

        function closeSidebar() {
            if (!sidebar || !overlay) return;

            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }

        if (openButton) {
            openButton.addEventListener('click', openSidebar);
        }

        if (closeButton) {
            closeButton.addEventListener('click', closeSidebar);
        }

        if (overlay) {
            overlay.addEventListener('click', closeSidebar);
        }

        window.addEventListener('resize', function () {
            if (window.innerWidth >= 1024 && sidebar && overlay) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            }
        });
    });
</script>

@stack('scripts')

</body>

</html>