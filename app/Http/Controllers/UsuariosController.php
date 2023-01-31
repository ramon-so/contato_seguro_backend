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
        $usuarios->telefone = $request->telefone;
        $usuarios->data_de_nascimento = date('Y-m-d', strtotime($request->data_de_nascimento));
        $usuarios->cidade_onde_nasceu = $request->cidade_onde_nasceu;
        $usuarios->save();
        return response()->json(['message' => 'Usuário criado com sucesso!'], 201);
    }

    public function read()
    {
        $usuarios = Usuarios::all();

        if (count($usuarios) == 0) {
            return response()->json(['message' => 'Nenhum usuário cadastrado'], 404);
        }

        return response()->json($usuarios, 200);
    }

    public function update(Request $request, $id)
    {
        $usuarios = Usuarios::find($id);

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

    public function delete($id)
    {
        $usuarios = Usuarios::find($id);

        if (!$usuarios) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $usuarios->delete();

        return response()->json(['message' => 'Usuário excluido com sucesso!'], 200);
    }
}
