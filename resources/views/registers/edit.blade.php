<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Registre à modifier') }}
            </h2>
            <div class="text-lg text-gray-600 font-semibold">{{ $register->title }}</div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-1/2 mx-auto">
                        <div class="max-w-md">
                        <form method="POST" action="{{ route('registers.update', $register) }}">
                            @csrf
                            @method('put')
                
                            <!-- Date -->
                            <div class="mb-4">
                                <x-label for="date" :value="__('Date')" />
                
                                <x-input id="date" class="block mt-1 w-full" type="date" name="date" :value="$register->date->format('Y-m-d')" required autofocus />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-link :href="route('registers.show', $register)">Retour</x-link>
                                <x-button class="ml-4">
                                    {{ __('Modifier') }}
                                </x-button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<x-guest-layout>
    
</x-guest-layout>
