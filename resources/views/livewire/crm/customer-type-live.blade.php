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
                                    CRM
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
                                    Tipo cliente
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    TIPO CLIENTE
                </h1>
            </div>
            <div class="sm:flex">
                <div
                    class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                    <label for="brands-search" class="sr-only">Search</label>
                    <div class="relative mt-1 lg:w-64 xl:w-96">
                        <input type="text" wire:model.live='search'
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Buscar tipo cliente">
                    </div>

                </div>
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <x-button.button-pluss-purple wire:click="create">
                        Create
                    </x-button.button-pluss-purple>
                    <x-button.button-download>
                        Export
                    </x-button.button-download>
                    <x-button.button-upload>
                        Import
                    </x-button.button-upload>
                    @if ($isOpenModal)
                        <x-modal title="{{ isset($customerTypeForm->customerType) ? 'ACTUALIZAR' : 'CREAR' }}" maxWidth='sm'>
                            <form class="form"
                                wire:submit="{{ isset($customerTypeForm->customerType) ? 'updateCustomerType' : 'createCustomerType' }}">
                                <div class="p-4 md:p-5 space-y-4">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-6">
                                            <x-text-input wire:model.live='customerTypeForm.name' type='text' for='name'
                                                label='Nombre' placeholder='Ingrese nombre' />
                                            @error('customerTypeForm.name')
                                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                                        class="font-medium">Error!</span> {{ $message }}.</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
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
                </div>
            </div>
        </div>
    </div>
    <div
        class="p-4 bg-white border border-gray-200 block sm:flex items-center justify-between  lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="relative w-full align-middle">
            <div class="overflow-hidden shadow">
                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                    <thead class="bg-gray-300 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Nombre
                            </th>

                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Estado
                            </th>
                            <th scope="col"
                                class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @forelse ($this->customerTypes as $customerType)
                            <tr wire:key='customerType-{{ $customerType->id }}'
                                class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="p-4 text-xs font-normal text-gray-500 dark:text-gray-400">
                                    {{ $customerType->name }}
                                </td>
                                <td class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    <button wire:click='estado({{ $customerType->id }})'
                                        wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba 'SI' para confirmar!|SI"
                                        class="flex items-center">
                                        <div
                                            class="h-2.5 w-2.5 rounded-full {{ $customerType->isActive ? 'bg-green-400' : 'bg-red-600' }} mr-2">
                                        </div>
                                        {{ $customerType->isActive ? 'Activo' : 'Inactivo' }}
                                    </button>
                                </td>
                                <td class="p-4 space-x-2 whitespace-nowrap">
                                    <x-button.button-edit wire:click='update({{ $customerType->id }})'>
                                    </x-button.button-edit>
                                    <x-button.button-delete wire:click='delete({{ $customerType->id }})'
                                        wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $customerType->name }}' para confirmar!|{{ $customerType->name }}">
                                    </x-button.button-delete>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
                {{ $this->customerTypes->links(data: ['scrollTo' => false]) }}
            </div>
        </div>
    </div>
</div>
