@foreach($clients as $client)

    <option value="{{ $client->id}}"

        @isset($project->id)
            @if ($project->client->id == $client->id)
                selected="selected"
            @endif
        @endisset

    >
        {{ $client->name }}
    </option>
@endforeach

