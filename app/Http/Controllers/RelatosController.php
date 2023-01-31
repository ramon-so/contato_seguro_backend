<?php

namespace App\Http\Controllers;

use App\Models\relatos;
use Illuminate\Http\Request;

class RelatosController extends Controller
{
    public function create(Request $request)
    {

        $data = $request->validate([
            'usuarios_id' => 'required|exists:usuarios,id'
        ]);

        $relatos = new Relatos;
        $relatos->usuarios_id = $data['usuarios_id'];
        $relatos->relato = $request->relato;
        $relatos->save();
        return response()->json(['message' => 'Relato criado com sucesso!', $relatos], 201);
    }

    public function read()
    {
        $relatos = Relatos::all();

        if (count($relatos) == 0) {
            return response()->json(['message' => 'Nenhuma relato cadastrado'], 200);
        }

        return response()->json($relatos, 200);
    }

    public function update(Request $request, $id)
    {
        $relatos = Relatos::find($id);

        if (!$relatos) {
            return response()->json(['message' => 'Relato não encontrado'], 404);
        }

        $relatos->relato = $request->relato;
        $relatos->save();

        return response()->json(['message' => 'Relato atualizado com sucesso!'], 200);
    }

    public function delete($id)
    {
        $relatos = Relatos::find($id);

        if (!$relatos) {
            return response()->json(['message' => 'Relato não encontrado'], 404);
        }

        $relatos->delete();

        return response()->json(['message' => 'Relato excluido com sucesso!'], 200);
    }
}
