<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
      public function index() {
         $cliente = Cliente::all();

            return response()->json($cliente);
     }

     public function store(Request $request) {
        $cliente = Cliente::create([
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'idade' => $request->idade,
        ]);
        if (Cliente::where('cpf', $request->cpf)->exists()) {
            return response()->json(['erro' => 'CPF já cadastrado'], 400);
        }
        return response()->json($cliente);
     }

     public function update(Request $request) {
         //buscar a tarefa pelo id
            $cliente = Cliente::find($request->id);

            //verificar se encontrou a tarefa
            if ($cliente == null) {
                return response()->json(['erro' => 'Tarefa não encontrada']);
            }
            
            //verificar se o campo existe na request
            if(isset($request->nome)){
                $cliente->nome = $request->nome;
            }
            if(isset($request->cpf)){
                $cliente->cpf = $request->cpf;
            }
            if(isset($request->idade)){
                $cliente->idade = $request->idade;
            //atualizar os dados da tarefa
            $cliente->update();
            
            //retornar a tarefa atualizada
            return response()->json(['mensagem' => 'atualizada']);
     }
    }

             public function delete($id){
        //pesquisar a tarefa pelo id
        $cliente = Cliente::find($id);
        //verificar se encontrou a tarefa
        if ($cliente == null) {
            return response()->json(['erro' => 'Tarefa não encontrada']);
        }
        //deletar a tarefa
        $cliente->delete();
        //retornar a mensagem de sucesso
        return response()->json(['mensagem' => 'Tarefa deletada com sucesso']);
    
     }
}
