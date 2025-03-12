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
                                    Entry
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>

            </div>
            <div
                class="p-4 bg-white border border-gray-200 block dark:text-white sm:flex items-center justify-between  lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
                <div class="relative w-full align-middle">
                    <div class="p-6 rounded-lg shadow-lg bg-background text-foreground">
                        <div class="flex items-center justify-between mb-6">
                            <h1 class="text-2xl font-bold">Almacen {{ $warehouse->name }}</h1>
                            <div class="flex gap-2">
                                <a href="{{ route('inventario.inventory') }}"
                                    class="inline-flex items-center justify-center px-3 text-sm font-medium text-white transition-colors bg-purple-600 border rounded-md whitespace-nowrap ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border-input bg-background hover:bg-accent hover:text-accent-foreground h-9">
                                    Atras
                                </a>
                            </div>
                        </div>
                        <div class="overflow-x-auto">
                            <div class="relative w-full overflow-auto bg-green-300 border border-green-700 rounded-lg">

                                <form class="form" wire:submit='createEntry'>
                                    <div class="p-4 space-y-4 md:p-5">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div wire:ignore class="col-span-3 sm:col-span-3">
                                                <label for="supplier_id">Proveedor</label>
                                                <div wire:ignore>
                                                    <select id="supplier_id"
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                                        @forelse ($suppliers as $item)
                                                            <option value="{{ $item->id }}">{{ $item->id }}
                                                                {{ $item->first_name }}
                                                                {{ $item->last_name }}</option>
                                                        @empty
                                                        @endforelse
                                                    </select>
                                                </div>
                                                @error('entryForm.supplier_id')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                            class="font-medium">Error!</span>
                                                        {{ $message }}.</p>
                                                @enderror
                                            </div>
                                            <div wire:ignore class="col-span-6 sm:col-span-3">
                                                <label for="product_id">Producto</label>
                                                <select wire:model.live="entryForm.entry_code" id="product_id"
                                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                    @forelse ($products as $item)
                                                        <option value="{{ $item->id }}">{{ $item->id }}
                                                            {{ $item->code_entrada }}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @error('entryForm.product_id')
                                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                            class="font-medium">Error!</span>
                                                        {{ $message }}.</p>
                                                @enderror
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="quantity"
                                                    class="block text-sm font-medium text-gray-900 dark:text-white">
                                                    Cantidad
                                                </label>
                                                <input min="0" step="1" type="number"
                                                    wire:model.live='entryForm.quantity' id="quantity"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Cantidad" required="">
                                            </div>
                                            <div class="col-span-6 sm:col-span-3">
                                                <label for="Monto aproximado"
                                                    class="block text-sm font-medium text-gray-900 dark:text-white">
                                                    Precio Compra
                                                </label>
                                                <input min="0" step=".01" type="number"
                                                    wire:model.live='entryForm.unit_price' id="unit_price"
                                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                                    placeholder="Precio unitario">
                                            </div>
                                            <div class="col-span-6 sm:col-span-6">
                                                <x-area-input wire:model.live='entryForm.description' type='text'
                                                    for='description' label='Description'
                                                    placeholder='Ingrese descripcion'>
                                                </x-area-input>
                                            </div>
                                            <div class="col-span-6 sm:col-full">
                                                @if ($product)
                                                    <x-button.button-primary type='submit'>
                                                        Guardar
                                                    </x-button.button-primary>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            $('#supplier_id').select2({
                theme: "classic",
                width: 'resolve',
            });
            $('#supplier_id').on('change', function() {
                @this.set('supplier', $(this).val());
            });
        });
        $(document).ready(function() {
            $('#product_id').select2({
                theme: "classic",
                width: 'resolve',
            });
            $('#product_id').on('change', function() {
                @this.set('product', $(this).val());
            });
        });
    </script>
@endpush
