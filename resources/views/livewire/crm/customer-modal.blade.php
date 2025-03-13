@if ($isOpenModal)
    <x-modal title="{{ isset($customerForm->customer) ? 'Update customer' : 'Create customer' }}" maxWidth='2xl'>
        <form class="form" wire:submit="{{ isset($customerForm->customer) ? 'updateCustomer' : 'createCustomer' }}">
            <div class="p-4 space-y-4 md:p-5">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-2">
                        <x-select-input wire:model.live="customerForm.type_code" for='rol' label='Tipo documento'>
                            <option>*Select option</option>
                            <option value="dni">DNI</option>
                            <option value="ruc">RUC</option>
                        </x-select-input>
                        @error('userForm.type_code')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.</p>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-4">

                        <div class="max-w-md mx-auto">
                            <div class="relative">
                                <x-text-input type="text" label='Numero de documento' for="code" id="code"
                                    wire:model.live='customerForm.code'
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="DNI / RUC" required />
                                <button wire:click='buscarDocumento' type='button'
                                    class="text-white absolute end-2.5 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Buscar</button>
                            </div>
                        </div>
                        @error('customerForm.code')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.</p>
                        @enderror
                    </div>

                </div>
                <div>
                    <x-select-input wire:model.live="customerForm.type_id" for='rol' label='Tipo cliente'>
                        <option>*Select option</option>
                        @forelse ($customerTypes as $customerType)
                            <option value="{{ $customerType->id }}">{{ $customerType->name }}</option>
                        @empty
                            <option value="">No hay tipos de documentos</option>
                        @endforelse
                    </x-select-input>
                </div>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-text-input wire:model.live='customerForm.first_name' type='text' for='first_name'
                            label='Denominacion' placeholder='Ingrese nombres' />
                        @error('customerForm.first_name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-3">
                        <x-text-input wire:model.live='customerForm.phone' type='text' for='phone'
                            label='Telefono' placeholder='Ingrese telefono' />
                        @error('customerForm.phone')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.</p>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-3">
                        <x-text-input wire:model.live='customerForm.email' type='email' for='email' label='Email'
                            placeholder='Ingrese email' />
                        @error('customerForm.email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-text-input wire:model.live='customerForm.address' type='text' for='address'
                            label='Direccion' placeholder='Ingrese address' />
                        @error('customerForm.address')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.</p>
                        @enderror
                    </div>
                </div>
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <label for="archivo"
                            class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-30 bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                    <span class="font-semibold">
                                        Archivo PDF
                                    </span>
                                </p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">PDF</p>
                            </div>
                            <input wire:model.live='customerForm.archivo' id="archivo" type="file"
                                class="hidden" />
                        </label>
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
@if ($isOpenModalAutorization)
    <x-modal2 title="Generar carta de distribuidor" maxWidth='md'>
        <form class="form" wire:submit="getAutorization">
            <div class="p-4 space-y-4 md:p-5">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6">
                        <x-select-input wire:model.live="line_atutorization" for='rol' label='Linea'>
                            @forelse($lines as $line)
                                <option value={{ $line->id }}>{{ $line->name }}</option>
                            @empty
                                <p>No hay usuarios.</p>
                            @endforelse
                        </x-select-input>
                        @error('userForm.type_code')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.</p>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
                <x-button.button-danger type="button" wire:click="$toggle('isOpenModalAutorization')">
                    Cancel
                </x-button.button-danger>
                <x-button.button-save type='submit'>
                    Generar
                </x-button.button-save>
            </div>
        </form>
    </x-modal2>
@endif
