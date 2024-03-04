<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreClientRequest;
use App\Http\Requests\Client\UpdateClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::query()->where('user_id', auth()->user()->id)->orderBy('id', 'DESC')->paginate(10);
        return view('public.client.index', compact('clients'));
    }

    public function create()
    {
        return view('public.client.create');
    }

    public function store(StoreClientRequest $request)
    {
        $data = $request->validated();
        Client::create($data);

        return redirect()->route('client.index');
    }

    public function edit(Client $client)
    {

        return view('public.client.edit', compact('client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $data = $request->validated();
        $client->update($data);

        return redirect()->route('client.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index');
    }
}
