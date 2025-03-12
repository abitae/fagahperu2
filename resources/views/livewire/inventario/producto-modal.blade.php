@if ($isOpenModal)
<x-modal title="{{ isset($productForm->product) ? 'Update product' : 'Create product' }}" maxWidth='sm'>
    <form class="form" wire:submit="{{ isset($productForm->product) ? 'updateProduct' : 'createProduct' }}">
        <div class="p-4 space-y-4 md:p-5">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <x-text-input wire:model.live='productForm.code_entrada' type='text' for='code_entrada'
                        label='Codigo' placeholder='Ingrese codigo' />
                    @error('productForm.code_entrada')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span> {{
                        $message }}.
                    </p>
                    @enderror
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
@if ($isOpenModalExit)
<x-modal title="Crear codigo de salida" maxWidth='sm'>
    <form class="form" wire:submit="createCodeExit">
        <div class="p-4 space-y-4 md:p-5">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-6">
                    <x-text-input wire:model.live='codeExitForm.name' type='text' for='name' label='Codigo salida'
                        placeholder='Ingrese codigo' />
                    @error('codeExitForm.name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500">
                        <span class="font-medium">Error!</span>
                        {{ $message }}.
                    </p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="flex items-center p-4 border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
            <x-button.button-danger type="button" wire:click="$toggle('isOpenModalExit')">
                Cancel
            </x-button.button-danger>
            <x-button.button-save type='submit'>
                Guardar
            </x-button.button-save>
        </div>
    </form>
</x-modal>
@endif
