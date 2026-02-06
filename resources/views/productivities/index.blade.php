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
            @include('components.sidebars.mobile-sidebar')


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
