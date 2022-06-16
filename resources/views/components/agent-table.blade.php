<div class="mb-4">{{ $agents->count() }} agent{{ ($agents->count() > 1) ? 's' : '' }}</div>
<table class="table-auto w-full border-collapse border border-slate-400">
    <thead class="bg-gray-800 text-white px-4 uppercase text-sm">
        <tr>
            <th class="text-left px-4 border border-slate-300">Nom complet</th>
            <th class="px-4 border border-slate-300">Registres</th>
            <th class="px-4 border border-slate-300">Action</th>
        </tr>
     </thead>
    <tbody>
        @isset($agents)
            @foreach ($agents as $agent)
                <tr class="h-10">
                    <td class="px-4 font-semibold border border-slate-300">{{ $agent->first_name . ' ' . $agent->last_name }}</td>
                    <td class="text-center px-4 border border-slate-300">{{ $agent->registers_count }}</td>
                    <td class="text-center px-4 border border-slate-300">
                        <x-link :href="route('agents.show', $agent)">Afficher</x-link>
                    </td>
                </tr>
            @endforeach
        @endisset
    </tbody>
</table>