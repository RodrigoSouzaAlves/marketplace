@extends('admin.layouts.app')

@section('content')
    <h1>Criar Produtos</h1>
    <form action="{{route('admin_products.update', ['id'=>$product->id])}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Nome Produto</label>
            <input type="text" name="name" class="form-control" value="{{$product->name}}">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control" value="{{$product->description}}">
        </div>

        <div class="form-group">
            <label>Conteudo</label>
            <input type="text" name="body" class="form-control" value="{{$product->body}}">
        </div>

        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control" value="{{$product->price}}">
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Atualizar Produto</button>
        </div>
    </form>

@endsection
