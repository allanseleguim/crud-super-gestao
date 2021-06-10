@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')


<div class="container ">
      <main id="fornecedor_index">
            <div class="row">
                  <div class="col">
                        <h2> Listagem de Fornecedores </h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              <a href="{{ route('app.fornecedor.adicionar')}}" class="btn btn-outline-success my-2 my-sm-0">Cadastrar </a>
                              &nbsp;&nbsp;
                              <a href="{{ route('app.fornecedor')}}" class="btn btn-outline-success my-2 my-sm-0">Buscar</a>
                        </nav>
                  </div>
            </div>


            <div class="row">
                  <div class="col">
            
                        <div class="card p-4 m-4">
                              <h3> Busca de fornecedor </h3>
                              <hr>
                              <br>
                         

                              <form method="post" action="{{ route('app.fornecedor.listar') }}">
                                    @csrf
                                    <div class="form-group">
                                          <input type="text" name="nome" placeholder="Nome" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                          <input type="text" name="site" placeholder="Site" class="form-control">
                                    </div>

                                    <div class="form-group">
                                          <input type="text" name="uf" placeholder="UF" class="form-control">
                                    </div>

                                    <div class="form-group">

                                          <input type="text" name="email" placeholder="E-mail" class="form-control">
                                    </div>

                                    <div class="form-group">
                                          <button type="submit" class="form-control btn btn-primary">Pesquisar</button>
                                    </div>
                                <form>


                                    
                                        
                        </div>
                  </div>
            </div>








      </main>
</div>
    

@endsection

