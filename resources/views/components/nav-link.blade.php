@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-main-cyan text-sm leading-5 text-main-cyan focus:outline-none focus:border-main-cyan transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm leading-5 text-white hover:text-main-cyan hover:border-main-cyan focus:outline-none focus:text-main-cyan focus:border-main-cyan transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
