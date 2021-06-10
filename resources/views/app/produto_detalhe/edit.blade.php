@extends('app.layouts.basico')
@section('titulo', 'Editar Produto')
@section('conteudo')
<div class="conteudo-pagina">
      <div class="titulo-pagina2">
            <p>Editar detalhes do produto</p>
      </div>
      <div class="menu">
            <ul>
                  <li><a href="#">Voltar a listagem</a></li>

            </ul>
      </div>
      <div class="informacao-pagina">
            {{ $produto_detalhe->toJson() }}
            <h4>Produto</h4>
            <div>Nome: {{ $produto_detalhe->item->nome }}</div>
            <br>
            <div>Descrição:{{ $produto_detalhe->item->descricao }}</div>
            <br>
        
            <div style="width:30%;margin-left:auto;margin-right:auto">
                  @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades]);
                  @endcomponent
            </div>
      </div>
</div>
@endsection