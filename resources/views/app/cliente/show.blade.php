@extends('app.layouts.basico')
@section('titulo', 'Visualizar')
@section('conteudo')

<div class="container ">
      <main id="clientes_show">
            <div class="row">
                  <div class="col">
                        <h2> Detalhes do clientes</h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              <a href="{{ route('cliente.create')}}" class="btn btn-outline-success my-2 my-sm-0">Cadastrar novo</a>
                              &nbsp;&nbsp;
                              <a href="{{ route('cliente.index')}}" class="btn btn-outline-success my-2 my-sm-0">Voltar</a>
                        </nav>
                  </div>
            </div>
      </main>


      <div class="row">
            <div class="col">

                  <div class="card p-4 m-4">
                        <h3> Dados do cliente </h3>
                        <hr>
                        <p> <strong>ID: </strong> : {{ $clientes->id }} </p>
                        <p> <strong>Nome: </strong> :{{ $clientes->nome }}</p>
                  </div>
            </div>
      </div>

</div>   




</div>
@endsection