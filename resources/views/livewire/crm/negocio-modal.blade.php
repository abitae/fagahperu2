@if ($isOpenModal)
<x-modal title="{{ isset($negocioForm->negocio) ? 'Update negocio' : 'Create negocio' }}" maxWidth='3xl'>
    <form class="form" wire:submit='{{ isset($negocioForm->negocio) ? ' updateNegocio' : 'createNegocio' }}'>
        <div class="p-4 space-y-4 md:p-5">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-3 sm:col-span-3">
                    <label for="user_id">Encargado</label>
                    <select wire:model="negocioForm.user_id" id="user_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Seleccione un usuario</option>
                        @forelse ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->id }}
                            {{ $user->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    @error('negocioForm.user_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                        {{ $message }}.</p>
                    @enderror

                </div>
                <div class="col-span-3 sm:col-span-3">
                    <label for="customer_id">Cliente</label>
                    <select wire:model.live="negocioForm.customer_id" id="customer_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Seleccione un cliente</option>
                        @forelse ($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->id }}
                            {{ $customer->first_name }}
                            {{ $customer->last_name }}</option>
                        @empty
                        @endforelse
                    </select>
                    @error('negocioForm.customer_id')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                        {{ $message }}.</p>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-text-input wire:model.live='negocioForm.code' type='text' for='code' label='Codigo'
                        placeholder='Ingrese codigo' required />
                    @error('negocioForm.code')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                        {{ $message }}.</p>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-text-input wire:model.live='negocioForm.name' type='text' for='name' label='name'
                        placeholder='Ingrese name' required />
                    @error('negocioForm.name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Error!</span>
                        {{ $message }}.</p>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="Fecha de cierre" class="block text-sm font-medium text-gray-900 dark:text-white">Fecha
                        de formalizacion</label>
                    <input type="date" wire:model.live='negocioForm.date_closing'
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-select-input wire:model.live='negocioForm.priority' for='priority' label='Prioridad'>
                        <option value="">--Select--</option>
                        <option value="ALTA">ALTA</option>
                        <option value="MEDIA">MEDIA</option>
                        <option value="BAJA">BAJA</option>
                    </x-select-input>
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <label for="Monto aproximado" class="block text-sm font-medium text-gray-900 dark:text-white">
                        Monto cierre
                    </label>
                    <input min="0" step=".01" type="number" wire:model.live='negocioForm.monto_aprox' id="monto_aprox"
                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder="monto cierre" required="">
                </div>
                <div class="col-span-6 sm:col-span-3">
                    <x-select-input wire:model.live='negocioForm.stage' for='stage' label='Estado'>
                        <option value="">--Select--</option>
                        <option value="PROCESO">PROCESO</option>
                        <option value="ACEPTADA">ACEPTADA</option>
                        <option value="PAGADO">PAGADO</option>
                    </x-select-input>
                </div>
                <div class="col-span-6 sm:col-span-6">
                    <x-area-input wire:model.live='negocioForm.description' type='text' for='description'
                        label='Description' placeholder='Ingrese descripcion' required>
                    </x-area-input>
                </div>
                <div class="col-span-6 sm:col-full">
                    <x-button.button-save type='submit'>
                        Guardar
                    </x-button.button-save>
                </div>
            </div>
        </div>
    </form>
</x-modal>
@endif
@push('js')
<script>
    $(document).ready(function() {
            $('#customer_id').select2({
                theme: "classic",
                width: 'resolve',
                dropdownParent: $('#myModal')
            });
            $('#customer_id').on('change', function() {
                @this.set('customer', $(this).val());
            });
        });
</script>
<script>
    $(document).ready(function() {
            $('#employee_id').select2({
                theme: "classic",
                width: 'resolve',
                dropdownParent: $('#myModal')
            });
            $('#employee_id').on('change', function() {
                @this.set('employee', $(this).val());
            });
        });
</script>
@endpush