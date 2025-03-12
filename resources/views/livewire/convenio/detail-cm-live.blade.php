<div>
    <div
        class="space-y-2 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
        <div class="w-full mb-1">
            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{route('dashboard')}}"
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
                                    Convenio Marco
                                </span>
                            </div>
                        </li>
                        <li>
                            <a href="{{route('convenio.data')}}"
                                class="flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                Ordenes
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
                                    Detalle orden
                                </span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Card header -->
        <div class="items-center justify-between lg:flex">
            <div class="mb-4 lg:mb-0">
                <img src="https://www.catalogos.perucompras.gob.pe/Archivos/Imagenes/General/logo_PeruCompras.svg" width="200px" alt="Peru Compras">
                <h4 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                    {{ $product->acuerdo_marco}}
                </h4>
                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                    {{ substr($product->orden_electronica, 0, -1) . str_repeat('0', 1) }}
                </h3>
            </div>
            <div class="items-center sm:flex">

                <div class="flex items-center space-x-4">
                    <div class="relative max-w-sm">
                        <p  class="text-xl font-bold text-gray-900 dark:text-white">
                            PROVEEDOR
                        </p>
                        <ul class="text-xs text-gray-900 dark:text-white">
                            <li>RUC : {{ $product->ruc_proveedor }}</li>
                            <li>Razon : {{ $product->razon_proveedor }}</li>
                        </ul>
                        <p  class="text-md font-bold text-gray-900 dark:text-white">
                            ENTIDAD
                        </p>
                        <ul class="text-xs text-gray-900 dark:text-white">
                            <li>RUC : {{ $product->ruc_entidad }}</li>
                            <li>Razon : {{ $product->razon_entidad }}</li>
                        </ul>
                        <p  class="text-md font-bold text-gray-900 dark:text-white">
                            DATOS DE LA CONTRATACION
                        </p>
                        <ul class="text-xs text-gray-900 dark:text-white">
                            <li>FORMALIZACION : {{ $product->fecha_aceptacion }}</li>
                            <li>TIPO CONTRATACION : {{ $product->tipo }}</li>
                            <li>PROCEDIMIENTO : {{ $product->procedimiento }}</li>
                            <li>PLAZO DE ENTREGA : {{ $product->plazo_entrega }}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        @include('livewire.convenio.detail-cm-table')
    </div>
</div>
