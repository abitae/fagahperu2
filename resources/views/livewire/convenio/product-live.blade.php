<div>
    <div
        class="space-y-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
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
                                    Convenio Marco
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('convenio.data') }}"
                                class="flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Ordenes
                            </a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Card header -->
        <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0">
                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                    ORDENES DE COMPRA CONVENIO MARCO
                </h3>
                <span class="text-base font-normal text-gray-500 dark:text-gray-400">
                    Busqueda de Acuerdos marco
                </span>
            </div>
            <div class="items-center sm:flex">
                <div class="flex items-center pr-3">
                    <select wire:model.live="convenioMarco" id="convenioMarco"
                        class="space-x-4 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @forelse ($this->acuerdosMarco as $acuerdoMarco)
                            <option value="{{ $acuerdoMarco->code }}">
                                {{ $acuerdoMarco->name }}
                            </option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="relative max-w-sm">
                        <input wire:model.live='start_date' type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-2 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Desde">
                    </div>
                    <div class="relative max-w-sm">
                        <input wire:model.live='end_date' type="date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-2 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Hasta">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-sm  sm:p-2 dark:bg-gray-800">
            <div class="items-center sm:flex">
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <x-text-input wire:model.live.debounce.1000ms='search' type='text' for='name'
                            label='' placeholder='Entidad/Proveedor' />
                    </div>
                    <div class="relative">
                        <x-text-input wire:model.live.debounce.1000ms='searchMarca' type='text' for='marca'
                            label='' placeholder='Marca producto' />
                    </div>
                    <div class="relative">
                        <x-text-input wire:model.live.debounce.1000ms='searchPartNumber' type='text' for='marca'
                            label='' placeholder='Numero de Parte' />
                    </div>
                </div>
            </div>
        </div>
        <!-- Table -->
        @include('livewire.convenio.product-table')
    </div>
</div>
