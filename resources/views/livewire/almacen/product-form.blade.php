<div class="pt-2 row">
    <div class="col-md-12">
        <div class="shadow-lg card card-success card-outline">
            <div class="card-header">
                <h3 class="card-title">Agregar nuevo producto</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form wire:submit="createProducto">
                    <div class="grid grid-cols-4 gap-1">
                        <div>
                            <x-select-input wire:model="product_line_id" for='rol' label='Seleccione una linea'>
                                @forelse ($this->lines as $line)
                                <option value="{{ $line->id }}">{{ $line->name }}</option>
                                @empty
                                @endforelse
                            </x-select-input>
                            @error('userForm.line_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div>
                            <x-select-input wire:model="product_category_id" for='rol' label='Seleccione una categoria'>
                                @forelse ($this->categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @empty
                                @endforelse
                            </x-select-input>
                            @error('userForm.category_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div>
                            <x-select-input wire:model="product_brand_id" for='rol' label='Seleccione un marca'>
                                @forelse ($this->brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @empty
                                @endforelse
                            </x-select-input>
                            @error('userForm.brand_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div>
                        </div>
                        <div>
                            <x-text-input wire:model='product_code' type='text' for='code' label='Codigo Unico'
                                placeholder='Ingrese codigo' />
                            @error('product_code')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div>
                            <x-text-input wire:model='product_code_fabrica' type='text' for='code_fabrica'
                                label='Codigo fabrica' placeholder='Ingrese codigo fabrica' />
                            @error('product_code_fabrica')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div>
                            <x-text-input wire:model='product_code_peru' type='text' for='code_peru'
                                label='Codigo fabrica' placeholder='Ingrese codigo CM' />
                            @error('product_code_peru')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div>
                            <x-text-input wire:model='product_price_compra' type='number' min="0" step=".01"
                                for='price_compra' label='Precio de Compra' placeholder='Ingrese precio Compra' />
                            @error('product_price_compra')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div>
                            <x-text-input wire:model='product_price_venta' type='number' min="0" step=".01"
                                for='price_venta' label='Precio de Venta' placeholder='Ingrese precio Venta' />
                            @error('product_price_venta')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div>
                            <x-text-input wire:model='product_stock' type='number' min="0" step="1" for='stock'
                                label='Stock' placeholder='Ingrese Stock' />
                            @error('product_stock')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div>
                            <x-text-input wire:model='product_dias_entrega' type='number' min="0" step="1"
                                for='dias_entrega' label='Dias entrega' placeholder='Ingrese dias entrega' />
                            @error('product_dias_entrega')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div>
                            <x-text-input wire:model='product_garantia' type='number' min="0" step="1" for='garantia'
                                label='Meses de garantia' placeholder='Ingrese garantia' />
                            @error('product_garantia')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div class="col-span-4">
                            <div class="grid grid-cols-2 gap-1">
                                <div>
                                    <x-area-input wire:model='product_description' type='text' for='description'
                                        label='Description' placeholder='Ingrese description' />
                                    @error('product_description')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span> {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div>
                                    <x-area-input wire:model='product_observaciones' type='text' for='description'
                                        label='Observaciones' placeholder='Observaciones' />
                                    @error('product_observaciones')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span> {{ $message }}.</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4">
                            <div class="grid grid-cols-3 gap-1">
                                <div>
                                    <label for="image"
                                        class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-30 bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">
                                                    Seleccione una Imagen
                                                </span>
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                        </div>
                                        <input wire:model='product_image' id="image" type="file" class="hidden" />
                                    </label>
                                    @error('product_image')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span> {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="archivo"
                                        class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-30 bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">
                                                    Ficha tecnica PDF
                                                </span>
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                                        </div>
                                        <input wire:model='product_archivo' id="archivo" type="file" class="hidden" />
                                    </label>
                                    @error('product_archivo')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span> {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="archivo2"
                                        class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-30 bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 20 16">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                                <span class="font-semibold">
                                                    Certificado PDF
                                                </span>
                                            </p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                                        </div>
                                        <input wire:model='product_archivo2' id="archivo2" type="file" class="hidden" />
                                    </label>
                                    @error('product_archivo2')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span> {{ $message }}.</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div
                            class="flex items-center col-span-4 p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                            <x-button.button-save type='submit'>
                                Guardar
                            </x-button.button-save>
                        </div>

                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>