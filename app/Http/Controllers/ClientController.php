<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\User;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::with('user')->paginate(20);
        return view('client.index', compact('clients'));
    }

    public function create()
    {
        $users = \App\Models\User::all(); // para seleccionar el user_id
        return view('client.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        Client::create($validated);
        return redirect()->route('clients.index')->with('success', 'Cliente creado correctamente.');
    }

    public function show(string $id)
    {
        $client = Client::with('user')->findOrFail($id);
        return view('client.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        $users = \App\Models\User::all();
        return view('client.edit', compact('client', 'users'));
    }

    public function update(Request $request, string $id)
    {
        $client = Client::findOrFail($id);

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $client->update($validated);
        return redirect()->route('clients.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente.');
    }
}
