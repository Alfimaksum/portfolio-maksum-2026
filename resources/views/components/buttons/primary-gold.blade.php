@props([
    'href' => null,
    'type' => 'button',
    'target' => null,
    'icon' => null,
])

@php
    $baseClasses = "inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl font-bold text-sm sm:text-base text-white bg-blue-600 hover:bg-blue-700 shadow-md shadow-blue-500/30 hover:shadow-lg hover:shadow-blue-500/40 hover:-translate-y-0.5 transition duration-200 active:scale-95 focus:outline-none focus:ring-2 focus:ring-blue-500/50";
@endphp

@if($href)
    <a href="{{ $href }}" @if($target) target="{{ $target }}" rel="noopener noreferrer" @endif {{ $attributes->merge(['class' => $baseClasses]) }}>
        {{ $slot }}
        @if($icon)
            {!! $icon !!}
        @endif
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $baseClasses]) }}>
        {{ $slot }}
        @if($icon)
            {!! $icon !!}
        @endif
    </button>
@endif
