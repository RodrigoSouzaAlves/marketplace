@extends('admin.layouts.app')

@section('content')
    @if(!$store)
    <a href="{{route('admin_stores.create')}}" class="btn btn-success">Criar Loja</a>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome da Loja</th>
            <th>Total de produtos</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>

        <tr>
            <td>{{$store->id}}</td>
            <td>{{$store->name}}</td>
            <td>{{$store->products->count()}}</td>
            <td>
                <div class="btn-group">
                    <a href="{{route('admin_stores.edit', ['store'=> $store->id])}}" class="btn btn-sm btn-dedfult">Editar</a>
                    <form action="{{route('admin_stores.destroy', ['store'=> $store->id])}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger">Deletar</button>
                    </form>
                </div>
            </td>
        </tr>

        </tbody>
    </table>
@endsection
