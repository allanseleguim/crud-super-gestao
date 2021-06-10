@extends('app.layouts.basico')
@section('titulo', 'Cliente')
@section('conteudo')  


<div class="container ">
      <main id="clientes_index">
            <div class="row">
                  <div class="col">
                        <h2> Adicionar novo cliente</h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                              <a href="{{ route('cliente.create')}}" class="btn btn-outline-success my-2 my-sm-0">Cadastrar novo</a>
                              &nbsp;&nbsp;
                              <a href="{{ route('cliente.index')}}" class="btn btn-outline-success my-2 my-sm-0">Voltar</a>
                        </nav>
                  </div>
            </div>


           <div class="row">
                 <div class="col">
                        @component('app.cliente._components.form_create_edit')
                        @endcomponent
                 </div>
           </div>


      </main>
</div>


@endsection
