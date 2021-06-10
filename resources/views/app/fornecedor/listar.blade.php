@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')
@section('conteudo')  


<div class="container ">
      <main id="clientes_show">
            <div class="row">
                  <div class="col">
                        <h2> Fornecedor - Listagem </h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              <a href="{{ route('app.fornecedor.adicionar')}}" class="btn btn-outline-success my-2 my-sm-0">Cadastrar/Editar</a>
                              &nbsp;&nbsp;
                              <a href="{{ route('app.fornecedor')}}" class="btn btn-outline-success my-2 my-sm-0">Voltar</a>
                        </nav>
                  </div>
            </div>
      </main>



      <div class="row">
            <div class="col">

                  <table border="1px" width="100%" class="table table-hover">
                        <thead>
                              <tr>
                                   <th scope="col">Nome</th> 
                                   <th scope="col">Site</th> 
                                   <th scope="col">UF</th> 
                                   <th scope="col">E-mail</th> 
                                   <th scope="col"></th>
                                   <th scope="col"></th>
                              </tr>
                        </thead>

                        <tbody>
                              @foreach ($fornecedores as $fornecedor )
                              <tr>
                                    <td>{{ $fornecedor->nome }}</td>
                                    <td>{{ $fornecedor->site }}</td>
                                    <td>{{ $fornecedor->uf }}</td>
                                    <td>{{ $fornecedor->email }}</td>
                                    <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}"> Excluir</a></td>
                                    <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                              </tr>

                              <tr>
                                    <td colspan="6">
                                          <p>Lista de produtos</p>
                                          <table border="1" margin="20px">
                                                <thead>
                                                      <tr>
                                                            <th>ID</th>
                                                            <th>Nome </th>
                                                      </tr>
                                                </thead>
                                                <tbody>
                                                      @foreach($fornecedor->produtos as $key => $produto)
                                                      <tr>
                                                            <td>{{ $produto->id }}</td>
                                                            <td>{{ $produto->nome }}</td>
                                                      </tr>
                                                      @endforeach

                                                </tbody>
                                          </table>
                                    </td>
                              </tr>
                              @endforeach
                        </tbody>
                  </table>

                  {{ $fornecedores->appends($request)->links() }}
                  <br>
                  Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }} de 
                 ( {{ $fornecedores->firstItem() }} até {{ $fornecedores->lastItem() }} )
            


               
            </div>
      </div>



</div>
@endsection

