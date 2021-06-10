@extends('app.layouts.basico')
@section('titulo', 'Detalhes do produto')
@section('conteudo')  
<div class="conteudo-pagina">
      <div class="titulo-pagina2">
          
                  <p>Detalhes do Produto</p>
     
      </div>

      <div class="menu">
            <ul>
                  <li><a href="#">Voltar a listagem</a></li>
            </ul>
      </div>      

      <div class="informacao-pagina">
            <div style="width:30%;margin-left:auto;margin-right:auto">
                  <!-- todas as variáveis usadas por componentes, devem ser passadas por parâmetro -->
                @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
                @endcomponent
            </div>
      </div>
</div>
@endsection
