@extends('app.layouts.basico')
@section('titulo', 'Editar')
@section('conteudo')

<div class="container ">
      <main id="pedidos_edit">
            <div class="row">
                  <div class="col">
                        <h2> Edição de dados do pedido</h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              <a href="{{ route('pedido.create')}}" class="btn btn-outline-success my-2 my-sm-0">Cadastrar novo</a>
                              &nbsp;&nbsp;
                              <a href="{{ route('pedido.index')}}" class="btn btn-outline-success my-2 my-sm-0">Voltar</a>
                        </nav>
                  </div>
            </div>
      </main>


      <div class="row">
            <div class="col">
      
                  <div class="card p-4 m-4">
                        <h3> Dados do pedido </h3>
                        <hr>
                        <br>   
                       
                        <form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id ]) }}">
                              @csrf
                              @method('PUT')
                              <div class="form-group">
                                    <label>Cliente </label>
                                    <select name="cliente_id" class="form-control">
                                          <option> Selecione um Cliente </option>
                        
                                          @foreach ($clientes as $cliente)
                                          <option value="{{ $cliente->id }}" 
                                                {{ $pedido->cliente_id ?? old('cliente_id') == $cliente->id ? 'selected' : ''}}>
                                                {{ $cliente->nome }} 
                                          </option>
                                          @endforeach
                                    </select>
                             
                                    {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
                              </div>

                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                              </form>
                    
                  </div>
            </div>
      </div>

</div>   




</div>



@endsection