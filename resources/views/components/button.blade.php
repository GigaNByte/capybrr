<button {{ $attributes->merge(['type' => 'submit', 'class' => ' button-global ']) }}>
    {{ $slot }}
</button>
