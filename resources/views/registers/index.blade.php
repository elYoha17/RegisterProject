<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Liste des registres') }}
            </h2>
            
            <div>
                <x-link-button :href="route('registers.create')">Créer un registre</x-link-button>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-register-table :registers="$registers"></x-register-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
