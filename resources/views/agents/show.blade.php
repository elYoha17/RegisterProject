<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Un agent') }}
                </h2>
                <div class="text-lg text-gray-600 font-semibold">{{ $agent->full_name }}</div>    
            </div>
            <div class="flex gap-4">
                <x-link :href="route('agents.edit', $agent)">Modifier</x-link>
                
                <x-link color="text-red-500"
                    onclick="
                            event.preventDefault();
                            document.getElementById('destroy-agent-form').submit();"
                >
                    Supprimer
                    <form action="{{ route('agents.destroy', $agent) }}" id="destroy-agent-form" method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </x-link>
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
