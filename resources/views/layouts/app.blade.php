<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Mahakrenov') }}</title>

    <!-- Tailwind CSS CDN Config -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        brand: {
                            800: '#005B66', // Deep Teal Mahakrenov
                            900: '#003F47',
                            950: '#00262B',
                        }
                    }
                }
            }
        }
    </script>

    <!-- Dark Mode Initializer -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (savedTheme === 'dark' || (!savedTheme && systemPrefersDark)) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>

    <style>
        .container-custom {
            width: 100%; max-width: 80rem; margin: 0 auto; padding: 0 1rem;
        }
        @media (min-width: 640px) { .container-custom { padding: 0 1.5rem; } }
        @media (min-width: 1024px) { .container-custom { padding: 0 2rem; } }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 dark:bg-slate-950 dark:text-slate-100 min-h-screen flex flex-col transition-colors duration-300">

    <x-navbar />

    <main class="flex-grow">
        @yield('content')
    </main>

    <x-footer />

    <!-- Dark Mode Toggle Event Listener -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function toggleTheme() {
                const html = document.documentElement;
                if (html.classList.contains('dark')) {
                    html.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                } else {
                    html.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                }
            }

            const btnDesktop = document.getElementById('theme-toggle-btn');
            const btnMobile = document.getElementById('theme-toggle-btn-mobile');

            if (btnDesktop) btnDesktop.addEventListener('click', toggleTheme);
            if (btnMobile) btnMobile.addEventListener('click', toggleTheme);
        });
    </script>
</body>
</html>