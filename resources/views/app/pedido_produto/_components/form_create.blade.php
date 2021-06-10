<form method="post" action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}">
      @csrf
      <div class="form-group">
            <select name="produto_id" class="form-control">
                  <option> Selecione um Produto </option>
                  @foreach ($produtos as $produto)
                  <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : ''}}>
                        {{ $produto->nome }}
                  </option>
                  @endforeach
            </select>
            {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}
      </div>

      <div class="form-group">
            <input type="number" name="quantidade" value="{{ old('quantidade') ?  old('quantidade') : '' }}"
            placeholder="Quantidade" class="form-control">
            {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}
      </div>

      <div class="form-group">
            <button type="submit" class="btn btn-primary form-control">Cadastrar</button>
      </div>
</form>