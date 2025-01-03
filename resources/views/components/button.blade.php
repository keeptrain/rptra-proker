@props(['color' => 'blue']) <!-- Default color is blue -->

<button {{ $attributes->merge(['class' => "inline-flex items-center rounded-md bg-{$color}-600 text-white hover:bg-{$color}-700 dark:bg-{$color}-600 dark:hover:bg-{$color}-700"]) }}>
    {{ $slot }}
</button>