<div
    class="space-y-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <div class="relative">
        <input type="search" id="default-search" wire:model.live='search'
            class="block w-48 p-1 text-sm text-gray-900 border border-gray-300 rounded-lg ps-10 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Buscar codigo entrada" required />
    </div>
    <div class="w-full overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
            <thead class="bg-gray-300 dark:bg-gray-700">
                <tr>
                    <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        CODIGO ENTRADA
                    </th>
                    <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        CODIGO SALIDA
                    </th>
                    <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        ESTADO
                    </th>
                    <th scope="col"
                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                        ACCIONES
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                @forelse ($products as $item)
                <tr wire:key='productStore-{{ $item->id }}' class="hover:bg-gray-100 dark:hover:bg-gray-700">
                    <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                        {{ $item->code_entrada }}
                    </td>
                    <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                        @forelse ($item->codexits as $codexit)
                        <div class="grid grid-cols-2">
                            <div class="p-1 border border-gray-400 rounded-lg">
                                {{ $codexit->name }}
                            </div>
                            <div>
                                <x-button.button-delete2 wire:click='deleteExit({{ $codexit->id }})'
                                    wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $codexit->name }}' para confirmar!|{{ $codexit->name }}">
                                </x-button.button-delete2>
                            </div>
                        </div>
                        @empty
                        <div class="bg-red-300 rounded-md badge badge-light-danger fw-bold dark:text-gray-700">
                            No codes
                        </div>
                        @endforelse
                    </td>
                    <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                        <button wire:click='estado({{ $item->id }})'
                            wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba 'SI' para confirmar!|SI"
                            class="flex items-center">
                            <div
                                class="h-2.5 w-2.5 rounded-full {{ $item->isActive ? 'bg-green-400' : 'bg-red-600' }} mr-2">
                            </div>
                            {{ $item->isActive ? 'Active' : 'Disabled' }}
                        </button>
                    </td>
                    <td class="p-4 space-x-2 whitespace-nowrap">
                        <x-button.button-edit2 wire:click='addCodeExit({{ $item->id }})'>Codes
                        </x-button.button-edit2>
                        <x-button.button-edit wire:click='update({{ $item->id }})'>Edit
                        </x-button.button-edit>
                        <x-button.button-delete wire:click='delete({{ $item->id }})'
                            wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $item->code_entrada }}' para confirmar!|{{ $item->code_entrada }}">
                            Eliminar
                        </x-button.button-delete>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        {{ $products->links(data: ['scrollTo' => false]) }}
    </div>

</div>
