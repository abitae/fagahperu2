<div class="flex items-center space-x-4">
    <div class="relative">
        <x-select-input wire:model.live.debounce.200ms="lineFilter" for='rol' label=''>
            <option>*Lineas</option>
            @forelse ($this->lines as $line)
            <option value="{{ $line->id }}">{{ $line->name }}</option>
            @empty
            @endforelse
        </x-select-input>
    </div>
    <div class="relative">
        <x-select-input wire:model.live.debounce.200ms="categoryFilter" for='rol' label=''>
            <option>*Categorias</option>
            @forelse ($this->categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @empty
            @endforelse
        </x-select-input>
    </div>
    <div class="relative">
        <x-select-input wire:model.live.debounce.200ms="brandFilter" for='rol' label=' '>
            <option>*Marcas</option>
            @forelse ($this->brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @empty
            @endforelse
        </x-select-input>
    </div>
    <div class="relative">
        <x-select-input wire:model.live.debounce.200ms="num" for='rol' label=' '>
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="500">500</option>
            <option value="1000">1000</option>
        </x-select-input>
    </div>
    <div class="relative">
        <x-select-input wire:model.live.debounce.200ms="isActive" for='rol' label=' '>
            <option>*Activo</option>
            <option value="1">SI</option>
            <option value="0">No</option>
        </x-select-input>
    </div>
    <div class="relative">
        <x-button.button-primary wire:click="deleteFilter">
            Limpiar Filtros
        </x-button.button-primary>
    </div>
</div>
