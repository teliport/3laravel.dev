@props(['disabled' => false])

<input 
    {{ $attributes->merge([
        'type' => 'text',
        'class' => 'border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'
    ]) }}
    @if($disabled) disabled @endif
/>
