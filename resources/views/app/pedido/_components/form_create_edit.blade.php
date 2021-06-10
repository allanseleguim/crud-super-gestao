<!-- mudando cabeçalho do FORM dependendo se for UPDATE ou CREATE -->
@if(isset($pedido->id))
<form method="post" action="{{ route('pedido.update', ['pedido' => $pedido->id ]) }}">
      @csrf
      @method('PUT')
      @else
      <form method="post" action="{{ route('pedido.store') }}">
            @csrf
            @endif
            <div class="form-group">
            <select name="cliente_id" class="form-control">
                  <option> Selecione um Cliente </option>

                  @foreach ($clientes as $cliente)
                  <option value="{{ $cliente->id }}" 
                        {{ $pedido->cliente_id ?? old('cliente_id') == $cliente->id ? 'selected' : ''}}>
                        {{ $cliente->nome }} 
                  </option>
                  @endforeach
            </select>
            {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
            </div>


            <div class="form-group">
                  <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
            </div>
      </form>