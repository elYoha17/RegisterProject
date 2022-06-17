<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Un registre à gérer') }}
                </h2>
                <div class="text-lg text-gray-600 font-semibold">{{ $register->title }}</div>    
            </div>
            <div class="flex gap-4 items-center">
                <x-link-button :href="route('registers.show', $register)">Afficher</x-link-button>
            </div>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-managment-table :register="$register" :agents="$agents" :presents="$presents"></x-managment-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
