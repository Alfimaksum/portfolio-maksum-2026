@props([
    'name' => null,
])

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-1 rounded-xl text-xs font-mono font-semibold bg-white/80 backdrop-blur-md text-blue-700 border border-blue-200/70 hover:bg-blue-50 hover:border-blue-300 shadow-sm transition duration-200 select-none']) }}>
    {{ $name ?? $slot }}
</span>
