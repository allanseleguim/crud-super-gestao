@extends('app.layouts.basico')
@section('titulo', 'Fornecedor')
@section('conteudo')  

<div class="container">

      <main id="fornecedor_show">
            <div class="row">
                  <div class="col">
                        <h2> Edição/Adição de dados do fornecedor</h2>

                        <nav class="navbar navbar-expand-lg navbar-light">
                        
                              &nbsp;&nbsp;
                              <a href="{{ route('app.fornecedor')}}" class="btn btn-outline-success my-2 my-sm-0">Voltar</a>
                        </nav>
                  </div>
            </div>
      </main>


      <div class="row">
            <div class="col">

                  <div class="card p-4 m-4">
                        
                  {{ $msg ?? '' }}
                        <form method="post" action="{{ route('app.fornecedor.adicionar')}}">
                              @csrf
                              <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}" >
                              <div class="form-group">
                                    <input type="text" name="nome" id="nome" placeholder="nome" class="form-control"  value="{{ $fornecedor->nome ?? old('nome') }}">
                              </div>
                              {{-- $errors->has('nome') ? $errors->first('nome') : '' --}}

                              @error('email')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror

                              <div class="form-group">
                                    <input type="text" name="site" placeholder="Site" class="form-control" value="{{ $fornecedor->site ?? old('site') }}">
                                    {{-- $errors->has('site') ? $errors->first('site') : '' --}}
                                    @error('site')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                              </div>

                              <div class="form-group">
                                    <input type="text" name="uf" placeholder="UF" class="form-control"value="{{ $fornecedor->uf ?? old('uf') }}">
                              </div>
                              {{-- $errors->has('uf') ? $errors->first('uf') : '' --}}

                              @error('uf')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror

                              <div class="form-group">
                                    <input type="text" name="email" placeholder="E-mail" class="form-control" value="{{ $fornecedor->email ?? old('email') }}">
                              </div>
                              {{-- $errors->has('email') ? $errors->first('email') : '' ---}}

                              @error('email')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror

                              <div class="form-group">
                                    <button type="submit" class="form-control">Alterar/Cadastrar</button>
                              </div>

                        </form>
                  </div>
            </div>
      </div>


</div>
@endsection
