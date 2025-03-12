@if ($isOpenModalImport)
    <x-modal title="IMPORTAR PRODUCTOS" maxWidth='xl'>
            <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
            <span>DESCARGA EL FORMATO DE EXCEL </span><a href="/fagah/demo_import_catalogo.xlsx">Demo</a>
            </div>
            <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                            @if ($file)
                                <span class="font-semibold">
                                    Click to procesar archivo excel
                                </span>
                            @else
                                <span class="font-semibold">
                                    Click to upload archivo excel
                                </span>
                            @endif

                        </p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">EXCEL, XML, XMLS (1000MB)
                        </p>
                    </div>
                    <form wire:submit='import' enctype="multipart/form-data">
                        <div>
                            <input wire:model='file' id="dropzone-file" wire:loading.attr="disabled" wire:target='import'
                                type="file" class="hidden" />
                            @if ($file)
                                <x-button.button-process type='submit'>
                                    <div wire:loading.remove wire:target='import'>
                                        Procesar
                                    </div>
                                    <div wire:loading wire:target='import'>
                                        Procesando<i class="fa-solid fa-spinner fa-spin-pulse"></i>
                                    </div>
                                </x-button.button-process>
                            @endif
                        </div>
                    </form>
                </label>
            </div>
            <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                <x-button.button-danger type="button" wire:click="$toggle('isOpenModalImport')">
                    Cancel
                </x-button.button-danger>
            </div>
    </x-modal>
@endif
