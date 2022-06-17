<div class="mb-4"><span id="present-agent-counter">{{ $presents->count() }}</span>/{{ $agents->count() }} agent{{ ($agents->count() > 1) ? 's' : '' }}</div>
<table class="table-auto w-full border-collapse border border-slate-400">
    <thead class="bg-gray-800 text-white px-4 uppercase text-sm">
        <tr>
            <th class="text-left px-4 border border-slate-300">Nom complet</th>
            <th class="px-4 border border-slate-300">Action</th>
        </tr>
     </thead>
    <tbody>
        @isset($agents)
            @foreach ($agents as $agent)
                <tr class="h-10">
                    <td class="px-4 font-semibold border border-slate-300">{{ $agent->full_name }}</td>
                    <td class="text-center px-4 border border-slate-300">
                        
                        @if ($presents->contains($agent))
                            <x-link :href="route('registers.remove', [$register, $agent])" color="text-red-500"
                                onclick="
                                    remove_agent()"
                            >
                                Retirer
                            </x-link>
                        @else
                            <x-link :href="route('registers.add', [$register, $agent])" color="text-green-500"
                                onclick="
                                    add_agent()"
                            >
                                Ajouter
                            </x-link> 
                        @endif
                    </td>
                </tr>
            @endforeach
        @endisset
    </tbody>
</table>
<script>
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    const counter = document.getElementById('present-agent-counter')
    const refresh_route = '{{ route('registers.agents', $register) }}'
    function add_agent()
    {
        event.preventDefault()
        e = event.srcElement
        
        axios.post(e.getAttribute('href'), {
            _token : token
        })
        .then(function (response) {
            e.setAttribute('onclick', 'remove_agent()')
            e.textContent = 'Retirer'
            e.classList.remove('text-green-500')
            e.classList.add('text-red-500')

            count_agents()
        })
        .catch(function (error) {
            reloader(error)
        })
    }
    function remove_agent()
    {
        event.preventDefault()
        e = event.srcElement

        axios.post(e.getAttribute('href'), {
            _token : token,
            _method : 'DELETE'
        })
        .then(function (response) {
            e.setAttribute('onclick', 'add_agent()')
            e.textContent = 'Ajouter'
            e.classList.remove('text-red-500')
            e.classList.add('text-green-500')

            count_agents()
        })
        .catch(function (error) {
            reloader(error)
        })
    }
    function count_agents(){
        axios.get(refresh_route, {})
        .then(function(response) {
            if(counter)
            {
                counter.textContent = response.data.count
            }
        })
        .catch(function (error) {
            reloader(error)
        })
    }
    function reloader(message) {
        console.log(message)
        location.reload()
    }
</script>