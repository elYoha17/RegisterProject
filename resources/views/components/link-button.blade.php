<a {{ $attributes->merge(['href' => $href, 'class' => 'inline-flex items-center px-4 py-2  border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest text-white hover:bg-gray-700 active:bg-gray-900 focus:outline-none bg-gray-800 focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 ' ]) }}>
    {{ $slot }}
</a>