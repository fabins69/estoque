<?php


namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Produto;
use Illuminate\Http\Request;


class EntradaController extends Controller
{

      public function index() {
         $data = Entrada::all();

            return response()->json($data);
     }

   public function store(Request $request) {
        $entrada = Entrada::create([
            'id_produto' => $request->id_produto,
            'quantidade' => $request->quantidade,
        ]);

        return response()->json($entrada);
    }

      

     public function delete($id){
         $entrada = Entrada::find($id);

        if ($entrada == null) {
            return response()->json(['erro' => 'Tarefa não encontrada']);
        }

        $entrada->delete();

        return response()->json(['mensagem' => 'Tarefa deletada com sucesso']);
    
     }
};