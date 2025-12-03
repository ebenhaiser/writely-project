<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView(Request $request)
    {

        if ($request->has('return_url')) {
            return view('auth.login', ['return_url' => $request->return_url]);
        }

        $previousUrl = url()->previous();
        $currentUrl = url()->current();

        if (
            $previousUrl !== $currentUrl &&
            !str_contains($previousUrl, '/login') &&
            !str_contains($previousUrl, '/register') &&
            !str_contains($previousUrl, '/logout') &&
            !str_contains($previousUrl, '/password')
        ) {
            return redirect()->route('login', ['return_url' => $previousUrl]);
        }

        return view('auth.login');
    }

    public function loginSubmit(Request $request)
    {
        $data = $request->only('email', 'password');
        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            if ($request->filled('return_url')) {
                $return_url = $request->input('return_url');
                return redirect($return_url);
            }

            return redirect()->route('home');
        } else {
            return back()
                ->withInput($request->only('email', 'return_url'))
                ->withErrors(['email' => 'Invalid credentials']);
        }
    }

    public function registerView(Request $request)
    {
        // return view('auth.register');
        $return_url = $request->input('return_url', session('return_url'));

        return view('auth.register', ['return_url' => $return_url]);
    }

    public function registerSubmit(Request $request)
    {
        // Buat username dari name (spasi -> underscore dan menjadi lowercase)
        $username = strtolower(preg_replace('/[^a-zA-Z0-9._]/', '', $request->username));

        // Cek apakah username sudah ada di database
        if (User::where('username', $username)->exists()) {
            return redirect()->route('register')->with(['errorUsername' => 'Username has been taken']);
        }

        if (User::where('email', $request->email)->exists()) {
            return redirect()->route('register')->with(['errorEmail' => 'Email has been taken']);
        }

        // Simpan user baru
        $user = new User();
        $user->username = $username;
        $user->email = $request->email;
        $user->profile_picture = 'default.jpg';
        $user->password = Hash::make($request->password);
        $user->save();

        // Auto login user setelah registrasi berhasil
        Auth::login($user);

        // Redirect ke halaman home setelah login
        return redirect()->route('profile.edit', $username)->with('success', 'Your registration has been successful');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
