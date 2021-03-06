<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nouvel agent') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-xl">

                        @if (Session::has('success') || $errors->any())
                        <div class="px-4 py-2 bg-gray-100 mb-4 text-base font-semibold rounded-lg">
                              <p class="text-green-500">{{ Session::get('success') }}</p>
                              @if ($errors->any())
                                  <p class="text-red-500">{{ old('first_name') }} {{ old('last_name') }} existe déjà</p>
                              @endif
                        </div>
                        @endif

                
                        <form method="POST" action="{{ route('agents.store') }}">
                            @csrf
                
                            <!-- First name -->
                            <div class="mb-4">
                                <x-label for="first_name" :value="__('Prénom')" />
                
                                <x-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                            </div>

                            <!-- Last name -->
                            <div class="mb-4">
                                <x-label for="last_name" :value="__('Nom')" />
                
                                <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-link :href="route('agents.index')">Retour</x-link>
                                <x-button class="ml-4">
                                    {{ __('Créer') }}
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
