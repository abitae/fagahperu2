<button {{ $attributes->merge([
    'class' => 'text-gray-700 hover:text-white border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-gray-400 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-500 dark:focus:ring-gray-900']) }}>
    <i class="fa-solid fa-upload"></i>
    {{ $slot }}
</button>
