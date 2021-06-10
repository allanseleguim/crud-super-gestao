<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

            // echo '<pre>';
            // print_r($request->all());
            // echo '</pre>';
            // echo $request->input('nome');
            // echo $request->input('email');

            // $contato = new SiteContato();
            // $contato->nome = $request->input('nome');
            // $contato->telefone = $request->input('telefone');
            // $contato->email = $request->input('email');
            // $contato->motivo_contato = $request->input('motivo_contato');
            // $contato->mensagem = $request->input('mensagem');

            //print_r($contato->getAttributes());

            //$contato = new SiteContato();
            //$contato->fill($request->all());
            //$contato->create($request->all());
            //print_r($contato->getAttributes());

            //$contato->save();,

            $motivo_contatos = MotivoContato::all();

            return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos ]);
    }

    public function salvar(Request $request){
           
            //dd($request);

           //Validando REQUEST 
           
            //SiteContato::create($request->all());

         

            $request->validate([
                  'nome' => 'required|min:3|max:40|unique:site_contatos',
                  'telefone' => 'required',
                  'email' => 'email',
                  'motivo_contatos_id' => 'required',
                  'mensagem' => 'required|max:2000',
            ],
            
            [
                
                  'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres.',
                  'nome.max' => 'O campo nome deve ter no máximo 40 caracteres.',
                  'nome.unique' => 'O nome informado já está em uso.',

                  'email.email' => 'O email informado não é válido.',
                  'required' => 'O campo :attribute deve ser preeenchido',
                  'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres'
            ]
                  
            
            );

            //Insere tudo no banco, usando model SiteContato
            SiteContato::create($request->all());
            return redirect()->route('site.index');

    }
}
