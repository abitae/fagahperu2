<div
    class="p-4 bg-white border border-gray-200 block sm:flex items-center justify-between  lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
    <div class="relative w-full align-middle">
        <div class="overflow-hidden shadow">
            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                <thead class="bg-gray-300 dark:bg-gray-700">
                    <tr>
                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Fecha / Estado
                        </th>
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
                            Cliente
                        </th>

                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Asignado
                        </th>


                        <th scope="col"
                            class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                    @forelse ($this->negocios as $negocio)
                    <tr wire:key='negocioo-{{ $negocio->id }}' class="border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                        <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                            {{ $negocio->date_closing }} <br>
                            {{ $negocio->stage }} <br>
                            <div class="w-full h-1 bg-gray-200 rounded-full dark:bg-gray-700">
                                @switch($negocio->stage)
                                @case('PROCESO')
                                <div class="h-1 bg-red-600 rounded-full" style="width: 25%"></div>
                                @break
                                @case('ACEPTADA')
                                <div class="h-1 bg-yellow-400 rounded-full" style="width: 50%"></div>
                                @break
                                @case('PAGADO')
                                <div class="h-1 bg-green-400 rounded-full" style="width: 100%"></div>
                                @break
                                @default
                                @endswitch
                            </div>
                            <button wire:click='estado({{ $negocio->id }})'
                                wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba 'SI' para confirmar!|SI"
                                class="flex items-center">
                                <div
                                    class="h-2.5 w-2.5 rounded-full {{ $negocio->isActive ? 'bg-green-400' : 'bg-red-600' }} mr-2">
                                </div>
                                {{ $negocio->isActive ? 'Active' : 'Disabled' }}
                            </button>
                        </td>
                        <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                            {{ $negocio->code }}
                        </td>
                        <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                            <p class="mb-1 text-xs text-gray-700 text-hover-primary">
                                <span>{{ $negocio->name }}</span>
                            </p>
                        </td>
                        <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">

                            {{ $negocio->customer->first_name }}

                        </td>
                        <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                            {{ $negocio->user->name }}
                        </td>

                        <td class="p-4 space-x-2 whitespace-nowrap">
                            <x-button.button-edit wire:click='update({{ $negocio->id }})'>
                            </x-button.button-edit>
                            <x-button.button-view wire:click='detail({{ $negocio->id }})'>
                            </x-button.button-view>
                        </td>
                    </tr>

                    @empty
                    @endforelse
                </tbody>
            </table>
            {{ $this->negocios->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>
