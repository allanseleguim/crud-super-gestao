<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');
Route::get('/login{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');



// Route::get('/rota1', function() { return 'Rota 1'; } )->name('site.rota1');
// Route::get('/rota2', function() { return redirect()->route('site.rota1') ; } )->name('site.rota2');
// Route::redirect('/rota2', 'rota1');


Route::get('/teste/{p1}/{p2}', 'TesteController@teste' )->name('teste');

Route::fallback(function() {
      echo 'A rota acessada não existe, <a href="'.route('site.index') .'">volte para a página inicial</a>';
});



Route::middleware('autenticacao:padrao')->prefix('/app')->group(function() {
      Route::get('/home', 'HomeController@index')->name('app.home');
      Route::get('/sair', 'LoginController@sair')->name('app.sair');
      Route::get('/fornecedor', 'FornecedorController@index' )->name('app.fornecedor');
      Route::post('/fornecedor/listar', 'FornecedorController@listar' )->name('app.fornecedor.listar');
      Route::get('/fornecedor/listar', 'FornecedorController@listar' )->name('app.fornecedor.listar');
      Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar' )->name('app.fornecedor.adicionar');
      Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar' )->name('app.fornecedor.adicionar');
      Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar' )->name('app.fornecedor.editar');
      Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir' )->name('app.fornecedor.excluir');




      //Produtos 

      //Cria todas as rotas associada as ações padrão de RESOURCE do controller, como index, create, delete
      Route::resource('produto', 'ProdutoController');

      //Produto detalhes  -- ja cria todas as rotas associadas RESOURCE 
      Route::resource('produto-detalhe', 'ProdutoDetalheController');

      Route::resource('cliente', 'ClienteController');
      Route::resource('pedido', 'PedidoController');
      //Route::resource('pedido-produto', 'PedidoProdutoController');

      // Pedidos 

      Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name('pedido-produto.create');
      Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name('pedido-produto.store');

      Route::delete('pedido-produto.destroy/{pedido}/{produto}', 'PedidoProdutoController@destroy')->name('pedido-produto.destroy');


      //Clientes 


      Route::get('cliente.show/{cliente}', 'ClienteController@show')->name('cliente.show');
});    



// Route::get('contato/{nome}/{categoria_id}', 
//       function(string $nome = "sem nome", 
//               int $categoria_id = 1) {
//               echo 'Nome e categoria ' . $nome . ' - ' . $categoria_id;
            
//             })->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');



