<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Registrar un nuevo usuario.
     */
    public function register(Request $request)
    {
        // Validación de los datos del usuario con mensajes personalizados
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser válido.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Responder con un mensaje bonito y el usuario creado
        return response()->json([
            'message' => 'Usuario registrado exitosamente.',
            'user' => $user,
        ], 201);
    }

    /**
     * Iniciar sesión de un usuario.
     */
    public function login(Request $request)
    {
        // Validación de los datos para login
        $validated = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ], [
            'email.required' => 'El correo electrónico es obligatorio.',
            'password.required' => 'La contraseña es obligatoria.',
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($validated)) {
            $user = Auth::user();
            return response()->json([
                'message' => 'Inicio de sesión exitoso.',
                'user' => $user
            ]);
        }

        // Si la autenticación falla
        return response()->json([
            'message' => 'Credenciales incorrectas.',
        ], 401);
    }

    /**
     * Mostrar todos los usuarios.
     */
    public function index()
    {
        $users = User::all();
        return response()->json([
            'message' => 'Lista de usuarios obtenida exitosamente.',
            'users' => $users
        ]);
    }

    /**
     * Mostrar un usuario específico.
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'message' => 'Usuario encontrado.',
            'user' => $user
        ]);
    }

    /**
     * Actualizar los datos de un usuario.
     */
    public function update(Request $request, $id)
    {
        // Buscar usuario
        $user = User::findOrFail($id);

        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        // Si el usuario quiere actualizar la contraseña
        if ($request->has('password')) {
            $validated['password'] = Hash::make($validated['password']);
        }

        // Actualización del usuario
        $user->update($validated);

        return response()->json([
            'message' => 'Usuario actualizado exitosamente.',
            'user' => $user
        ]);
    }

    /**
     * Eliminar un usuario.
     */
    public function destroy($id)
    {
        // Buscar usuario y eliminarlo
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'message' => 'Usuario eliminado exitosamente.'
        ]);
    }
}
