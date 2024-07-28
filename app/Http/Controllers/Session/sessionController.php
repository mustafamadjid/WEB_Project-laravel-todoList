<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SessionController extends Controller
{
    public function loginRegisterForm()
    {
        return view("todo.loginRegister");
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email Wajib Diisi',
            'password.required' => 'Password Wajib Diisi'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infoLogin)) {
            $userId = Auth::id(); // Mendapatkan ID pengguna yang login
            session()->put('userId', $userId); // Menyimpan ID pengguna dalam sesi permanen
            return redirect()->route('todo.user');
        } else {
            return redirect()->route("todo.loginRegister")->withErrors("Username atau password yang dimasukkan tidak valid");
        }
    }

    public function logout()
    {
        session()->forget('userId'); // Menghapus userId dari sesi
        Auth::logout();
        return redirect()->route("todo.viewHome");
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Nama Harus Diisi',
            'email.required' => 'Email Wajib Diisi',
            'email.email' => 'Email Tidak Valid',
            'email.unique' => 'Email Sudah Terdaftar',
            'password.required' => 'Password Wajib Diisi',
            'password.min' => 'Minimum Karakter Password adalah 6 Karakter',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];

        $user = User::create($data);

        Auth::login($user); // Otomatis login setelah registrasi

        $userId = Auth::id(); // Mendapatkan ID pengguna yang login
        session()->put('userId', $userId); // Menyimpan ID pengguna dalam sesi permanen

        return redirect()->route('todo.user');
    }

    public function update(Request $request){
        $userId = Auth::id();

        $request->validate([
            'name' => 'string',
            'email' => 'email'
        ]);

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ];

        
        User::where('id',$userId)->update($data);
        return redirect()->route('todo.user');
        
    }
}

?>
