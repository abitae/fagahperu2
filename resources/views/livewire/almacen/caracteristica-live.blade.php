<div>
    <div
        class="space-y-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
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
                                    Catalogo
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
                                    Caracteristicas
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">
                    Caracteristicas de producto
                </h1>
            </div>
            <div class="grid grid-cols-4 grid-rows-1 gap-1">
                <div>
                    <img width="120" height="120" src="{{ asset("storage/$product->image") }}">
                </div>
                <div>
                    <p class="mb-1 text-xs text-hover-primary">
                        {{ $product->code }}</p>
                    <p class="mb-1 text-xs text-hover-primary">
                        {{ $product->code_fabrica }}</p>
                    <p class="mb-1 text-xs text-hover-primary">
                        {{ $product->code_peru }}</p>
                    @if ($product->archivo)
                    <a target="_blank" href='{{ asset("storage/$product->archivo") }}'
                        class="mb-1 text-xs text-green-600 bg-yellow-200 text-hover-primary">
                        Ficha Tecnica</a>
                    @endif
                    @if ($product->archivo2)
                    <a target="_blank" href='{{ asset("storage/$product->archivo2") }}'
                        class="mb-1 text-xs text-yellow-600 bg-green-500 text-hover-primary">
                        Certificado</a>
                    @endif



                </div>
                <div>
                    <p class="mb-1 text-xs text-hover-primary">
                        {{ $product->description }}
                    </p>

                </div>
                <div>
                    <p class="mb-1 text-xs text-hover-primary">
                        {{ $product->price_venta }}
                    </p>
                    <p class="mb-1 text-xs text-hover-primary">
                        {{ $product->stock }}
                    </p>
                    <p class="mb-1 text-xs text-hover-primary">
                        {{ $product->brand->name }}
                    </p>
                    <p class="mb-1 text-xs text-hover-primary">
                        {{ $product->category->name }}
                    </p>
                </div>
            </div>

        </div>
    </div>
    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                    <!--begin::Form-->
                    <form class="form" wire:submit="saveCaracteristicas">
                        <div
                            class="p-4 space-y-2 transition-all duration-300 bg-white border-4 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.estructura' type='text' for='estructura'
                                        label='estructura' placeholder='estructura' />
                                    @error('form.estructura')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.base_del_asiento' type='text'
                                        for='base_del_asiento' label='base_del_asiento'
                                        placeholder='base_del_asiento' />
                                    @error('form.base_del_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.relleno_del_asiento' type='text'
                                        for='relleno_del_asiento' label='relleno_del_asiento'
                                        placeholder='relleno_del_asiento' />
                                    @error('form.relleno_del_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.acabado_del_asiento' type='text'
                                        for='acabado_del_asiento' label='acabado_del_asiento'
                                        placeholder='acabado_del_asiento' />
                                    @error('form.acabado_del_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.espaldar' type='text' for='espaldar'
                                        label='espaldar' placeholder='espaldar' />
                                    @error('form.espaldar')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.relleno_del_espaldar' type='text'
                                        for='relleno_del_espaldar' label='relleno_del_espaldar'
                                        placeholder='relleno_del_espaldar' />
                                    @error('form.relleno_del_espaldar')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.acabado_del_espaldar' type='text'
                                        for='acabado_del_espaldar' label='acabado_del_espaldar'
                                        placeholder='acabado_del_espaldar' />
                                    @error('form.acabado_del_espaldar')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.reposa_brazos' type='text' for='reposa_brazos'
                                        label='reposa_brazos' placeholder='reposa_brazos' />
                                    @error('form.reposa_brazos')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.cantidad_de_patas' type='text'
                                        for='cantidad_de_patas' label='cantidad_de_patas'
                                        placeholder='cantidad_de_patas' />
                                    @error('form.cantidad_de_patas')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.soporte_peso_máximo' type='text'
                                        for='soporte_peso_máximo' label='soporte_peso_máximo'
                                        placeholder='soporte_peso_máximo' />
                                    @error('form.soporte_peso_máximo')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.garantia_de_fabrica' type='text'
                                        for='garantia_de_fabrica' label='garantia_de_fabrica'
                                        placeholder='garantia_de_fabrica' />
                                    @error('form.garantia_de_fabrica')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.unidad_de_despacho' type='text'
                                        for='unidad_de_despacho' label='unidad_de_despacho'
                                        placeholder='unidad_de_despacho' />
                                    @error('form.unidad_de_despacho')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.gama_de_color' type='text' for='gama_de_color'
                                        label='gama_de_color' placeholder='gama_de_color' />
                                    @error('form.gama_de_color')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.marca' type='text' for='marca' label='marca'
                                        placeholder='marca' />
                                    @error('form.marca')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.modelo' type='text' for='modelo' label='modelo'
                                        placeholder='modelo' />
                                    @error('form.modelo')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.codigo_de_identificacion_unico' type='text'
                                        for='codigo_de_identificacion_unico' label='codigo_de_identificacion_unico'
                                        placeholder='codigo_de_identificacion_unico' />
                                    @error('form.codigo_de_identificacion_unico')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.empaque_de_fabrica' type='text'
                                        for='empaque_de_fabrica' label='empaque_de_fabrica'
                                        placeholder='empaque_de_fabrica' />
                                    @error('form.empaque_de_fabrica')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.certificado_de_ergonomía' type='text'
                                        for='certificado_de_ergonomía' label='certificado_de_ergonomía'
                                        placeholder='certificado_de_ergonomía' />
                                    @error('form.certificado_de_ergonomía')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.entrega_del_producto_armado' type='text'
                                        for='entrega_del_producto_armado' label='entrega_del_producto_armado'
                                        placeholder='entrega_del_producto_armado' />
                                    @error('form.entrega_del_producto_armado')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.soporte_del_asiento' type='text'
                                        for='soporte_del_asiento' label='soporte_del_asiento'
                                        placeholder='soporte_del_asiento' />
                                    @error('form.soporte_del_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.reposa_brazos' type='text' for='reposa_brazos'
                                        label='reposa_brazos' placeholder='reposa_brazos' />
                                    @error('form.reposa_brazos')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.material_patas' type='text' for='material_patas'
                                        label='material_patas' placeholder='material_patas' />
                                    @error('form.material_patas')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.apilable' type='text' for='apilable'
                                        label='apilable' placeholder='apilable' />
                                    @error('form.apilable')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.relleno_reposa_brazos' type='text'
                                        for='relleno_reposa_brazos' label='relleno_reposa_brazos'
                                        placeholder='relleno_reposa_brazos' />
                                    @error('form.relleno_reposa_brazos')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.material_del_piston' type='text'
                                        for='material_del_piston' label='material_del_piston'
                                        placeholder='material_del_piston' />
                                    @error('form.material_del_piston')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.material_de_la_funda_del_piston' type='text'
                                        for='material_de_la_funda_del_piston' label='material_de_la_funda_del_piston'
                                        placeholder='material_de_la_funda_del_piston' />
                                    @error('form.material_de_la_funda_del_piston')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.tipo_de_mecanismo_del_asiento' type='text'
                                        for='tipo_de_mecanismo_del_asiento' label='tipo_de_mecanismo_del_asiento'
                                        placeholder='tipo_de_mecanismo_del_asiento' />
                                    @error('form.tipo_de_mecanismo_del_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.material_del_mecanismo_del_asiento' type='text'
                                        for='material_del_mecanismo_del_asiento'
                                        label='material_del_mecanismo_del_asiento'
                                        placeholder='material_del_mecanismo_del_asiento' />
                                    @error('form.material_del_mecanismo_del_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.soporte_lumbar' type='text' for='soporte_lumbar'
                                        label='soporte_lumbar' placeholder='soporte_lumbar' />
                                    @error('form.soporte_lumbar')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.reposacabeza' type='text' for='reposacabeza'
                                        label='reposacabeza' placeholder='reposacabeza' />
                                    @error('form.reposacabeza')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.numero_de_aspas' type='text'
                                        for='numero_de_aspas' label='número_de_aspas' placeholder='numero_de_aspas' />
                                    @error('form.numero_de_aspas')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.material_del_aspa' type='text'
                                        for='material_del_aspa' label='material_del_aspa'
                                        placeholder='material_del_aspa' />
                                    @error('form.material_del_aspa')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.material_de_las_ruedas' type='text'
                                        for='material_de_las_ruedas' label='material_de_las_ruedas'
                                        placeholder='material_de_las_ruedas' />
                                    @error('form.material_de_las_ruedas')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.tapizado_del_asiento' type='text'
                                        for='tapizado_del_asiento' label='tapizado_del_asiento'
                                        placeholder='tapizado_del_asiento' />
                                    @error('form.tapizado_del_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.cubierta_del_espaldar' type='text'
                                        for='cubierta_del_espaldar' label='cubierta_del_espaldar'
                                        placeholder='cubierta_del_espaldar' />
                                    @error('form.cubierta_del_espaldar')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.tapizado_del_espaldar' type='text'
                                        for='tapizado_del_espaldar' label='tapizado_del_espaldar'
                                        placeholder='tapizado_del_espaldar' />
                                    @error('form.tapizado_del_espaldar')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.mecanismo_del_espaldar' type='text'
                                        for='mecanismo_del_espaldar' label='mecanismo_del_espaldar'
                                        placeholder='mecanismo_del_espaldar' />
                                    @error('form.mecanismo_del_espaldar')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.tablero' type='text' for='tablero'
                                        label='tablero' placeholder='tablero' />
                                    @error('form.tablero')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.platina_de_anclaje' type='text'
                                        for='platina_de_anclaje' label='platina_de_anclaje'
                                        placeholder='platina_de_anclaje' />
                                    @error('form.platina_de_anclaje')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.tapizado_asiento' type='text'
                                        for='tapizado_asiento' label='tapizado_asiento'
                                        placeholder='tapizado_asiento' />
                                    @error('form.tapizado_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.platina_de_anclaje' type='text'
                                        for='platina_de_anclaje' label='platina_de_anclaje'
                                        placeholder='platina_de_anclaje' />
                                    @error('form.platina_de_anclaje')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.tapizado_asiento' type='text'
                                        for='tapizado_asiento' label='tapizado_asiento'
                                        placeholder='tapizado_asiento' />
                                    @error('form.tapizado_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.cantidad_de_cuerpos' type='text'
                                        for='cantidad_de_cuerpos' label='cantidad_de_cuerpos'
                                        placeholder='cantidad_de_cuerpos' />
                                    @error('form.cantidad_de_cuerpos')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.contacto_superficie' type='text'
                                        for='contacto_superficie' label='contacto_superficie'
                                        placeholder='contacto_superficie' />
                                    @error('form.contacto_superficie')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='form.cod_de_identif_unico' type='text'
                                        for='cod_de_identif_unico' label='cod_de_identif_unico'
                                        placeholder='cod_de_identif_unico' />
                                    @error('form.cod_de_identif_unico')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-button.button-save type="submit" class="w-full">Guardar</x-button.button-save>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col mt-6">
        <div class="overflow-x-auto rounded-lg">
            <div class="inline-block min-w-full align-middle">
                <div class="overflow-hidden shadow sm:rounded-lg">
                    <!--begin::Form-->
                    <form class="form" wire:submit="saveMedidas">
                        <div
                            class="p-4 space-y-2 transition-all duration-300 bg-white border-4 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='medidaForm.alto_total' type='text' for='alto_total'
                                        label='alto_total' placeholder='alto_total' />
                                    @error('medidaForm.alto_total')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='medidaForm.ancho_total' type='text' for='ancho_total'
                                        label='ancho_total' placeholder='ancho_total' />
                                    @error('medidaForm.ancho_total')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='medidaForm.profundidad_total' type='text'
                                        for='profundidad_total' label='profundidad_total'
                                        placeholder='profundidad_total' />
                                    @error('medidaForm.profundidad_total')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='medidaForm.alto_espaldar' type='text'
                                        for='alto_espaldar' label='alto_espaldar' placeholder='alto_espaldar' />
                                    @error('medidaForm.alto_espaldar')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='medidaForm.ancho_espaldar' type='text'
                                        for='ancho_espaldar' label='ancho_espaldar' placeholder='ancho_espaldar' />
                                    @error('medidaForm.ancho_espaldar')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='medidaForm.profundidad_asiento' type='text'
                                        for='profundidad_asiento' label='profundidad_asiento'
                                        placeholder='profundidad_asiento' />
                                    @error('medidaForm.profundidad_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='medidaForm.ancho_asiento' type='text'
                                        for='ancho_asiento' label='ancho_asiento' placeholder='ancho_asiento' />
                                    @error('medidaForm.ancho_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='medidaForm.altura_asiento' type='text'
                                        for='altura_asiento' label='altura_asiento' placeholder='altura_asiento' />
                                    @error('medidaForm.altura_asiento')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-area-input wire:model.live='medidaForm.recomendacion_uso' type='text'
                                        for='recomendacion_uso' label='recomendacion_uso'
                                        placeholder='recomendacion_uso' />
                                    @error('medidaForm.recomendacion_uso')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                                <div class="col-span-6 sm:col-span-3">
                                    <x-area-input wire:model.live='medidaForm.descripcion_general' type='text'
                                        for='descripcion_general' label='descripcion_general'
                                        placeholder='descripcion_general' />
                                    @error('medidaForm.descripcion_general')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>

                            </div>
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:col-span-3">
                                    <x-text-input wire:model.live='medidaForm.margen_error' type='text'
                                        for='margen_error' label='margen_error' placeholder='margen_error' />
                                    @error('medidaForm.margen_error')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span
                                            class="font-medium">Error!</span>
                                        {{ $message }}.</p>
                                    @enderror
                                </div>
                                <div class="col-span-6 sm:col-span-3">
                                    <x-button.button-save type="submit" class="w-full">Guardar</x-button.button-save>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div>
    </div>
</div>