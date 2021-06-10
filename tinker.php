<?php
$fornecedores = new Fornecedor;

$user->nome = 'John';
$user->site = 'www.site.com.br';
$user->uf = 'SP';
$user->email = 'email@email.com';



$fornecedores->save();



$user->nome = 'Rachel';
$user->site = 'www.rachel.com.br';
$user->uf = 'SP';
$user->email = 'rachel@email.com';

\App\Fornecedor::create(['nome' => 'Fornecedor 1', 'site' => 'www.site.com.br', 'uf' => 'SP', 'email' => 'contato@fornecedor1.com.br']);
\App\Fornecedor::create(['nome' => 'Fornecedor 2', 'site' => 'www.forn2.com.br', 'uf' => 'SP', 'email' => 'contato@fornecedor2.com.br']);

use \App\Fornecedor;
$fornecedores = Fornecedor::all();


use \App\SiteContato;

$contatos = SiteContato::where('id', '>', '1')->get();



\App\SiteContato::create(['nome' => 'Teste 1', 'telefone' => '(15) 99999-9999','email' => 'teste@gmail.com', 'motivo_contato' => '1', 'mensagem' => 'Olá, quanto custa?']);
\App\SiteContato::create(['nome' => 'Teste 2', 'telefone' => '(15) 22222-9999','email' => 'teste2@gmail.com', 'motivo_contato' => '2', 'mensagem' => 'Olá, 22222?']);

//whereIn  

use \App\SiteContato;
$contatos = SiteContato::whereIn('motivo_contato', [1, 3])->get();
 
//whereNotIn  

use \App\SiteContato;
$contatos = SiteContato::whereNotIn('motivo_contato', [1, 3])->get();
//$contatos->get();

//whereBetween 

use \App\SiteContato;
$contatos = SiteContato::whereBetween('id', [3, 6])->get();

//whereNotBetween 

use \App\SiteContato;
$contatos = SiteContato::whereNotBetween('id', [3, 6])->get();

// vários WHERE

use \App\SiteContato;
$contatos = SiteContato::where('nome', '<>', 'Fernando')->whereIn('motivo_contato', [1,2])->whereBetween('created_at', ['2020-08-01 00:00:00', '2020-08-31 23:59:59'])->get();


// where com OR 
use \App\SiteContato;
$contatos = SiteContato::where('nome', '<>', 'Fernando')->orWhereIn('motivo_contato', [1,2])->orWhereBetween('created_at', ['2020-08-01 00:00:00', '2020-08-31 23:59:59'])->get();

// Where NULL 
use \App\SiteContato;
$contatos = SiteContato::whereNull('updated_at')->get();

// Where NOT NULL 
use \App\SiteContato;
$contatos = SiteContato::whereNotNull('updated_at')->get();

//Where date 

use \App\SiteContato;
$contatos = SiteContato::whereDate('created_at', '2020-08-31')->get();

//Where day 

use \App\SiteContato;
$contatos = SiteContato::whereDay('created_at', '15')->get();

//Where month 

use \App\SiteContato;
$contatos = SiteContato::whereMonth('created_at', '05')->get();

//Where year 

use \App\SiteContato;
$contatos = SiteContato::whereYear('created_at', '2021')->get();

//Where time 

use \App\SiteContato;
$contatos = SiteContato::whereTime('created_at', '>', '20:00:00')->get();

//comparando 2 campos iguais 
// Não compara nulos 

use \App\SiteContato;
$contatos = SiteContato::whereColumn('created_at', 'updated_at')->get();


//precedencia de operacoes 

use \App\SiteContato;
$contatos = SiteContato::where(function($query) {  $query->where('nome', 'Jorge')->OrWhere('nome', 'Ana');   })->where(function($query){$query->whereIn('motivo_contato', [1,2])->orWhereBetween('id', [4,6]); })->get();


//Ordenação
use \App\SiteContato;
$contatos = SiteContato::orderBy('nome', 'ASC')->get();

//collections first 
use \App\SiteContato;
$contatos = SiteContato::where('id', '>', 3)->get();
$contatos->first();


//collections  last 
use \App\SiteContato;
$contatos = SiteContato::where('id', '>', 3)->get();
$contatos->last();

//collections  reverse 
use \App\SiteContato;
$contatos = SiteContato::where('id', '>', 3)->get();
$contatos->reverse();


//collections  to array  
use \App\SiteContato;
$contatos = SiteContato::all()->toArray();
$contatos = SiteContato::all()->toJson();

//Recupera todas as colunas

use \App\SiteContato;
$contatos = SiteContato::all()->pluck('email');

// Persistir alterações e alterar 

use \App\Fornecedor;
$fornecedor = Fornecedor::find(1);

$fornecedor->nome = 'Fornecedor 123';
$fornecedor->site = 'www.fornecedor123.com.br';
$fornecedor->email = 'fornecedor 123@gmail.com';

$fornecedor->save();

// fill - atualizar 

use \App\Fornecedor;
$fornecedores2 = Fornecedor::find(2);

$fornecedores2->fill(['nome' => 'Fornecedor 789', 'site' => 'www.fornecedor789.com.br' , 'email' =>  'fornecedor 123@gmail.com' ]);
$fornecedores2->save();

Fornecedor::whereIn('id', [1,2])->update(['nome' => 'Fornecedor Teste', 'site' => 'www.teste.com.br']);


// deletando com ORM 

use \App\SiteContato;
$contato = SiteContato::find(4);
$contato->delete();


SiteContato::find(7)->delete();


// TRAIT: herança horizontal, multiplo extends
// dê USE dentro da function 



use \App\Fornecedor;
$fornecedor = Fornecedor::find(2);
$fornecedor->delete();

use \App\Fornecedor;
$fornecedor = Fornecedor::find(1);
$fornecedor->forceDelete();

$fornecedor->withTrashed()->get();

Fornecedor::create(['nome' => 'Fornecedor 1', 'site' => 'fornecedor1.com.br', 'uf' => 'SP', 'email' => 'contato@fornecedor1.com.br']);


Fornecedor::onlyTrashed();
Fornecedor::onlyTrashed()->get();


$fornecedor = Fornecedor::find(2);
$fornecedores = Fornecedor::withTrashed()->get();
$fornecedores[0]->restore();


// Create three App\User instances...


//Criando dados massivamente com factory e faker 

use \App\Cliente;
factory(App\Cliente::class, 100)->create();
