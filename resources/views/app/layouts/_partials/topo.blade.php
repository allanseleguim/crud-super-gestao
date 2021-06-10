<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="{{ route('app.home') }}"> <img src="{{ asset('img/logo.png') }}"> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            
                  <li class="nav-item"><a href="{{ route('app.home') }}" class="nav-link">Dashboard</a></li>
                  <li class="nav-item"><a href="{{ route('cliente.index') }}" class="nav-link">Clientes</a></li>
                  <li class="nav-item"><a href="{{ route('pedido.index') }}" class="nav-link">Pedidos</a></li>
                  <li class="nav-item"><a href="{{ route('app.fornecedor') }}" class="nav-link">Fornecedores</a></li>
                  <li class="nav-item"><a href="{{ route('produto.index') }}" class="nav-link">Produtos</a></li>
                  <li class="nav-item"><a href="{{ route('app.sair') }}" class="nav-link">Sair</a></li>
            </ul>
      </div>
</nav>