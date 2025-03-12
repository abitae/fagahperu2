<div class="flex flex-col mt-6">
    <div class="overflow-x-auto rounded-lg">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                CODE
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                NAME
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium  text-left text-gray-500 uppercase dark:text-white">
                                ESTADO
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                ACCION
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @forelse ($this->acuerdoMarcos as $data)
                            <tr wire:key='acuerdoMarco-{{ $data->id }}'>
                                <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">

                                    {{ $data->code }}

                                </td>
                                <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                    {{ $data->name }}
                                </td>
                                <td class="p-4 text-xs font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    <button wire:click='estado({{ $data->id }})'
                                        wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba 'SI' para confirmar!|SI"
                                        class="flex items-center">
                                        <div
                                            class="h-2.5 w-2.5 rounded-full {{ $data->isActive ? 'bg-green-400' : 'bg-red-600' }} mr-2">
                                        </div>
                                        {{ $data->isActive ? 'Active' : 'Disabled' }}
                                    </button>
                                </td>
                                <td class="p-4 space-x-2 whitespace-nowrap">
                                    <x-button.button-edit wire:click='update({{ $data->id }})'>
                                    </x-button.button-edit>
                                    <x-button.button-delete wire:click='delete({{ $data->id }})'
                                        wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $data->code }}' para confirmar!|{{ $data->code }}">
                                    </x-button.button-delete>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $this->acuerdoMarcos->links(data: ['scrollTo' => false]) }}
            </div>
        </div>
    </div>
</div>
