<div>
    <div
        class="space-y-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 p-6 dark:bg-gray-800">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard') }}"
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
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">
                                    Detalle orden
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Card header -->
        <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0">

                <h4 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                    COTIZACION
                </h4>

                <div class="relative max-w-sm">
                    <p class="text-md font-bold text-gray-900 dark:text-white">
                        Formato
                    </p>
                    <div class="pt-2 pb-0">
                        <select wire:model.live="line_id" id="line_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @isset($lines)
                                @forelse ($lines as $line)
                                    <option value="{{ $line->id }}">
                                        {{ $line->name }}
                                    </option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                    </div>
                    <div wire:ignore class="pt-4 pb-4">
                        <select id="customer_id">
                            @isset($customers)
                                @forelse ($customers as $customer)
                                    <option value="{{ $customer->id }}">
                                        {{ $customer->code }} -
                                        {{ $customer->first_name }}
                                        {{ $customer->last_name }}
                                    </option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                    </div>

                    <ul class="text-md text-gray-900 dark:text-white">
                        @isset($customerSelect)
                            <li>RUC : {{ $customerSelect->code }} {{ $line_id }} </li>
                            <li>Razon : {{ $customerSelect->first_name }}</li>
                            <li>Direccion : {{ $customerSelect->address }}</li>
                        @endisset
                    </ul>
                </div>
            </div>
        </div>
        <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0">
                <div class="grid grid-flow-col auto-cols-max space-x-1">
                    <div wire:ignore class="pt-4 pb-4 w-64">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white"
                            for="product_id">Producto</label>
                        <select id="product_id">
                            @isset($products)
                                @forelse ($products as $product)
                                    <option value="{{ $product->id }}">
                                        {{ $product->code }} - {{ $product->code_fabrica }} - {{ $product->code_peru }}
                                    </option>
                                @empty
                                @endforelse
                            @endisset
                        </select>
                    </div>
                    <div>
                        <x-text-input wire:model.live='cantitad_detalle' class="w-16 p-1" type='number' for=''
                            label='Cantidad' placeholder="Cantidad">
                        </x-text-input>
                    </div>
                    <div>
                        <x-text-input wire:model.live='price_cotizacion' class="w-16" type='number' for=''
                            label='Precio Unitario' placeholder="Precio">
                        </x-text-input>
                    </div>
                    <div class="pt-5">
                        <x-purple-button wire:click="AddProductCotizacion">
                            Add
                        </x-purple-button>
                    </div>
                    <div class="pt-5">
                        <x-purple-button wire:click="exportar">
                            Export
                        </x-purple-button>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-6">
            <div class="overflow-x-auto rounded-lg">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        ID
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        CODIGO
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
                                        SUB TOTAL
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800">
                                @isset($items)
                                    @forelse ($items as $item)
                                        <tr>
                                            <td class="p-1 text-xs font-normal text-gray-900 dark:text-white">
                                                {{ $item->id }}
                                            </td>
                                            <td class="text-xs font-normal text-gray-500 dark:text-gray-400">
                                                {{ $item->name }}
                                            </td>
                                            <td class="text-xs font-normal text-center text-gray-900 dark:text-white">
                                                {{ $item->qty }}
                                            </td>
                                            <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                                {{ $item->price }}
                                            </td>
                                            <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                                {{ $item->priceTotal }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>
                                                No hay registros
                                            </td>

                                        </tr>
                                    @endforelse
                                @else
                                    <tr>
                                        <td>
                                            No hay registros hols
                                        </td>

                                    </tr>
                                @endisset

                                <tr>
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
                                    <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                        SUB TOTAL
                                    </td>
                                    <td class="text-xs font-normal text-gray-500 text-end dark:text-gray-400">
                                        S/ {{ round($igv, 2)  }}
                                        
                                    </td>
                                </tr>
                                <tr>
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
                                        S/ {{ round($sub_total, 2)  }}
                                    </td>
                                </tr>
                                <tr>
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
                                    <td class="font-bold text-gray-500 text-md text-end dark:text-gray-400">
                                        TOTAL
                                    </td>
                                    <td class="font-bold text-gray-500 text-md text-end dark:text-gray-400">
                                        S/ {{ $total }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        $(document).ready(function() {
            $('#customer_id').select2({
                width: '100%'
            });
            $('#customer_id').on('change', function() {
                @this.set('customer', $(this).val());
            });
        });
        $(document).ready(function() {
            $('#product_id').select2({
                width: '100%'
            });
            $('#product_id').on('change', function() {
                @this.set('product', $(this).val());
            });
        });
    </script>
@endpush
