@props([
    "label" => '',
    "name" => '',
    'placeholder' => '',
    'required' => false,
    'livewire' => false,
    'loading' => false,
])
<div {{ $attributes->merge(['class' =>"flex flex-col my-5 space-y-3 relative" ]) }}>
    <label
        for="{{ str()->of($label)->slug() }}"
        class="font-bold"
    >
        {{ $label }}
        @if ($required)<span class="text-red-600">*</span>@endif
        :
    </label>

    <div>
        <input
            placeholder="{{ $placeholder }}"
            {{ $attributes->whereStartsWith('x-') }}
            @if ($livewire)
                wire:model="{{ $name }}"
                {{ $attributes->whereStartsWith('wire:') }}
            @endif
            value="{{ old( $name ?? str()->of($label)->slug() ) }}"
            id="{{ str()->of($label)->slug() }}"
            name="{{ $name ?? str()->of($label)->slug() }}"
            @class([
                 'w-full rounded-md border',
                 'border-gray-300' =>  !($errors->has( $name ?? str()->of($label)->slug() )),
                 'border-red-600  bg-red-50' =>  ($errors->has( $name ?? str()->of($label)->slug() ))
            ])
        />
        @if ($loading)
        <x-cythe::ui.spinner class="w-5 h-5 inline-block" wire:loading wire:target="{{$loading}}" />
        @endif
        @error( $name ?? str()->of($label)->slug())
        <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

</div>
