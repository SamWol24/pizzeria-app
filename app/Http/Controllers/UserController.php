<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    /**
     * Registrar un nuevo usuario.
     */
    public function register(Request $request)
    {
        // Validación de los datos del usuario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Responder con el usuario creado
        return response()->json($user, 201);
    }

    /**
     * Iniciar sesión.
     */
    public function login(Request $request)
    {
        // Validación de los datos para login
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($validated)) {
            $user = Auth::user();
            return response()->json($user);
        }

        // Si la autenticación falla
        return response()->json(['message' => 'Unauthorized'], 401);
    }
    public function index()
    {
        // Mostrar todos los usuarios
        $users = User::all();
        return response()->json($users);
    }

    public function show($id)
    {
        // Mostrar un usuario específico
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        // Actualizar datos del usuario
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        if ($request->has('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);
        return response()->json($user);
    }

    public function destroy($id)
    {
        // Busca y Eliminar un usuario
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'User deleted successfully']);
    }
}
