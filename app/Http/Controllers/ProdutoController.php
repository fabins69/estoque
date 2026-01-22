<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
     public function index() {
         $produto = Produto::all();

            return response()->json($produto);
     }

     public function store(Request $request) {
        $produto = Produto::create([
            'marca' => $request->marca,
            'descricao' => $request->descricao,
            'valor_unitario' => $request->valor_unitario,
            'quantidade_estoque'=> $request->quantidade_estoque,
            'faixa_etaria_minima' => $request->faixa_etaria_minima

        ]);
     }

     public function update(Request $request) {
         //buscar a tarefa pelo id
            $produto = Produto::find($request->id);

            //verificar se encontrou a tarefa
            if ($produto == null) {
                return response()->json(['erro' => 'Tarefa não encontrada']);
            }
            
            //verificar se o campo existe na request
            if(isset($request->marca)){
                $produto->marca = $request->marca;
            }
            if(isset($request->descricao)){
                $produto->descricao = $request->descricao;
            }
            if(isset($request->valor_unitario)){
                $produto->valor_unitario = $request->valor_unitario;
            }
             if(isset($request->quantidade_estoque)){
                $produto->quantidade_estoque = $request->quantidade_estoque;
            }
             if(isset($request->faixa_etaria_minima)){
                $produto->faixa_etaria_minima = $request->faixa_etaria_minima;
            }


            //atualizar os dados da tarefa
            $produto->update();
            
            //retornar a tarefa atualizada
            return response()->json(['mensagem' => 'atualizada']);
     }

    

     public function delete($id){
        //pesquisar a tarefa pelo id
        $produto = Produto::find($id);
        //verificar se encontrou a tarefa
        if ($produto == null) {
            return response()->json(['erro' => 'Tarefa não encontrada']);
        }
        //deletar a tarefa
        $produto->delete();
        //retornar a mensagem de sucesso
        return response()->json(['mensagem' => 'Tarefa deletada com sucesso']);
    
     }
}
