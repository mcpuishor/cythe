@props([
    "label" => '',
    "name" => '',
    'placeholder' => '',
    'required' => false,
    'livewire' => false,
    'loading' => false,
])
<div class="flex flex-col my-5 space-y-3 relative">
    <label
        for="{{ str()->of($label)->slug() }}"
        class="font-bold"
    >
        {{ $label }}
        @if ($required)<span class="text-red-600">*</span>@endif
        :
    </label>
    @if($loading)
        <x-cythe::ui.spinner />
   @endif
    <textarea
        placeholder="{{ $placeholder }}"
        {{ $attributes->whereStartsWith('x-') }}
        @if ($livewire)
            wire:model="{{ $name }}"
            {{ $attributes->whereStartsWith('wire:') }}
        @endif
        id="{{ str()->of($label)->slug() }}"
        name="{{ $name ?? str()->of($label)->slug() }}"
        @class([
             'rounded-md border',
             'border-gray-300' =>  !($errors->has( $name ?? str()->of($label)->slug() )),
             'border-red-600 bg-red-50' =>  ($errors->has( $name ?? str()->of($label)->slug() ))
        ])
    >{{ @old($name ?? str()->of($label)->slug()) }}</textarea>
    @error( $name ?? str()->of($label)->slug())
    <p class="text-red-600 text-sm">{{ $message }}</p>
    @enderror

</div>

