@extends('layouts.app')
@section('content')
<?php $page = '/pagina/categoria'; ?>
<div class="container">
  <h3>Categorias</h3>
  <h5>As melhores seleções para você</h5>
  <hr class="my-4">
  <div class="row d-flex justify-content-around">

    <div class="col-md-4 col-sm-12 list-group">
      @foreach($categorias as $categoria)
        <a href="/pagina/categoria/ordenar/{{ $categoria->id }}" class="list-group-item list-group-item-action">{{ $categoria->name }}</a>
      @endforeach
    </div>

    <div class="col-md-8 shadow">
      <div class="row d-flex justify-content-around mb-1">
        @foreach($produtos as $produto)
        <div class="card mt-1 shadow" style="width: 14rem;">
          <a href="/pagina/produto/{{ $produto->id }}"><img class="card-img-top border"src="{{ $produto->foto }}" alt="Card image cap"></a>
          <div class="card-body">
            <h5 class="card-title">R$ {{ $produto->valor }}</h5>
            <div style="height:100px; overflow: scroll;">
              <p class="card-text">{{ $produto->description }}</p>
            </div>
            <a href="#" class="btn btn-primary mt-1">Adicionar ao carrinho</a>
          </div>
        </div>
        @endforeach
      </div>
      <div class="mt-1 d-flex justify-content-center">
        {{ $produtos->links() }}
      </div>
    </div>
  </div>
</div>
@include('carrosel')
@endsection