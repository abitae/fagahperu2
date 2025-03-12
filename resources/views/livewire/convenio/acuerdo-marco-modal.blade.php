@if ($isOpenModal)
    <x-modal title="{{ isset($acuerdoMarcoForm->acuerdoMarco) ? 'Actualizar acuerdo marco' : 'Create acuerdo marco' }}"
        maxWidth='2xl'>
        <form class="form"
            wire:submit="{{ isset($acuerdoMarcoForm->acuerdoMarco) ? 'updateAcuerdoMarco' : 'createAcuerdoMarco' }}">
            <div class="p-4 md:p-5 space-y-4">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-text-input wire:model.live='acuerdoMarcoForm.code' type='text' for='code' label='Codigo'
                            placeholder='Ingrese codigo' />
                        @error('acuerdoMarcoForm.code')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.</p>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-span-6">
                        <x-text-input wire:model.live='acuerdoMarcoForm.name' type='text' for='name'
                            label='Descripcion' placeholder='Descripcion acuerdo marco' />
                        @error('acuerdoMarcoForm.name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
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
