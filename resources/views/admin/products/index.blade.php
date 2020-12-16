@extends('admin.layouts.app')

@section('content')
    <a href="{{route('admin_products.create')}}" class="btn btn-success">Criar Produto</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome do produto</th>
            <th>Preço</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{route('admin_stores_edit', ['id'=> $product->id])}}" class="btn btn-sm btn-dedfult">Editar</a>
                    <a href="{{route('admin_stores_destroy', ['id'=> $product->id])}}" class="btn btn-sm btn-danger">Deletar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$products->links()}}
@endsection
