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
        <script src="{{ asset('js/form.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body class="bg-gray-100 text-gray-900">
        <main class="px-8 py-8">
            <div class="mb-8 md:mb-0">
                <button id="open-mobile-sidebar" class="p-0 text-2xl md:hidden">
                    ☰
                </button>
            </div>

            {{-- MOBILE SIDEBAR --}}
            <div id="mobile-sidebar-container" class="fixed inset-0 z-50 hidden md:hidden">
                <div
                    id="mobile-sidebar-overlay"
                    class="absolute inset-0 bg-black bg-opacity-50"
                ></div>

                <div
                    class="relative w-64 h-full bg-sidebar shadow-lg"
                >
                    <button
                        id="close-mobile-sidebar"
                        class="absolute top-2 right-2 h-6 w-6 flex items-center justify-center rounded-full bg-white text-black"
                    >
                        ×
                    </button>

                    <div class="w-full flex justify-center py-5 px-3 mb-4">
                        <h1 class="text-white font-bold text-2xl">LG Dashboard</h1>
                    </div>

                    <nav class="p-4">
                        <ul>
                            <li>
                                <a href="/productivities" class="block text-white p-2 w-full rounded-md font-medium hover:bg-white hover:font-bold hover-text-dark-blue">Produtividade</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

            {{-- Input de busca --}}
            @include('components.forms.filter-form')


            <div>
                <h2 class="text-xl font-semibold mb-4">
                    Produtividade
                </h2>

                {{-- Tabela de Produtividade --}}
                @include('components.tables.productivities-table')

                {{-- Paginacao --}}
                @include('components.paginators.productivities-paginator')
            </div>
        </main>
    </body>
</html>
