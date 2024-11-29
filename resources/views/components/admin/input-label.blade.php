@props(['value'])

<label {{ $attributes->merge(['class' => 'font-medium text-sm text-gray-600 dark:text-gray-300 lg:block']) }}>
    {{ $value ?? $slot }}
</label>