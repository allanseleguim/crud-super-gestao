<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request) {

            $erro = '';
            if ($request->get('erro') == 1) {
                  $erro = 'Usuário não existe';
            }
            if ($request->get('erro') == 2) {
                  $erro = 'Necessário realizar o login para ter acesso a página';
            }
            return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }


    public function autenticar(Request $request){
            //return 'Chetamos até aqui';

            $regras = [
                  'usuario' => 'email',
                  'senha' => 'required'
            ];

            //Mensagens de erro 

            $feedback = [
                  'usuario.email' => 'O campo usuário é obrigatório',
                  'senha.required' => 'O campo senha é obrigatório'
            ];

            //Se nao passar volta para rota antiga
            $request->validate($regras, $feedback);


            //Recuperando os dados do formulário 

            $email = $request->get('usuario');
            $senha = $request->get('senha');

            // echo $email . "<br>";
            // echo $senha . "<br>";

            //Iniciar model user 

            $user = new User();
            $usuario = $user->where('email', $email)->where('password', $senha)->get()->first();
            
            /* Caso LOGIN exista no banco */ 

            if (isset($usuario->name)) {
                  // echo "Usuário existe";
                  // echo "<pre>";
                  // print_r($usuario);
                  //print_r($request->all());
                  // dd($usuario);
                  session_start();
                  $_SESSION['nome'] = $usuario->name;
                  $_SESSION['email'] = $usuario->email;
                  // dd($_SESSION);
                  return redirect()->route('app.home');
            }
            else {
                  //echo "Usuário não existe";
                  return redirect()->route('site.login', ['erro' => 1]);
            }

    }


    public function sair() {
          session_destroy();
          return redirect()->route('site.index');
    }
}
