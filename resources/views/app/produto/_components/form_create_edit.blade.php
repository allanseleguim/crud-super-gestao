<!-- mudando cabeçalho do FORM dependendo se for UPDATE ou CREATE -->
@if(isset($produto->id))
<form method="post" action="{{ route('produto.update', ['produto' => $produto->id ]) }}">
      @csrf
      @method('PUT')
      @else    
      <form method="post" action="{{ route('produto.store') }}">
            @csrf
            @endif
            <div class="form-group">
                  <select name="fornecedor_id" class="form-control">
                        <option> Selecione um fornecedor </option>

                        @foreach ($fornecedores as $fornecedor)
                        <option value="{{ $fornecedor->id }}" 
                              {{ $produto->fornecedor_id ?? old('fornecedor_id') == $fornecedor->id ? 'selected' : ''}}>
                              {{ $fornecedor->nome }} 
                        </option>
                        @endforeach
                  </select>
                  {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}
            </div>

            <div class="form-group">
                  <input type="text" name="nome" id="nome" placeholder="nome" class="form-control" 
                  value="{{ $produto->nome ?? old('nome') }}">
                  {{ $errors->has('nome') ? $errors->first('nome') : '' }}
            </div>


            <div class="form-group">
                  <input type="text" name="descricao" placeholder="Descrição" class="form-control"
                  value="{{ $produto->descricao ?? old('descricao') }}">
                  {{ $errors->has('descricao') ? $errors->first('descricao') : ''}}
            </div>

            <div class="form-group">
                  <input type="number" name="peso" placeholder="Peso" class="form-control"
                  value="{{ $produto->peso ?? old('peso') }}">
                  {{ $errors->has('peso') ? $errors->first('peso') : '' }}
            </div>

            {{-- @error('uf')
  <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
            
            <div class="form-group">
                  <select name="unidade_id" class="form-control">
                        <option> Selecione a unidade de medida </option>

                        @foreach ($unidades as $unidade)
                        <option value="{{ $unidade->id }}" 
                              {{ $produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : ''}}>
                              {{ $unidade->descricao }} </option>
                        @endforeach
                  </select>
                  {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
            </div>

            <div class="form-group">
                  <button type="submit" class="form-control">Cadastrar</button>
            </div>
      </form>