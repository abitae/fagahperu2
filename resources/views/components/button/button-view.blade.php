<button {{ 
$attributes->merge([
    'class' => 'inline-flex items-center px-2 py-2 bg-pink-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-500 active:bg-pink-700 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    <i class="fa-solid fa-layer-group"></i>
    {{ $slot }}
</button>
