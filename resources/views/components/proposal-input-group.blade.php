@props(['array', 'title', 'variable'])

<div class="my-4">
    <div class="my-4">
        <h3 class="font-medium text-2xl">{{ $title }}</h3>
    </div>
        
    <div>
        @foreach($array as $key => $value)
            <div class="mb-4">
                <div class="grid grid-cols-12">
                    <div class="flex items-center justify-center">
                        @if(!isset($value['checkbox']) || $value['checkbox'])
                            <x-input type="checkbox" class="" wire:model="{{ $variable }}.{{ $key }}.selected" id="{{ $variable }}.{{ $key }}"/>
                        @endif
                        
                    </div>
                    <div class="col-span-10">
                        <x-label for="{{ $variable }}.{{ $key }}">
                            {{ $value['title'] }}
                        </x-label>
                        @if($value['input'] && $value['selected'] && !isset($value['multiple_inputs']))
                            <x-input type="text" class="w-full" wire:model="{{ $variable }}.{{ $key }}.input_value" placeholder="Enter text"/>
                        @endif
                        @if(isset($value['multiple_inputs']) && count($value['multiple_inputs']) > 0 && $value['input'] && $value['selected'])
                            @foreach($value['multiple_inputs'] as $child_key => $input)
                                <x-input type="text" class="w-full my-2" wire:model="{{ $variable }}.{{ $key }}.multiple_inputs.{{ $child_key }}.value" placeholder="Enter {{ $input['title'] }}"/>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div