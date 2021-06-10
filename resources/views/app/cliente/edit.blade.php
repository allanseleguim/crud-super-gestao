@extends('app.layouts.basico')
@section('titulo', 'Editar')
@section('conteudo')

<div class="container ">
      <main id="clientes_show">
            <div class="row">
                  <div class="col">
                        <h2> Edição de dados do cliente</h2>

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
                        <br>
                        @if(isset($clientes->id))
                        <form method="post" action="{{ route('cliente.update', ['cliente' => $clientes->id ]) }}">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                    <input type="text" name="nome" id="nome" placeholder="nome" class="form-control" 
                                    value="{{ $clientes->nome ?? old('nome') }}">
                                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                              
                                    <br>
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                              </form>
                        @endif
                  </div>
            </div>
      </div>

</div>   




</div>



@endsection