<div class="grid grid-cols-1 px-4 pt-6 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
    <div class="mb-4 col-span-full xl:mb-2">
        <nav class="flex mb-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                <li class="inline-flex items-center">
                    <a href="#"
                        class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                        <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                            </path>
                        </svg>
                        Home
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
                        <a href="{{ route('crm.negocios') }}"
                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">
                            CRM
                        </a>
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
                        <a href="{{ route('crm.negocios') }}"
                            class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">
                            Negocios
                        </a>
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
                            Acciones
                        </span>
                    </div>
                </li>
            </ol>
        </nav>
    </div>
    <div class="mb-1 col-span-full xl:mb-1">
        <div
            class="p-4 mb-1 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-4 dark:bg-gray-800">
            <div class="flow-root dark:text-white">
                <h4 class="text-xl font-semibold">Negocio</h4>
                <div class="grid grid-flow-col grid-rows-4 gap-1">
                    <div>
                        <div class="grid grid-cols-4">
                            <div>Codigo {{ $this->negocioForm->code }}</div>
                            <div>Name {{ $this->negocioForm->name }}</div>
                            <div>Prioridad {{ $this->negocioForm->priority }}</div>
                        </div>
                    </div>
                    <div>
                        <div class="grid grid-cols-4">
                            <div col-span-2>Asignado {{ $this->negocioForm->negocio->user->name }}</div>
                            <div></div>
                            <div>Cliente {{ $this->negocioForm->negocio->customer->first_name }}</div>
                        </div>
                    </div>
                    <div>
                        <div class="grid grid-cols-4">
                            <div>date closing {{ $this->negocioForm->date_closing }}</div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                S/ {{ $this->negocioForm->monto_aprox }}
                            </div>
                            <div>Estado {{ $this->negocioForm->stage }}</div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-flow-col grid-rows-1 gap-1">
                    <div>
                        description {{ $this->negocioForm->description }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-span-2">
        <div
            class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-4 dark:bg-gray-800">
            <div class="flow-root">
                <h3 class="text-xl font-semibold dark:text-white">Actions</h3>
                <ul class="mb-6 divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse ($actions as $action)
                        <li wire:key='action-{{ $action->id }}' class="py-4">
                            <div class="flex justify-between xl:block 2xl:flex align-center 2xl:space-x-4">
                                <div class="flex space-x-4 xl:mb-4 2xl:mb-0">
                                    <div class="flex-1 min-w-0">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <p
                                                    class="mb-1 text-sm font-normal truncate text-primary-700 dark:text-gray-500">
                                                    {{ $action->tipo }}
                                                </p>
                                            </div>

                                        </div>
                                        <p class="text-gray-800 font-mddium text-md dark:text-gray-400">
                                            {{ $action->description }}
                                        </p>
                                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400">
                                            {{ \Carbon\Carbon::parse($action->date)->format('d/m/Y h:i:s') }}
                                        </p>
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-3">
                                                <p
                                                    class="text-base font-semibold text-gray-900 leading-none truncate mb-0.5 dark:text-white">
                                                    Contacto: {{ $action->contact->first_name }}
                                                    {{ $action->contact->last_name }}
                                                </p>
                                                <p
                                                    class="inline text-sm font-normal text-gray-900 leading-none truncate mb-0.5 dark:text-white">
                                                    Email: {{ $action->contact->email }} Telefono:
                                                    {{ $action->contact->phone }}
                                                </p>
                                            </div>
                                            <div class="col-span-6 px-10 sm:col-span-3">
                                                @if ($action->image)
                                                    <a href='{{ asset("storage/$action->image") }}' target="_blank"
                                                        class="px-2 mb-1 text-sm font-normal truncate text-primary-700 dark:text-white">
                                                        <i class="px-2 fa-regular fa-eye"></i>Imagen
                                                    </a>
                                                @endif
                                                @if ($action->archivo)
                                                    <a href='{{ asset("storage/$action->archivo") }}' target="_blank"
                                                        class="mb-1 text-sm font-normal truncate text-primary-700 dark:text-white">
                                                        <i class="px-2 fas fa-download"></i>Archivo
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                                <div class="inline-flex items-center w-auto xl:w-auto 2xl:w-auto">
                                    <x-button.button-delete wire:click='delete({{ $action->id }})'
                                        wire:confirm.prompt="Estas seguro de eliminar registro?\n\nEscriba '{{ $action->id }}' para confirmar!|{{ $action->id }}">
                                    </x-button.button-delete>

                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="py-4">
                            No Actions Found!
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="col-span-full xl:col-auto">
        <div class="p-5 border border-gray-200 border-b-1 rounded-b-xl dark:border-gray-700 dark:bg-gray-900">
            <form wire:submit="createAction">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 sm:col-span-6">
                        <x-select-input wire:model.live='actionForm.tipo' for='tipo' label='Tipo Accion'>
                            <option value="">* selected</option>
                            <option value="EMAIL">EMAIL</option>
                            <option value="MENSAJE">MENSAJE</option>
                            <option value="LLAMADA">LLAMADA</option>
                            <option value="OTRO">OTRO</option>
                        </x-select-input>
                        @error('actionForm.tipo')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.
                            </p>
                        @enderror
                    </div>
                    <div wire:ignore class="col-span-6 sm:col-span-6">
                        <label class="block text-sm font-medium text-gray-900 dark:text-white"
                            for="contact_id">Contacto</label>
                        <select wire:model.live="actionForm.contact_id" id="contact_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option></option>
                            @forelse ($contacts as $contact)
                                <option value="{{ $contact->id }}">{{ $contact->id }}
                                    {{ $contact->first_name }}
                                    {{ $contact->last_name }}
                                </option>
                            @empty
                            @endforelse
                        </select>
                        @error('actionForm.contact_id')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.
                            </p>
                        @enderror
                    </div>

                    <div class="col-span-6 sm:col-span-6">
                        <x-area-input wire:model.live='actionForm.description' type='text' for='code'
                            label='Descripcion' placeholder='Ingrese descripcion' required />
                        @error('actionForm.description')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.
                            </p>
                        @enderror
                    </div>
                    <div class="col-span-6 text-xs sm:col-span-6 dark:text-white">
                        <label for="image">Imagen</label>
                        <input wire:model.live='actionForm.image' type="file" class="text-xs form-control"
                            id="image">
                        @error('actionForm.image')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.
                            </p>
                        @enderror
                    </div>
                    <div class="col-span-6 text-xs sm:col-span-6 dark:text-white">
                        <label for="archivo">Archivo</label>
                        <input wire:model.live='actionForm.archivo' type="file" class="text-xs form-control"
                            id="archivo">
                        @error('actionForm.archivo')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                                {{ $message }}.
                            </p>
                        @enderror
                    </div>
                    <div class="col-span-6 sm:col-full">
                        <x-button.button-save type='submit'>
                            Actualizar
                        </x-button.button-save>
                    </div>
                </div>
            </form>
        </div>
        <div id="accordion-color" data-accordion="collapse"
            data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
            <h2 id="accordion-color-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full gap-3 p-5 font-medium text-gray-500 border border-b-0 border-gray-200 border-b-1 rtl:text-right rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-color-body-1" aria-expanded="true"
                    aria-controls="accordion-color-body-1">
                    <span>Oportunidad de Negocio</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-color-body-1" class="show" aria-labelledby="accordion-color-heading-1">
                <div class="p-5 border border-gray-200 border-b-1 dark:border-gray-700 dark:bg-gray-900">
                    <form class="form" wire:submit='updateNegocio'>
                        <div class="grid grid-cols-6 gap-6">
                            <div wire:ignore class="col-span-3 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-900 dark:text-white"
                                    for="customer_id">Cliente</label>
                                <select wire:model.live="negocioForm.customer_id" id="customer_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @forelse ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->id }}
                                            {{ $customer->first_name }}
                                            {{ $customer->last_name }}
                                        </option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('negocioForm.customer_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.
                                    </p>
                                @enderror
                            </div>
                            <div wire:ignore class="col-span-3 sm:col-span-3">
                                <label class="block text-sm font-medium text-gray-900 dark:text-white"
                                    for="user_id">Encargado</label>
                                <select wire:model.live="negocioForm.user_id" id="user_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @forelse ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->id }}
                                            {{ $user->name }}
                                        </option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('negocioForm.user_id')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.
                                    </p>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-text-input wire:model.live='negocioForm.code' type='text' for='code'
                                    label='Codigo' placeholder='Ingrese codigo' required />
                                @error('negocioForm.code')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.
                                    </p>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-text-input wire:model.live='negocioForm.name' type='text' for='name'
                                    label='name' placeholder='Ingrese name' required />
                                @error('negocioForm.name')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.
                                    </p>
                                @enderror
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="Fecha de cierre"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">Address</label>
                                <input type="date" wire:model.live='negocioForm.date_closing'
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-select-input wire:model.live='negocioForm.priority' for='priority'
                                    label='Prioridad'>
                                    <option value="ALTA">ALTA</option>
                                    <option value="MEDIA">MEDIA</option>
                                    <option value="BAJA">BAJA</option>
                                </x-select-input>
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <label for="Monto aproximado"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">
                                    Monto cierre
                                </label>
                                <input min="0" step=".01" type="number"
                                    wire:model.live='negocioForm.monto_aprox' id="monto_aprox"
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="monto cierre" required="">
                            </div>
                            <div class="col-span-6 sm:col-span-3">
                                <x-select-input wire:model.live='negocioForm.stage' for='stage' label='Estado'>
                                    <option value="NUEVO">NUEVO</option>
                                    <option value="COTIZADO">COTIZADO</option>
                                    <option value="GANADO">GANADO</option>
                                    <option value="PERDIDO">PERDIDO</option>
                                </x-select-input>
                            </div>
                            <div class="col-span-6 sm:col-span-6">
                                <x-area-input wire:model.live='negocioForm.description' type='text'
                                    for='description' label='Description' placeholder='Ingrese descripcion' required>
                                </x-area-input>
                            </div>
                            <div class="col-span-6 sm:col-full">
                                <x-button.button-save type='submit'>
                                    Actualizar
                                </x-button.button-save>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        $(document).ready(function() {
            $('#customer_id').select2({
                width: '100%'
            });
            $('#customer_id').on('change', function() {
                @this.set('customer', $(this).val());
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#user_id').select2({
                width: '100%'
            });
            $('#user_id').on('change', function() {
                @this.set('user', $(this).val());
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#contact_id').select2({
                width: '100%'
            });
            $('#contact_id').on('change', function() {
                @this.set('contact', $(this).val());
            });
        });
    </script>
@endpush
