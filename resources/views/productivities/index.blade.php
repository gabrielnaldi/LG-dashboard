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
        <main class="h-screen w-screen">
            <div class="">
                <button id="open-mobile-sidebar" class="p-0 text-2xl md:hidden pt-4 pb-2 px-8">
                    ☰
                </button>
            </div>

            {{-- MOBILE SIDEBAR --}}
            @include('components.sidebars.mobile-sidebar')


            <div class="md:flex">
                {{-- WEB SIDEBAR --}}
                @include('components.sidebars.web-sidebar')


                <div class="pt-8 px-8 pb-8">
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
                </div>
            </div>


        </main>
    </body>
</html>
