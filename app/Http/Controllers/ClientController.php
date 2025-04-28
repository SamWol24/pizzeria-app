<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;  //Importar el modelo Client

class ClientController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     // Añadí el middleware para asegurarse de que el usuario esté autenticado
     public function __construct()
     {
         $this->middleware('auth');
     }     
    public function index()
    {
        // Recuperar todos los clientes, con paginación
        $clients = Client::paginate(20); 

        // se envia los datos a la vista index.blade.php
        return view('client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Crear un nuevo cliente
         $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $client = Client::create($validated);
        return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         // Mostrar un cliente específico
         $client = Client::with('user')->findOrFail($id);
         return response()->json($client);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
