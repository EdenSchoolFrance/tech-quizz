<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm text-white']) }}>
    {{ $slot }}
</button>
