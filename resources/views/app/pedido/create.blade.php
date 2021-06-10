@extends('app.layouts.basico')
@section('titulo', 'Pedido')
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
                        <!-- todas as variáveis usadas por componentes, devem ser passadas por parâmetro -->
                        @component('app.pedido._components.form_create_edit', ['clientes' => $clientes])
                        @endcomponent
                  </div>
            </div>
      </main>
</div>
@endsection