@extends('app.layouts.basico')
@section('titulo', 'Editar')
@section('conteudo')


<div class="container ">
      <main id="pedidos_edit">
            <div class="row">
                  <div class="col">
                        <h2> Edição de dados do produto</h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              
                              <a href="{{ route('produto.index')}}" class="btn btn-outline-success my-2 my-sm-0">Voltar</a>
                        </nav>
                  </div>
            </div>
      </main>

      <div class="row">
            <div class="col">
                  @component('app.produto._components.form_create_edit', 
                  ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
                  @endcomponent
            </div>
      </div>



</div>
@endsection