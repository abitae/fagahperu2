<!-- Table -->
<div class="flex flex-col mt-6">
    <div class="overflow-x-auto rounded-lg">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                DESCRIPCION
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                MARCA
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-white">
                                CANTIDAD
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase text-end dark:text-white">
                                PRECIO UNIT
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase text-end dark:text-white">
                                IGV
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium tracking-wider text-gray-500 uppercase text-end dark:text-white">
                                SUB TOTAL
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800">
                        @forelse ($productos as $data)
                            <tr wire:key='product-{{ $data->id }}'>
                                <td class="p-1 text-xs font-normal text-gray-900 dark:text-white">
                                    {{ $data->descripcion_ficha_producto }}
                                </td>
                                <td class="text-xs font-normal text-gray-500 dark:text-gray-400">
                                    {{ $data->marca_ficha_producto }}
                                </td>
                                <td class="text-xs font-normal text-center text-gray-900 dark:text-white">
                                    {{ $data->cantidad }}
                                </td>
                                <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                    {{ $data->precio_unitario }}
                                </td>
                                <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                    {{ $data->igv_entrega }}
                                </td>
                                <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                    {{ $data->sub_total }}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        <tr>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">

                            </td>
                            <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                -----------
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                SUB TOTAL
                            </td>
                            <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                {{ $data->sub_total_orden }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                IGV

                            </td>
                            <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                {{ $data->igv_orden }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">

                            </td>
                            <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                -----------
                            </td>
                        </tr>
                        <tr>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="bg-gray-50 dark:bg-gray-600">
                            </td>
                            <td class="font-bold text-gray-500 text-md text-end dark:text-gray-400">
                                TOTAL
                            </td>
                            <td class="font-bold text-gray-500 text-md text-end dark:text-gray-400">
                                {{ $data->total_orden }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
