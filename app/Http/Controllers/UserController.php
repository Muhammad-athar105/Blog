<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;



class UserController extends Controller
{
    
    public function registerUser(Request $request) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6',
        ]);
    
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $user->assignRole('User');   

        return response()->json(['message' => 'User registered successfully', 'user' => $user], 201);
    }
    
    public function loginUser(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('authToken')->plainTextToken;
    
            return response()->json([
                'message' => 'Login successfully',
                'user_id' => $user->id,
                'access_token' => $token,
            ]);
        }
    
        return response()->json(['message' => 'Failed to login'], 401);
    }


    // Logout
    public function logoutUser(Request $request) {
        if ($request->user()) { 
            $request->user()->tokens()->delete();
        }
        return response()->json(['message' => 'Logout successfully'], 200);
    }


    // Update the user    
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $validatedData = $request->validate([
            'name' => 'string',
            'email' => 'email|unique:users',
            'password' => 'string|min:6',
        ]);
        $user->fill($validatedData);
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->save();
        return response()->json(['message' => 'User updated successfully', 'user' => $user], 200);
    }
    

    // Get User by id
    public function getUserById($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['user' => $user], 200);
    }


    // Delete user by ID
    public function deleteUser($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->delete();
        return response()->json(['message' => 'User deleted successfully'], 200);
    }

    // Get all users
    public function getAllUsers()
    {
        $users = User::all();
        return response()->json(['users' => $users], 200);
    }
}
