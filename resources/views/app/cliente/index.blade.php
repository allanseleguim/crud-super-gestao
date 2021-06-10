@extends('app.layouts.basico')
@section('titulo', 'Cliente')
@section('conteudo')



<div class="container ">
      <main id="clientes_index">
            <div class="row">
                  <div class="col">
                        <h2> Listagem de clientes</h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              <a href="{{ route('cliente.create')}}" class="btn btn-outline-success my-2 my-sm-0">Cadastrar novo</a>
                              &nbsp;&nbsp;
                              {{-- <a href="" class="btn btn-outline-success my-2 my-sm-0">Consultar</a> --}}
                        </nav>
                  </div>
            </div>



            <div class="row">
                  <div class="col">
                        <table class="table table-hover">
                              <thead>
                                <tr>
                                  <th scope="col">Nome</th>
                                  <th scope="col"></th>
                                  <th scope="col"></th>
                                  <th scope="col"></th>
                                </tr>
                              </thead>
                              <tbody>
                                

                                    @foreach ($clientes as $cliente )
                                    <tr>
                                          <td>{{ $cliente->nome }}</td>
      
                                          <td><a href="{{ route('cliente.show', ['cliente' => $cliente->id ]) }}" class="btn btn-primary"> Visualizar </a></td>
                                          <td>
                                                <form id="form_{{$cliente->id}}" method="post" action="{{ route('cliente.destroy', ['cliente' => $cliente->id ]) }}">
                                                      @method('DELETE')
                                                      @csrf
                                                      {{-- <button type="submit">Excluir</button> --}}
                                                      <a href="#" onclick="document.getElementById('form_{{$cliente->id}}').submit()" class="btn btn-danger"> Excluir</a>
                                                </form>
                                          </td>
      
      
                                          <td><a href="{{ route('cliente.edit', ['cliente' => $cliente->id]) }}" class="btn btn-secondary">Editar</a></td>
                                    </tr>
                                    @endforeach

                              
                              </tbody>
                            </table>
                  </div>
            </div>


            <div class="row">
                  <div class="col">
                        {{ $clientes->appends($request)->links() }}
                        <br>
                        Exibindo {{ $clientes->count() }} Clientes de {{ $clientes->total() }} de
                        ( {{ $clientes->firstItem() }} até {{ $clientes->lastItem() }} )
                  </div>
            </div>
      </main>
</div>


@endsection