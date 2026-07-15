@php
    $profileMenus = [
        ['id' => 'profil-singkat', 'label' => 'Profil Singkat'],
        ['id' => 'perjalanan-prodi', 'label' => 'Perjalanan'],
        ['id' => 'visi-misi', 'label' => 'Visi Misi'],
        ['id' => 'tujuan-prodi', 'label' => 'Tujuan Prodi'],
        ['id' => 'ppm', 'label' => 'PPM'],
        ['id' => 'cpl', 'label' => 'CPL'],
        ['id' => 'akreditasi', 'label' => 'Akreditasi'],
    ];
@endphp

<section id="profile-quick-nav" class="sticky top-[72px] z-40 bg-white/75 backdrop-blur-xl">
    <style>
        html {
            scroll-behavior: smooth;
        }

        #profile-quick-nav .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        #profile-quick-nav .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <div class="max-w-7xl mx-auto px-4 md:px-6 py-4">

        <div class="flex justify-center">
            <nav class="max-w-full inline-flex items-center gap-1.5 overflow-x-auto no-scrollbar rounded-full border border-slate-200 bg-white/95 px-2 py-2 shadow-lg shadow-slate-200/60">

                @foreach($profileMenus as $menu)
                    <a
                        href="#{{ $menu['id'] }}"
                        data-profile-nav="{{ $menu['id'] }}"
                        class="profile-nav-link shrink-0 rounded-full px-4 py-2.5 text-xs md:text-sm font-semibold text-slate-500 hover:text-slate-900 hover:bg-slate-100 transition-all duration-300">
                        {{ $menu['label'] }}
                    </a>
                @endforeach

            </nav>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const links = document.querySelectorAll('.profile-nav-link');

            const sections = Array.from(links)
                .map(link => document.getElementById(link.dataset.profileNav))
                .filter(Boolean);

            function resetLinks() {
                links.forEach(link => {
                    link.classList.remove(
                        'bg-slate-900',
                        'text-white',
                        'shadow-md',
                        'shadow-slate-900/20'
                    );

                    link.classList.add(
                        'text-slate-500',
                        'hover:text-slate-900',
                        'hover:bg-slate-100'
                    );
                });
            }

            function setActive(id) {
                resetLinks();

                const activeLink = document.querySelector(`[data-profile-nav="${id}"]`);

                if (!activeLink) {
                    return;
                }

                activeLink.classList.remove(
                    'text-slate-500',
                    'hover:text-slate-900',
                    'hover:bg-slate-100'
                );

                activeLink.classList.add(
                    'bg-slate-900',
                    'text-white',
                    'shadow-md',
                    'shadow-slate-900/20'
                );
            }

            if (sections.length) {
                setActive(sections[0].id);
            }

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        setActive(entry.target.id);
                    }
                });
            }, {
                rootMargin: '-35% 0px -55% 0px',
                threshold: 0
            });

            sections.forEach(section => observer.observe(section));
        });
    </script>
</section>