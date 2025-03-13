<x-modal title="{{ isset($contactForm->contact) ? 'Update contact' : 'Create contact' }}"
    maxWidth='2xl'>
    <form class="form"
        wire:submit="{{ isset($contactForm->contact) ? 'updateContact' : 'createContact' }}">
        <div class="p-4 space-y-4 md:p-5">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-2">
                    <x-select-input wire:model.live="contactForm.type_code" for='rol'
                        label='Tipo documento'>
                        <option>*Select option</option>
                        <option value="DNI">DNI</option>
                        <option value="RUC">RUC</option>
                    </x-select-input>
                    @error('userForm.type_code')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Error!</span> {{ $message }}.</p>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-text-input wire:model.live='contactForm.code' type='text'
                        for='code' label='Numero documento'
                        placeholder='Ingrese numero documento' />
                    @error('contactForm.code')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Error!</span> {{ $message }}.</p>
                    @enderror
                </div>

            </div>
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-3">
                    <x-text-input wire:model.live='contactForm.first_name' type='text'
                        for='first_name' label='Nombres' placeholder='Ingrese nombres'
                        required />
                    @error('contactForm.first_name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Error!</span> {{ $message }}.</p>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-text-input wire:model.live='contactForm.last_name' type='text'
                        for='last_name' label='Apellidos' placeholder='Ingrese apellidos'
                        required />
                    @error('contactForm.last_name')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Error!</span> {{ $message }}.</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-2">
                    <label class="block text-sm font-medium text-gray-900 dark:text-white">
                        Fecha Nacimiento
                    </label>
                    <input wire:model.live='contactForm.date_brinday' type="date"
                        type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-2 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Fecha Nacimiento">
                    @error('contactForm.date_brinday')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Error!</span> {{ $message }}.</p>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-text-input wire:model.live='contactForm.phone' type='text'
                        for='phone' label='Telefono' placeholder='Ingrese telefono'
                        required />
                    @error('contactForm.phone')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Error!</span> {{ $message }}.</p>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-2">
                    <x-text-input wire:model.live='contactForm.email' type='email'
                        for='email' label='Email' placeholder='Ingrese email' />
                    @error('contactForm.email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Error!</span> {{ $message }}.</p>
                    @enderror
                </div>
            </div>
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">

                    <x-text-input wire:model.live='contactForm.address' type='text'
                        for='address' label='Direccion' placeholder='Ingrese address'
                        required />
                    @error('contactForm.address')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                class="font-medium">Error!</span> {{ $message }}.</p>
                    @enderror
                </div>
            </div>
        </div>
        <div
            class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
            <x-button.button-danger type="button" wire:click="$toggle('isOpenModal')">
                Cancel
            </x-button.button-danger>
            <x-button.button-save type='submit'>
                Guardar
            </x-button.button-save>
        </div>
    </form>
</x-modal>
