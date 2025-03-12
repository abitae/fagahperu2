<button {{ $attributes->merge([
    'class' => '']) }}>
    <i class="fa-regular fa-trash-can"></i>
    {{ $slot }}
</button>
