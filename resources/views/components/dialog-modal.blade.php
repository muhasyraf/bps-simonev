@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg font-medium text-gray-900">
            {{ $title }}
        </div>

        <div class="flex flex-col mt-4 text-sm text-gray-600">
            {{ $content }}
        </div>
    </div>

    <div class="flex flex-row justify-center px-6 py-4 text-center">
        {{ $footer }}
    </div>
</x-modal>