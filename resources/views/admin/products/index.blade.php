@extends('admin.layouts.app')

@section('content')
    <a href="{{route('admin_products.create')}}" class="btn btn-success">Criar Produto</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome do produto</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Loja</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>@foreach($product->categories as $teste)
                        <span class="badge badge-info">{{$teste->name}}</span>
                    @endforeach
                </td>
                <td>R$ {{number_format($product->price, 2, ',', '.')}}</td>
                <td>{{$product->store->name}}</td>
                <td>
                    <div class="btn-group">
                        <a href="{{route('admin_products.edit', ['product'=> $product->id])}}" class="btn btn-sm btn-dedfult">Editar</a>
                        <form action="{{route('admin_products.destroy', ['product'=> $product->id])}}" method="post">
                            @csrf
                            @method("DELETE")
                            <button  type="submit" class="btn btn-sm btn-danger">Remover</button>
                        </form>
                    </div>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{$products->links()}}
@endsection
