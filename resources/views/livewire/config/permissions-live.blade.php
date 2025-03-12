<div>
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="/dashboard"
                                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">
                                    Config
                                </span>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="/roles">Roles</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">
                                    Permisos
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    Actualiza permisos de {{ $role->name }}
                </h1>
            </div>
            <div class="sm:flex">

                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <x-button.button-save wire:click="update">
                        Guardar
                    </x-button.button-save>
                </div>
            </div>
        </div>
    </div>
    <div class="p-4 grid gap-4 px-4 mb-4 md:grid-cols-2 xl:grid-cols-4 xl:px-0">

        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>Usuarios</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($user_p as $user_per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox" value="{{ $user_per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $user_per
                            }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>Roles</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($role_p as $user_per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox" value="{{ $user_per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $user_per
                            }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        
        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>Negocios</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($negocio_p as $per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox"
                            value="{{ $per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                            $per }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>Clientes</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($cliente_p as $per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox"
                            value="{{ $per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                            $per }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>Contactos</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($contacto_p as $per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox"
                            value="{{ $per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                            $per }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>Productos</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($producto_p as $per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox"
                            value="{{ $per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                            $per }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>Marcas</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($marca_p as $per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox"
                            value="{{ $per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                            $per }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>Categoria</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($categoria_p as $per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox"
                            value="{{ $per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                            $per }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>Linea</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($linea_p as $per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox"
                            value="{{ $per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                            $per }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>CM acuerdo</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($acuerdo_p as $acuerdo_per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox"
                            value="{{ $acuerdo_per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                            $acuerdo_per }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
        <div
            class="p-4 space-y-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="px-4 py-2 text-gray-600 border border-gray-200 rounded dark:border-gray-600 dark:text-white">
                <h3>Convenio</h3>
            </div>
            <ul
                class="text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                @forelse ($cm_p as $per)
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        <input wire:model.live='permissions' id="vue-checkbox" type="checkbox"
                            value="{{ $per }}"
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                        <label for="vue-checkbox"
                            class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{
                            $per }}</label>
                    </div>
                </li>
                @empty
                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                    <div class="flex items-center ps-3">
                        No existen registros
                    </div>
                </li>
                @endforelse

            </ul>
        </div>
    </div>
</div>