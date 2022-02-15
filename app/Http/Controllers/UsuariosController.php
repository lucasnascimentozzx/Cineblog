<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    public function index()
    {

        return view('admin.usuarios')->with(['usuarios' => Usuario::all()]);
    }

    public function show($id)
    {
        return view('admin.usuarios-show')->with(['usuario' => Usuario::findOrFail($id)]);

    }
    public function update(Request $request, $id){

        $usuario = Usuario::findOrFail($id);

        $usuario->admin = !!$request->admin;

        $usuario->save();

        return redirect()->route('admin-usuarios.index');
    }

    public function destroy($id){
        $usuario = Usuario::findOrFail($id);
        if($usuario->admin){
            $admin_count = Usuario::admin()->count();
            if ($admin_count - 1 == 0) {
                return redirect()->back();
            }
        }
        $usuario->delete();
        return redirect()->back();
    }

    public function insert(Request $request, Usuario $usuario)
    {
        $request->validate([
            'name' => 'required',
            'email'  => 'required|email|unique:usuarios', 
            'username' => 'required',
            'password' => 'required|confirmed',
        ]);
        $usuario->fill($request->all());
        $usuario->password = $request->password;
        $usuario->save();

        return redirect()->route('login')->withInput(['username' => $usuario->username]);
    }

    // Ações de login
    public function login(Request $form)
    {

        $credenciais = $form->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
        if (!Auth::attempt($credenciais)){
            return redirect()->route('login')->withErrors(['password'=> 'Usuário ou senha inválidos.','username' => 'Usuário ou senha inválidos.']);
        }
        
        session()->regenerate();
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('home');
    }
}
