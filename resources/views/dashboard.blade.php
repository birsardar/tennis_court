<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="p-4 mb-4 text-sm text-center text-green-800 rounded-lg bg-green-50" role="alert">
        @if (session('message'))
            <div class="text-green-500">
                {{ session('message') }}
            </div>
        @endif
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="py-6">
                <div class="flex justify-end">
                    <a href="{{ route('proposal.create') }}">
                        <x-button type="button">Create Proposal</x-button>
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @livewire('show-proposals')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
