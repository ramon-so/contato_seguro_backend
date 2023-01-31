<?php

namespace App\Http\Controllers;

use App\Models\empresas;
use Illuminate\Http\Request;

class EmpresasController extends Controller
{
    public function create(Request $request)
    {
        $empresas = new Empresas;
        $empresas->nome = $request->nome;
        $empresas->cnpj = $request->cnpj;
        $empresas->endereco = $request->endereco;
        $empresas->save();
        return response()->json(['message' => 'Empresa criada com sucesso!', $empresas],  201);
    }

    public function read()
    {
        $empresas = Empresas::all();

        if (count($empresas) == 0) {
            return response()->json(['message' => 'Nenhuma empresa cadastrada'], 200);
        }

        return response()->json($empresas, 200);
    }

    public function update(Request $request, $id)
    {
        $empresas = Empresas::find($id);

        if (!$empresas) {
            return response()->json(['message' => 'Empresa não encontrada'], 404);
        }

        $empresas->nome = $request->nome;
        $empresas->cnpj = $request->cnpj;
        $empresas->endereco = $request->endereco;
        $empresas->save();

        return response()->json(['message' => 'Empresa atualizada com sucesso!'], 200);
    }

    public function delete($id)
    {
        $empresas = Empresas::find($id);

        if (!$empresas) {
            return response()->json(['message' => 'Empresa não encontrada'], 404);
        }

        $empresas->delete();

        return response()->json(['message' => 'Empresa excluida com sucesso!'], 200);
    }
}
