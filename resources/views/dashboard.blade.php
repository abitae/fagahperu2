<x-app-layout>
    <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-2 ">
        <!-- Main widget -->
        <div
            class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">

            @livewire('components.chart-barra-live')

        </div>
        <!--Tabs widget -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            
        </div>
    </div>
</x-app-layout>
