<div
    class="p-4 bg-white border border-gray-200 block sm:flex items-center justify-between  lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="relative w-full align-middle">
        <div class="overflow-hidden shadow">
            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                <thead class="bg-gray-300 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Code
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Name
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Telefono
                        </th>

                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Email
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Estado
                        </th>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse ($this->suppliers as $supplier)
                        <tr wire:key='suppliero-{{ $supplier->id }}' class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                <a target="_blank" href='{{ asset("storage/$supplier->archivo") }}'
                                    class="mb-1 text-xs text-hover-primary">
                                    {{ strtoupper($supplier->type_code) }}: {{ $supplier->code }}</a>
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                <p class="mb-1 text-xs text-gray-700 text-hover-primary">
                                    <span>{{ $supplier->first_name }}</span>
                                </p>
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                {{ $supplier->phone }}
                            </td>
                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                {{ $supplier->email }}
                            </td>

                            <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                <button wire:click='estado({{ $supplier->id }})'
                                    wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba 'SI' para confirmar!|SI"
                                    class="flex items-center">
                                    <div
                                        class="h-2.5 w-2.5 rounded-full {{ $supplier->isActive ? 'bg-green-400' : 'bg-red-600' }} mr-2">
                                    </div>
                                    {{ $supplier->isActive ? 'Autorizado' : 'No autorizado' }}
                                </button>
                            </td>
                            <td class="p-4 space-x-2 whitespace-nowrap">
                                <x-button.button-pdf wire:click='pdf({{ $supplier->id }})'>
                                </x-button.button-pdf>
                                <x-button.button-edit wire:click='update({{ $supplier->id }})'>
                                </x-button.button-edit>
                                <x-button.button-delete wire:click='delete({{ $supplier->id }})'
                                    wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $supplier->code }}' para confirmar!|{{ $supplier->code }}">
                                </x-button.button-delete>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {{ $this->suppliers->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>
