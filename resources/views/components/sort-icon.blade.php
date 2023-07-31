@props(['sortBy', 'sortAsc', 'sortField'])

@if ($sortBy == $sortField)
@if ($sortAsc)
<div class="w-4 h-4 mx-2 mb-1">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="green"
        class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
    </svg>
</div>
@elseif (!$sortAsc)
<div class="w-4 h-4 mx-2 mb-1">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="blue"
        class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="M3 7.5L7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
    </svg>
</div>
@endif
@endif