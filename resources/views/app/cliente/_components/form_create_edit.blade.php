<!-- mudando cabeçalho do FORM dependendo se for UPDATE ou CREATE -->
@if(isset($cliente->id))
<form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id ]) }}">
      @csrf
      @method('PUT')
      @else
      <form method="post" action="{{ route('cliente.store') }}">
            @csrf
            @endif
            <div class="form-group">
                  <input type="text" name="nome" id="nome" placeholder="nome" class="form-control" 
                  value="{{ $cliente->nome ?? old('nome') }}">
                  {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            </div>
            {{-- @error('uf')
  <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
            <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>