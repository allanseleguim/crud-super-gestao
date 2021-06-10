@extends('app.layouts.basico')
@section('titulo', 'Pedido Produto')
@section('conteudo')  



<div class="container">
      <main id="pedidos_index">
            <div class="row">
                  <div class="col">
                        <h2> Lançar produto no pedido </h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              <a href="{{ route('pedido.index')}}" class="btn btn-outline-success my-2 my-sm-0">Voltar</a>
                              &nbsp;&nbsp;
                        </nav>
                  </div>
            </div>

         

            <div class="row">
                  <div class="col">
                        <h4> Detalhes do pedido </h4>
                        <p> ID do pedido: {{ $pedido->id }}</p>
                        <p> Cliente: {{ $pedido->cliente_id }}</p>
                  </div>
            </div>
          
                  
                  
                  <table border="1" width="80%" align="center" class="table table-hover">
                        <thead>
                              <tr>
                                    <td>ID</td>
                                    <td>Nome</td>
                                    <td>Data do ped.</td>
                                    <td></td>
                              </tr>
                        </thead>

                        
                        <tbody>
                              @foreach($pedido->produtos as $produto)
                                    <tr>
                                          <td>{{ $produto->id }}</td>
                                          <td>{{ $produto->nome }}</td>
                                          <td>{{ $produto->created_at->format('d/m/Y') }}</td>
                                          <td>
                                                <form id="form_{{$pedido->id}}_{{$produto->id}}" method="post" 
                                                action="{{ route('pedido-produto.destroy', ['pedido' => $pedido->id, 'produto' => $produto->id ]) }}">
                                                      @method('DELETE')
                                                      @csrf
                                                      <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{$pedido->id}}_{{$produto->id}}').submit()"> Excluir </a> 
                                                </form>
                                          </td>
                                    </tr>
                              @endforeach
                        </tbody>
                      
                  </table>
                  {{-- {{ $pedido }} --}}
            <div class="row">
                  <div class="col">
                        <h4>Itens do pedido </h4>
                        @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
                        @endcomponent 
                  </div>
            </div>
      </div>
</div>
@endsection
