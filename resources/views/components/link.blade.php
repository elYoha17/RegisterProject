<a {{ $attributes->merge(['href' => $href, 'class' => $color . ' inline-block font-semibold text-base hover:underline']) }}>
    {{ $slot }}
</a>