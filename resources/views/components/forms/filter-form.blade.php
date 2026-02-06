<form method="GET" id="filter-form" action="{{ url('/productivities') }}" class="mb-8 flex space-x-2">
    <div class="relative">
        <input id="product-filter-input" type="text" name="product" class='outline-none py-2 pl-2 pr-6 rounded-md' value="{{ $filter ?? '' }}"
        placeholder="Pesquisar produto">
        <button type="button" id="clear-filter-button"
        class="absolute right-1 top-1/2 transform -translate-y-1/2 text-xs rounded-full bg-dark-blue h-4 w-4 text-white">
            x
        </button>
    </div>
    <button type="submit" class="bg-blue-500 text-white font-semibold px-4 py-1 rounded-md hover:bg-blue-600">Filtrar</button>
</form>