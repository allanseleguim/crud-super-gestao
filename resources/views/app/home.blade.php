@extends('app.layouts.basico')
@section('titulo', 'Home')
@section('conteudo')
<div id="dashboard">
<div class="container">

      <br><br>
      <h2> Dashboard </h2>
      <hr>
      <div class="row">
            <div class="col-12 col-lg-3">
                  <div class="card" style="width: 18rem;">
                        <div class="card-body">
                              <h3 class="card-title">Produtos</h3>
                              <h4 class="card-subtitle mb-2 text-muted">No sistema</h4>
                              <p class="card-text">Total de produtos. {{ $produtos->total() }} </p>
                              <a href="{{ route('produto.index') }}" class="card-link">Acessar módulo.</a>
                        </div>
                  </div>
            </div>


            <div class="col-12 col-lg-3">
                  <div class="card" style="width: 18rem;">
                        <div class="card-body">
                              <h3 class="card-title">Clientes</h3>
                              <h4 class="card-subtitle mb-2 text-muted">No sistema</h4>
                              <p class="card-text">Total de clientes. {{ $clientes->total() }} </p>
                              <a href="{{ route('produto.index') }}" class="card-link">Acessar módulo.</a>
                        </div>
                  </div>
            </div>


            <div class="col-12 col-lg-3">
                  <div class="card" style="width: 18rem;">
                        <div class="card-body">
                              <h3 class="card-title">Pedidos</h3>
                              <h4 class="card-subtitle mb-2 text-muted">No sistema</h4>
                              <p class="card-text">Total de pedidos. {{ $pedidos->total() }} </p>
                              <a href="{{ route('produto.index') }}" class="card-link">Acessar módulo.</a>
                        </div>
                  </div>
            </div>


            <div class="col-12 col-lg-3">
                  <div class="card" style="width: 18rem;">
                        <div class="card-body">
                              <h3 class="card-title">Fornecedores</h3>
                              <h4 class="card-subtitle mb-2 text-muted">No sistema</h4>
                              <p class="card-text">Total de fornecedores. {{ $fornecedores->total() }} </p>
                              <a href="{{ route('produto.index') }}" class="card-link">Acessar módulo.</a>
                        </div>
                  </div>
            </div>


            
      </div>
      

</div>
</div>







@endsection