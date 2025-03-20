<div class="items-center md:flex md:divide-x md:divide-gray-100 md:mb-0 dark:divide-gray-700">
    <div class="relative pr-2 md:w-48">
        <input type="search" wire:model.live='search'
            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
            placeholder="Buscar negocios">
    </div>
    <div class="relative pr-2 md:w-20">
        <select wire:model.live="num" id="countries"
            class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
        </select>
    </div>
    <div class="relative pr-2 md:w-40">
        <select wire:model.live="isActive" id="isActive"
            class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Todos</option>
            <option value="1">Active</option>
            <option value="0">Disabled</option>
        </select>
    </div>
    <div class="relative pr-2 md:w-40">
        <select wire:model.live="estadoFilter" id="estadoFilter"
            class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Todos</option>
            <option value="PROCESO">PROCESO</option>
            <option value="ACEPTADA">ACEPTADA</option>
            <option value="PAGADO">PAGADO</option>
        </select>
    </div>
    <div class="relative pr-2 md:w-40">
        <select wire:model.live="typeFilter" id="typeFilter"
            class="block text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option value="">Todos</option>
            <option value="MARCA">MARCA</option>
            <option value="PROVEEDOR">PROVEEDOR</option>
            <option value="OTRO">OTRO</option>
        </select>
    </div>
</div>
