<div class="flex flex-col mt-6">
    <div class="overflow-x-auto rounded-lg">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                ORDEN
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                PROVEEDOR
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium  text-left text-gray-500 uppercase dark:text-white">
                                ENTIDAD
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                FECHA
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                PART NUMBER
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                ESTADO
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                ACCION
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @forelse ($this->datas as $data)
                            <tr wire:key='product-{{ $data->id }}'>
                                <td
                                    class="p-4 min-w-full text-xs font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ substr($data->orden_electronica, 0, -1) . str_repeat('0', 1) }}
                                    <br>
                                    {{ $data->orden_electronica }}

                                </td>
                                <td class="w-64 p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                    {{ $data->ruc_proveedor }}
                                    <br>
                                    {{ $data->razon_proveedor }}
                                </td>
                                <td class="w-64 p-4 text-xs font-normal text-gray-900 dark:text-white">
                                    {{ $data->ruc_entidad }}
                                    <br>
                                    {{ $data->razon_entidad }}

                                </td>
                                <td class="p-4 text-xs font-normal text-gray-500 dark:text-white">
                                    <span
                                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">
                                        {{ \Carbon\Carbon::parse($data->fecha_aceptacion)->format('d/m/Y') }}
                                    </span>
                                </td>
                                <td class="p-4 text-xs font-normal text-gray-500 dark:text-white ">
                                    {{ $data->numero_parte }}
                                    <br>
                                    {{ $data->marca_ficha_producto }}
                                </td>
                                <td class="p-4 text-xs font-normal text-gray-500 dark:text-white">
                                    {{ $data->estado_orden_electronica }}
                                </td>
                                <td class="p-4 text-xs font-normal text-gray-500 dark:text-white">
                                    <x-button.button-view wire:click='detail({{ $data->id }})'>
                                    </x-button.button-view>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $this->datas->links(data: ['scrollTo' => false]) }}
            </div>
        </div>
    </div>
</div>
