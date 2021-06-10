@extends('app.layouts.basico')
@section('titulo', 'Visualizar')
@section('conteudo')

<div class="container ">
      <main id="pedidos_edit">
            <div class="row">
                  <div class="col">
                        <h2> Detalhes do produto</h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              
                              <a href="{{ route('produto.index')}}" class="btn btn-outline-success my-2 my-sm-0">Voltar</a>
                        </nav>
                  </div>
            </div>
      </main>

    
            <div class="row">
                  <div class="col">
                        <table  class="table table-hover">
                              <tr>
                                    <td>ID: </td>
                                    <td>{{ $produto->id }}</td>
                              </tr>
      
                              <tr>
                                    <td>Nome: </td>
                                    <td>{{ $produto->nome }}</td>
                              </tr>
      
                              <tr>
                                    <td>Descrição: </td>
                                    <td>{{ $produto->descricao }}</td>
                              </tr>
      
                              <tr>
                                    <td>Peso: </td>
                                    <td>{{ $produto->peso }}</td>
                              </tr>
      
                              <tr>
                                    <td>Unidade de medida: </td>
                                    <td>{{ $produto->unidade_id }}</td>
                              </tr>
      
                        </table>
                  </div>
            </div>
                 
            
</div>


</div>
@endsection