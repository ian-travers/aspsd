<?php

namespace App\Http\Controllers;

use App\Client;
use App\Http\Requests\ClientCreateRequest;
use Illuminate\Http\Request;

class ClientController extends Controller
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

    public function store(ClientCreateRequest $request)
    {
        Client::create($request->all());

        return redirect()->route('nsi.clients.index')->with('success', 'Заказчик сохранен успешно.');
    }

    public function edit(Client $client)
    {
        return view('nsi.client.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->only([
            'name',
        ]));

        return redirect()->route('nsi.clients.index')->with('success', 'Заказчик сохранен успешно.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('nsi.clients.index')->with('success', 'Заказчик удален успешно.');
    }
}
