<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller

{

      public function index() {
         $data = Saida::all();

            return response()->json($data);
     }

   public function store(Request $request) {
        $saida = Saida::create([
            'id_produto' => $request->id_produto,
            'id_cliente' => $request->id_cliente,
            'quantidade' => $request->quantidade,
        ]);

        return response()->json($saida);
    }

      

     public function delete($id){
         $saida = Saida::find($id);

        if ($saida == null) {
            return response()->json(['erro' => 'Tarefa não encontrada']);
        }

        $saida->delete();

        return response()->json(['mensagem' => 'Tarefa deletada com sucesso']);
    
     }
};