@extends('app.layouts.basico')
@section('titulo', 'Editar')
@section('conteudo')

<div class="container ">
      <main id="clientes_show">
            <div class="row">
                  <div class="col">
                        <h2> Edição de dados do fornecedor</h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              <a href="{{ route('fornecedor.create')}}" class="btn btn-outline-success my-2 my-sm-0">Cadastrar novo</a>
                              &nbsp;&nbsp;
                              <a href="{{ route('fornecedor.index')}}" class="btn btn-outline-success my-2 my-sm-0">Voltar</a>
                        </nav>
                  </div>
            </div>
      </main>


      <div class="row">
            <div class="col">
      
                  <div class="card p-4 m-4">
                        <h3> Dados do fornecedor </h3>
                        <hr>
                        <br>
                        @if(isset($fornecedores->id))
                        <form method="post" action="{{ route('fornecedor.update', ['fornecedor' => $fornecedores->id ]) }}">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                    <input type="text" name="nome" id="nome" placeholder="nome" class="form-control" 
                                    value="{{ $fornecedores->nome ?? old('nome') }}">
                                    {{ $errors->has('nome') ? $errors->first('nome') : '' }}
                              </div>

                              <div class="form-group">
                                    <input type="text" name="site" id="site" placeholder="site" class="form-control" 
                                    value="{{ $fornecedores->site ?? old('site') }}">
                                    {{ $errors->has('site') ? $errors->first('site') : '' }}
                              </div>

                              <div class="form-group">
                                    <input type="text" name="uf" id="uf" placeholder="uf" class="form-control" 
                                    value="{{ $fornecedores->uf ?? old('uf') }}">
                                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}
                              </div>

                              <div class="form-group">
                                    <input type="text" name="email" id="email" placeholder="email" class="form-control" 
                                    value="{{ $fornecedores->email ?? old('email') }}">
                                    {{ $errors->has('email') ? $errors->first('email') : '' }}
                              </div>
                              
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