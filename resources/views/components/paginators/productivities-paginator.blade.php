@php
    $totalPages = ceil($output->total / $output->limit);
@endphp

<div class="mt-4 flex justify-center space-x-2">
    @for ($i = 1; $i <= $totalPages; $i++)
        <a href="{{ url('/productivities?page='.$i) }}"
            class="px-3 py-1 rounded {{ $i == $output->page ? 'bg-blue-500 text-white' : 'bg-gray-200' }}">
            {{ $i }}
        </a>
    @endfor
</div>