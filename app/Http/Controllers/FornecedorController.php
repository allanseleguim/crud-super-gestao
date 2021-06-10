<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{


      public function index() {
            return view('app.fornecedor.index');
      }
//     public function index(){
//           $n1 = "Allan";
//           $fornecedores = [
//                   0 => [
//                         'nome' => 'Fornecedor 1', 
//                         'status' => 'N', 
//                         'cnpj' => '0',
//                         'ddd' => '32',
//                         'telefone' => '99999-9999'
//                   ],

//                   1 => [
//                         'nome' => 'Fornecedor 2', 
//                         'status' => 'S', 
//                         'cnpj' => '2342423423',
//                         'ddd' => '85',
//                         'telefone' => '5342523-9999'
//                   ],

//                   2 => [
//                         'nome' => 'Fornecedor 3', 
//                         'status' => 'S', 
//                         'cnpj' => '34242342',
//                         'ddd' => '11',
//                         'telefone' => '54455-94324999'
//                   ],

                
//             ];

//             // $fornecedores = [];


//             // $mensagem = isset($fornecedores[1]['cnpj']) ? 'CNPJ informado' : 'CNPJ não informado';

//           return view ('app.fornecedor.index', compact('fornecedores'));
//     }

      public function listar(Request $request) {


            $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(8);

            //dd($fornecedores);

            return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);

           

      }

      public function editar($id, $msg = '') {
            //echo $id;

            $fornecedor = Fornecedor::find($id);
            //dd($fornecedor);
            return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
      }

      public function adicionar(Request $request) {

            $msg = '';

            
            // Inclusão 
            if ($request->input('_token') != '' && $request->input('id') == '') {
                 //VALIDAÇÃO 
                 $regras = [
                       'nome' => 'required|min:3|max:60',
                       'site' => 'required',
                       'uf' => 'required|min:2|max:2',
                       'email' => 'email'
                 ];

                 $feedback = [
                       'required' => 'O camp :attribute deve ser preenchido',
                       'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                       'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                       'uf.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                       'uf.max' => 'O campo nome deve ter no máximo 3 caracteres',
                       'email.email' => 'O campo e-mail não foi preenchido corretamente'
                 ];

                 $request->validate($regras, $feedback);
                 echo 'Validou';
                 $fornecedor = new Fornecedor();
                 $fornecedor->create($request->all());
                 $msg = 'Cadastro realizado com sucesso';     
            }


            // Edição 
            if ($request->input('_token') != '' && $request->input('id') != '') {
                  $fornecedor = Fornecedor::find($request->input('id'));
                  $update = $fornecedor->update($request->all());

                  if ($update) {
                        $msg = "Atualização realizada com sucesso";
                  }
                  else {
                        $msg = "Ocorreu um problema na tentativa de atualização";
                  }

                  return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
            }


           

            return view('app.fornecedor.adicionar', ['msg' => $msg]);
      }


      public function excluir($id) {


            //echo "Entrou excluir";
            Fornecedor::find($id)->delete();

            return redirect()->route('app.fornecedor');
      }
}    
