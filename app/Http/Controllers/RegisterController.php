<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log; // Import Log Facade

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('galery.register');
    }

    public function register(Request $request)
    {
        // Validasi input
        $validator = validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
        ]);

        // Log jika validasi gagal
        if ($validator->fails()) {
            Log::error('Register validation failed', [
                'errors' => $validator->errors(),
                'input' => $request->all(),
            ]);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Proses pembuatan user
        try {
            $user = User::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'telepon' => $request->input('telepon'),
                'alamat' => $request->input('alamat'),
            ]);

            Log::info('New user registered successfully', [
                'id' => $user->id,
                'email' => $user->email,
            ]);

            return redirect()->route('login');
        } catch (\Exception $e) {
            Log::error('Error registering user', [
                'error_message' => $e->getMessage(),
                'input' => $request->all(),
            ]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.');
        }
    }
}
