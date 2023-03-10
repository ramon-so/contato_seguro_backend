<?php

namespace App\Http\Controllers;

use App\Models\usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{

    public function create(Request $request)
    {
        $usuarios = new Usuarios;
        $usuarios->nome = $request->nome;
        $usuarios->email = $request->email;
        $usuarios->telefone = $request->telefone ? $request->telefone : null;
        $usuarios->data_de_nascimento = $request->data_de_nascimento ? date('Y-m-d', strtotime($request->data_de_nascimento)): null;
        $usuarios->cidade_onde_nasceu = $request->cidade_onde_nasceu ? $request->cidade_onde_nasceu : null;
        $usuarios->save();
        return response()->json(['message' => 'Usuário criado com sucesso!', $usuarios], 201);
    }

    public function read()
    {
        $usuarios = Usuarios::all();

        if (count($usuarios) == 0) {
            return response()->json(['message' => 'Nenhum usuário cadastrado'], 200);
        }

        return response()->json($usuarios, 200);
    }

    public function update(Request $request)
    {
        $usuarios = Usuarios::find($request->id);

        if (!$usuarios) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $usuarios->nome = $request->nome;
        $usuarios->email = $request->email;
        $usuarios->telefone = $request->telefone;
        $usuarios->data_de_nascimento = date('Y-m-d', strtotime($request->data_de_nascimento));
        $usuarios->cidade_onde_nasceu = $request->cidade_onde_nasceu;
        $usuarios->save();

        return response()->json(['message' => 'Usuário atualizado com sucesso!'], 200);
    }

    public function delete(Request $request)
    {
        $usuarios = Usuarios::find($request->id);

        if (!$usuarios) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $usuarios->delete();

        return response()->json(['message' => 'Usuário excluido com sucesso!'], 200);
    }
}
