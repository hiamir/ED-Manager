@props(['name','type'=>'','id'=>'','value'=>''])
<input
    name="{{ $name }}"
    type="{{ $type }}"
    id="@if($id==''){{$name}}@else{{$id}}@endif"
    {{ $attributes->merge(['class'=>'bg-gray-100 border border-gray-300
text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500
block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600
dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500'])}}
    @if($value)value="{{ $value }}"@endif
    {{ $attributes }} disabled
/>
