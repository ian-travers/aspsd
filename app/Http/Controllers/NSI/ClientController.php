<?php

namespace App\Http\Controllers\NSI;

use App\Client;
use App\Http\Requests\Client\ClientStoreRequest;
use App\Http\Requests\Client\ClientUpdateRequest;
use App\Http\Controllers\Controller;

class ClientController extends NSIController
{
    public function index()
    {
        $clients = Client::orderBy('name')->paginate(10);

        return view('nsi.client.index', compact('clients'));
    }

    public function create()
    {
        $client = new Client();

        return view('nsi.client.create', compact('client'));
    }

    public function store(ClientStoreRequest $request)
    {
        Client::create($request->all());

        return redirect()->route('nsi.clients.index')->with([
            'message' => 'Заказчик сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function edit(Client $client)
    {
        return view('nsi.client.edit', compact('client'));
    }

    public function update(ClientUpdateRequest $request, Client $client)
    {
        $client->update($request->only([
            'name',
        ]));

        return redirect()->route('nsi.clients.index')->with([
            'message' => 'Заказчик сохранен успешно',
            'alert-type' => 'success',
        ]);
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('nsi.clients.index')->with([
            'message' => 'Заказчик удален успешно',
            'alert-type' => 'success',
        ]);
    }
}
