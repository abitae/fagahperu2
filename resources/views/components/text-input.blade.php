@props(['type','label', 'for', 'placeholder', 'required' => false, 'disabled' => false])

<label for="{{ $for }}" class="block text-sm font-medium text-gray-900 dark:text-white">
    {{ $label }}
</label>
<input {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} placeholder="{{ $placeholder }}"
    type="{{  $type }}" id="{{ $for }}" {!! $attributes->merge([
        'class' =>
            'shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
    ]) !!}>
