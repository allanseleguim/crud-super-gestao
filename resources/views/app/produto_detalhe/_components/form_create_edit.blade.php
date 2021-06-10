<!-- mudando cabeçalho do FORM dependendo se for UPDATE ou CREATE -->
@if(isset($produto_detalhe->id))
<form method="post" action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id ]) }}">
      @csrf
      @method('PUT')
      @else
      <form method="post" action="{{ route('produto-detalhe.store') }}">
            @csrf
            @endif

            <input type="text" name="produto_id" id="produto_id" placeholder="ID do produto" class="bordapreta" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
            {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}



            <input type="text" name="comprimento" placeholder="comprimento" class="bordapreta" value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
            {{ $errors->has('comprimento') ? $errors->first('comprimento') : ''}}


            <input type="text" name="largura" placeholder="largura" class="bordapreta" value="{{ $produto_detalhe->largura ?? old('largura') }}">
            {{ $errors->has('largura') ? $errors->first('largura') : '' }}

            <input type="text" name="altura" placeholder="altura" class="bordapreta" value="{{ $produto_detalhe->altura ?? old('altura') }}">
            {{ $errors->has('altura') ? $errors->first('altura') : '' }}

            {{-- @error('uf')
  <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}

            <select name="unidade_id">
                  <option> Selecione a unidade de medida </option>

                  @foreach ($unidades as $unidade)
                  <option value="{{ $unidade->id }}" {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>{{ $unidade->descricao }} </option>
                  @endforeach
            </select>
            {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}


            <button type="submit" class="borda-preta">Cadastrar</button>
      </form>