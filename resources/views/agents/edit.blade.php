<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Un agent à modifier') }}
            </h2>
            <div class="text-lg text-gray-600 font-semibold">{{ $agent->full_name }}</div>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-1/2 mx-auto">
                
                        <form method="POST" action="{{ route('agents.update', $agent) }}">
                            @csrf
                            @method('put')
                
                            <!-- First name -->
                            <div class="mb-4">
                                <x-label for="first_name" :value="__('Prénom')" />
                
                                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="$agent->first_name" required autofocus />
                            </div>

                            <!-- Last name -->
                            <div class="mb-4">
                                <x-label for="last_name" :value="__('Nom')" />
                
                                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="$agent->last_name" required />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-link :href="route('agents.show', $agent)">Retour</x-link>
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
</x-app-layout>
<x-guest-layout>
    
</x-guest-layout>
