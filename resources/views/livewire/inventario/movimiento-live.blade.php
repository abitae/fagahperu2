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
                                    Inventario
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
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">
                                    Movimientos
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div
                class="bg-white border border-gray-200 block dark:text-white sm:flex items-center justify-between  lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
                <div class="relative w-full align-middle">
                    <div class="p-6 rounded-lg shadow-lg bg-background text-foreground">
                        <div class="flex items-center justify-between mb-6">
                            <h1 class="text-2xl font-bold">Movimiento de productos</h1>
                        </div>
                        <div class="overflow-x-auto">
                            <div class="w-full">
                                <div
                                    class="space-y-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                                    <div class="max-w-full mx-auto">
                                        <label for="default-search"
                                            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-3">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                                </svg>
                                            </div>
                                            <input type="search" id="default-search" wire:model.live='search'
                                                class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                placeholder="Buscar codigo entrada" required />

                                        </div>
                                    </div>
                                    <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                        <thead class="bg-gray-300 dark:bg-gray-700">
                                            <tr>
                                                <th scope="col"
                                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Almacen/Code/Stock
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Entradas
                                                </th>
                                                <th scope="col"
                                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                                    Salidad
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody
                                            class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                            @forelse ($inventories as $item)
                                            <tr wire:key='productStore-{{ $item->id }}'
                                                class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                                    <div class="grid grid-cols-2 gap-1">
                                                        <div>ALMACEN</div>
                                                        <div>
                                                            {{ $item->warehouse->name }}
                                                        </div>
                                                        <div>CODIGO ENTRY</div>
                                                        <div>
                                                            {{ $item->product->code_entrada }}
                                                        </div>
                                                        <div>STOCK</div>
                                                        <div>
                                                            {{ $item->quantity }}
                                                        </div>

                                                    </div>

                                                </td>
                                                <td>

                                                    @forelse($item->entries as $entry)
                                                    <div class="grid grid-cols-2 gap-1 text-xs font-normal text-gray-500 bg-green-200 dark:text-gray-400">
                                                        <div>
                                                            PROVEEDOR
                                                        </div>
                                                        <div  class="grid-span-2">
                                                            {{ $entry->supplier->first_name ?? '' }}
                                                        </div>
                                                        <div>FECHA</div>
                                                        <div class="grid-span-2">
                                                            {{ $entry->created_at->format('d/m/Y') }}
                                                        </div>
                                                        <div>CODIGO</div>
                                                        <div>
                                                            {{ $entry->entry_code }}
                                                        </div>
                                                        <div>CANTIDAD</div>
                                                        <div>
                                                            {{ $entry->quantity }}
                                                        </div>
                                                    </div>
                                                    @empty
                                                    No hay datos
                                                    @endforelse
                                                </td>
                                                <td>

                                                    @forelse($item->exits as $exit)
                                                    <div class="grid grid-cols-2 gap-1 text-xs font-normal text-gray-500 bg-red-200 dark:text-gray-400">
                                                        <div>
                                                            CLIENTE
                                                        </div>
                                                        <div  class="grid-span-2">
                                                            {{ $exit->customer->first_name ?? '' }}
                                                        </div>
                                                        <div>FECHA</div>
                                                        <div class="grid-span-2">
                                                            {{ $exit->created_at->format('d/m/Y') }}
                                                        </div>
                                                        <div>CODIGO</div>
                                                        <div>
                                                            {{ $exit->exit_code }}
                                                        </div>
                                                        <div>CANTIDAD</div>
                                                        <div>
                                                            {{ $exit->quantity }}
                                                        </div>
                                                    </div>
                                                    @empty
                                                    No hay datos
                                                    @endforelse

                                                </td>
                                            </tr>
                                            @empty
                                            <p>No hay movimientos</p>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $inventories->links(data: ['scrollTo' => false]) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
