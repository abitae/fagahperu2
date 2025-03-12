@props(['type','label', 'for', 'placeholder', 'required' => false, 'disabled' => false])

<label for="{{ $for }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
    {{ $label }}
</label>
<textarea {{ $disabled ? 'disabled' : '' }} {{ $required ? 'required' : '' }} placeholder="{{ $placeholder }}"
    type="{{  $type }}" id="{{ $for }}" {!! $attributes->merge([
        'class' =>
            'block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
    ]) !!}></textarea>
