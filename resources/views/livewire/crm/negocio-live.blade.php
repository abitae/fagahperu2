<div>
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">

            @include('livewire.crm.negocio-nav')

            <div class="md:flex">
                @include('livewire.crm.negocio-filtro')
                <div class="flex items-center ml-auto space-x-2 md:space-x-3">
                    <x-button.button-pluss-purple wire:click="create">
                        Create
                    </x-button.button-pluss-purple>
                    <div>
                        @include('livewire.crm.negocio-modal')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.crm.negocio-table')
</div>