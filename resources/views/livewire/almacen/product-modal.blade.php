@if ($isOpenModalExport)
<!--begin::Modal - Adjust Balance-->
<div class="modal" tabindex="-1" role="dialog" style="display: {{ $isOpenModalExport ? 'block' : 'none' }}">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-350px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Export Products</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div wire:click="$toggle('isOpenModalExport')" class="btn btn-icon btn-sm btn-active-icon-primary">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="mx-5 my-1 modal-body scroll-y mx-xl-5">
                <!--begin::Form-->
                <form class="form" wire:submit="exportProduct">
                    <!--begin::Input group-->
                    <div class="mb-2 fv-row">
                        <!--begin::Label-->
                        <label class="mb-2 required fs-6 fw-semibold form-label">
                            Export Format:</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select data-control="select2" data-placeholder="Select a format" data-hide-search="true"
                            class="form-select form-select-solid fw-bold">
                            <option value="excel">Excel</option>
                            <option value="pdf">PDF</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button wire:click="$toggle('isOpenModalExport')" class="btn btn-light me-3">
                            Discard
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="align-middle spinner-border spinner-border-sm ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<div class="modal-backdrop show"></div>
@endif
@if ($isOpenModal)
<x-modal title="{{ isset($productForm->product) ? 'ACTUALIZAR PRODUCTO' : 'CREAR PRODUCTO' }}" maxWidth='4xl'>
    <form class="form" wire:submit.prevent="{{ isset($productForm->product) ? 'updateProduct' : 'createProduct' }}">
        <div x-data="{ openTab: 1 }">
            <div class="w-full bg-white dark:bg-gray-800">
                <div class="flex p-2 bg-white rounded-lg shadow-md dark:bg-gray-800 dark:text-white">
                    <a x-on:click="openTab = 1" :class="{ 'bg-purple-600 text-white': openTab === 1 }"
                        class="flex-1 px-4 py-2 transition-all duration-300 rounded-md focus:outline-none focus:shadow-outline-blue">
                        Detalles <i class="fa-solid fa-list-check"></i></a>
                    <a x-on:click="openTab = 2" :class="{ 'bg-purple-600 text-white': openTab === 2 }"
                        class="flex-1 px-4 py-2 transition-all duration-300 rounded-md focus:outline-none focus:shadow-outline-blue">
                        Archivos <i class="fa-solid fa-folder-open"></i>
                    </a>
                </div>
                <div x-show="openTab === 1"
                    class="p-4 space-y-2 transition-all duration-300 bg-white border-4 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <x-select-input wire:model.live="productForm.line_id" for='rol' required
                                label='Seleccione una linea'>
                                <option>*Select option</option>
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
                        <div class="col-span-6 sm:col-span-2">
                            <x-select-input wire:model.live="productForm.category_id" for='rol'
                                label='Seleccione una categoria'>
                                <option>*Select option</option>
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
                        <div class="col-span-6 sm:col-span-2">
                            <x-select-input wire:model.live="productForm.brand_id" for='rol'
                                label='Seleccione un marca'>
                                <option>*Select option</option>
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
                    </div>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <x-text-input wire:model.live='productForm.code' type='text' for='code' label='Codigo Unico'
                                placeholder='Ingrese codigo' required />
                            @error('productForm.code')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-text-input wire:model.live='productForm.code_fabrica' type='text' for='code_fabrica'
                                label='Codigo fabrica' placeholder='Ingrese codigo fabrica' required />
                            @error('productForm.code_fabrica')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-text-input wire:model.live='productForm.code_peru' type='text' for='code_peru'
                                label='Codigo ficha producto' placeholder='Ingrese código ficha producto' required />
                            @error('productForm.code_peru')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <x-text-input wire:model.live='productForm.price_compra' type='number' min="0" step=".01"
                                for='price_compra' label='Precio de Compra' placeholder='Ingrese precio Compra'
                                required />
                            @error('productForm.price_compra')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-text-input wire:model.live='productForm.price_venta' type='number' min="0" step=".01"
                                for='price_venta' label='Precio de Venta' placeholder='Ingrese precio Venta' required />
                            @error('productForm.price_venta')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-2">
                            <x-text-input wire:model.live='productForm.stock' type='number' min="0" step="1" for='stock'
                                label='Stock' placeholder='Ingrese Stock' required />
                            @error('productForm.stock')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div x-show="openTab === 2"
                    class="p-4 space-y-2 transition-all duration-300 bg-white border-4 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-3">
                            <x-area-input wire:model.live='productForm.description' type='text' for='description'
                                label='Description' placeholder='Ingrese description' required />
                            @error('productForm.description')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                        <div class="col-span-6 sm:col-span-3">
                            <x-area-input wire:model.live='productForm.observaciones' type='text' for='observaciones'
                                label='Observaciones' placeholder='Ingrese observaciones' />
                            @error('productForm.observaciones')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                    class="font-medium">Error!</span> {{ $message }}.</p>
                            @enderror
                        </div>
                    </div>
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-2 sm:col-span-2">
                            <label for="image"
                                class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-30 bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                @if ($productForm->image)
                                <div>
                                    Procesado<i class="far fa-check-square"></i>
                                </div>
                                @else
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">
                                            Seleccione una Imagen
                                        </span>
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG, JPG (MAX. 800x400px)</p>
                                </div>
                                @endif

                                <input wire:model.live='productForm.image' id="image" type="file" class="hidden" />
                            </label>


                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="archivo"
                                class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-30 bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                @if ($productForm->archivo)
                                <div>
                                    Procesado<i class="far fa-check-square"></i>
                                </div>
                                @else
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">
                                            Fiche tecnica PDF
                                        </span>
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                                </div>
                                @endif
                                <input wire:model.live='productForm.archivo' id="archivo" type="file" class="hidden" />
                            </label>
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="archivo2"
                                class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-30 bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                @if ($productForm->archivo2)
                                <div>
                                    Procesado<i class="far fa-check-square"></i>
                                </div>
                                @else
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                        <span class="font-semibold">
                                            Certificado PDF
                                        </span>
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                                </div>
                                @endif
                                <input wire:model.live='productForm.archivo2' id="archivo2" type="file"
                                    class="hidden" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
            <x-button.button-danger type="button" wire:click="$toggle('isOpenModal')">
                Cancel
            </x-button.button-danger>
            <x-button.button-save type='submit'>
                Guardar
            </x-button.button-save>
        </div>
    </form>
</x-modal>
@endif
