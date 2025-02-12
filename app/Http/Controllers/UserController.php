<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create() {
        return view('profile.profile');
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Obtém o usuário autenticado

        // Validando os campos
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'cpf' => 'nullable|string|max:14',
            'data_nascimento' => 'nullable|date',
            'endereco' => 'nullable|string|max:255',
            'telefone' => 'nullable|string|max:15',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        // Atualiza os dados do usuário
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'cpf' => $request->input('cpf'),
            'data_nascimento' => $request->input('data_nascimento'),
            'endereco' => $request->input('endereco'),
            'telefone' => $request->input('telefone'),
        ]);


        // Redireciona com mensagem de sucesso
        return redirect()->route('profile')->with('success', 'Perfil atualizado com sucesso!');
    }
}
