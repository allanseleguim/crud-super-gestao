@extends('app.layouts.basico')
@section('titulo', 'Pedido')
@section('conteudo')

<div class="container">



      <main id="pedidos_index">
            <div class="row">
                  <div class="col">
                        <h2> Listagem de pedidos</h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              <a href="{{ route('pedido.create')}}" class="btn btn-outline-success my-2 my-sm-0">Cadastrar novo</a>
                              &nbsp;&nbsp;
                        </nav>
                  </div>
            </div>


            <div class="row">
                  <div class="col">

                        <table border="1px" width="100%" class="table table-hover">
                              <thead>
                                    <tr>
                                          <th scope="col">ID do Pedido</th>
                                          <th scope="col">Cliente</th>
                                          <th scope="col">Cliente</th>

                                          <th scope="col"></th>
                                
                                          <th scope="col"></th>
                                    </tr>
                              </thead>

                              <tbody>
                                    @foreach ($pedidos as $pedido )
                                    <tr>
                                          <td>{{ $pedido->id }}</td>
                                          <td>{{ $pedido->cliente_id }}</td>
                                          <td> <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id] ) }}">Adiconar produtos </a></td>

                                         
                                          <td>
                                                <form id="form_{{$pedido->id}}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id ]) }}">
                                                      @method('DELETE')
                                                      @csrf
                                                      {{-- <button type="submit">Excluir</button> --}}
                                                      <a href="#" onclick="document.getElementById('form_{{$pedido->id}}').submit()"> Excluir</a>
                                                </form>
                                          </td>


                                          <td><a href="{{ route('pedido.edit', ['pedido' => $pedido->id]) }}">Editar</a></td>
                                    </tr>
                                    @endforeach
                              </tbody>
                        </table>

                  </div>

            </div>
      </main>

            {{-- {{ $produtos->toJson() }} --}}


            <div class="row">
                  <div class="col">
                        {{ $pedidos->appends($request)->links() }}
                        <br>
                        Exibindo {{ $pedidos->count() }} Clientes de {{ $pedidos->total() }} de
                        ( {{ $pedidos->firstItem() }} até {{ $pedidos->lastItem() }} )
                  </div>
            </div>
           

</div>



            @endsection