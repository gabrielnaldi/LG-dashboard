<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <title>@yield('title', 'Productivity Dashboard')</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- Tailwind --}}
        <link
            href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css"
            rel="stylesheet"
        >

        <link
            href="{{ asset('css/app.css') }}"
            rel="stylesheet"
        >

        <script src="{{ asset('js/sidebar.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="bg-gray-100 text-gray-900">
        <div class="flex min-h-screen w-screen">
            {{-- Mobile Sidebar --}}
            @include('components.sidebar.mobile-sidebar')

            <!-- {{-- Sidebar --}}
            @include('components.sidebar') -->

            <!-- {{-- Content --}}
            <div class="flex-1 flex flex-col">

                {{-- Topbar --}}
                <header class="bg-white shadow px-6 py-4">
                    <h1 class="text-xl font-semibold">
                        @yield('page-title', 'Dashboard')
                    </h1>
                </header>

                {{-- Page content --}}
                <main class="flex-1 overflow-y-auto p-6">
                    @yield('content')
                </main>
            </div> -->
        </div>
    </body>
</html>
