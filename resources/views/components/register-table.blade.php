<div class="mb-4">{{ $registers->count() }} registre{{ ($registers->count() > 1) ? 's' : '' }}</div>
<table class="table-auto w-full border-collapse border border-slate-400">
    <thead class="bg-gray-800 text-white px-4 uppercase text-sm">
        <tr>
            <th class="text-left px-4 border border-slate-300">Titre</th>
            <th class="px-4 border border-slate-300">Agents</th>
            <th class="px-4 border border-slate-300">Action</th>
        </tr>
     </thead>
    <tbody>
        @foreach ($registers as $register)
            <tr class="h-10">
                <td class="px-4 font-semibold border border-slate-300">{{ $register->title }}</td>
                <td class="text-center px-4 border border-slate-300">{{ $register->agents_count }}</td>
                <td class="text-center px-4 border border-slate-300">
                    <a href="{{ route('registers.show', $register) }}" class="underline text-sm">Afficher</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>