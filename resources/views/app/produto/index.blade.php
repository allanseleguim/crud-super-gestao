@extends('app.layouts.basico')
@section('titulo', 'Produto')
@section('conteudo')
<div class="container ">
      <main id="clientes_index">
            <div class="row">
                  <div class="col">
                        <h2> Listagem de produtos</h2>
                        <nav class="navbar navbar-expand-lg navbar-light">
                              <a href="{{ route('produto.create')}}" class="btn btn-outline-success my-2 my-sm-0">Cadastrar novo</a>
                              &nbsp;&nbsp;
                              {{-- <a href="" class="btn btn-outline-success my-2 my-sm-0">Consultar</a> --}}
                        </nav>
                  </div>
            </div>
            <div class="row">
                  <div class="col">
                        <table border="1px" width="100%" class="table table-hover">
                              <thead>
                                    <tr>
                                          <th>Nome</th>
                                          <th>Descrição</th>
                                          <th>Fornecedor</th>
                                          <th>Website</th>
                                          <th>Peso</th>
                                          <th>Unidade ID</th>
                                          <th>Comprimento</th>
                                          <th>Altura</th>
                                          <th>Largura</th>
                                          <th></th>
                                          <th></th>
                                          <th></th>
                                    </tr>
                              </thead>
                              <tbody>
                                    @foreach ($produtos as $produto )
                                    <tr>
                                          <td>{{ $produto->nome }}</td>
                                          <td>{{ $produto->descricao }}</td>
                                          <td>{{ $produto->fornecedor->nome }}</td>
                                          <td>{{ $produto->fornecedor->site }}</td>
                                          <td>{{ $produto->peso }}</td>
                                          <td>{{ $produto->unidade_id }}</td>
                                          <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                                          <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                                          <td>{{ $produto->itemDetalhe->altura ?? '' }}</td>
                                          <td><a hclass="btn btn-primary" ref="{{ route('produto.show', ['produto' => $produto->id ]) }}"> Visualizar </a></td>
                                          <td>
                                                <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id ]) }}">
                                                      @method('DELETE')
                                                      @csrf
                                                      {{-- <button type="submit">Excluir</button> --}}
                                                      <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{$produto->id}}').submit()"> Excluir</a>
                                                </form>
                                          </td>
                                          <td><a class="btn btn-secondary" href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                                    </tr>
                                    <tr>
                                          <td colspan="12">
                                                <h6>Pedidos</h6>
                                                @foreach($produto->pedidos as $pedido)
                                                <a class="btn btn-warning" href="{{route('pedido-produto.create', ['pedido' => $pedido->id ]) }}">
                                                      <strong>Pedido: </strong> {{ $pedido->id }},
                                                </a>
                                                @endforeach
                                          </td>
                                    </tr>
                                    @endforeach
                              </tbody>
                        </table>
                  </div>
            </div>
            {{-- {{ $pedido }} --}}
            {{-- {{ $produtos->toJson() }} --}}
            <div class="row">
                  <div class="col">
                        {{ $produtos->appends($request)->links() }}
                        <br>
                        Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} de
                        ( {{ $produtos->firstItem() }} até {{ $produtos->lastItem() }} )
                  </div>
            </div>
</div>
</div>
</div>
</div>
@endsection