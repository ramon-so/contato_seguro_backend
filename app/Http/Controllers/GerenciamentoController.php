<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GerenciamentoController extends Controller
{
    public function alocarUsuario(Request $request){
        DB::table('usuarios_empresas')->insert([
            ['empresa_id' => $request->empresa_id, 'usuarios_id' => $request->usuario_id],
        ]);
        return response()->json(['message' => 'Relacionamento criado com sucesso!'],  201);
    }
}
