<div class="bg-white shadow rounded-lg overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produto</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Produzidos</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Defeituosos</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase whitespace-nowrap">Efetividade (%)</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Data</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($output->items as $productivity)
            <tr class="hover-bg-dark-blue hover:text-white hover:cursor-pointer">
                <td class="px-6 py-4 text-sm whitespace-nowrap">{{ $productivity->product() }}</td>
                <td class="px-6 py-4 text-sm">{{ $productivity->produced() }}</td>
                <td class="px-6 py-4 text-sm">{{ $productivity->defects() }}</td>
                <td class="px-6 py-4 text-sm">
                    {{ number_format($productivity->calculateEffectiveness(), 2) }}%
                </td>
                <td class="px-6 py-4 text-sm">
                    {{ $productivity->createdAt()->format('d/m/Y') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>