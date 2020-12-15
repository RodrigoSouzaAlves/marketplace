@extends('admin.layouts.app')

@section('content')
    <a href="{{route('admin_stores_create')}}" class="btn btn-success">Criar Loja</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome da Loja</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stores as $store)
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>
                    <a href="{{route('admin_stores_edit', ['id'=> $store->id])}}" class="btn btn-sm btn-dedfult">Editar</a>
                    <a href="{{route('admin_stores_destroy', ['id'=> $store->id])}}" class="btn btn-sm btn-danger">Deletar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$stores->links()}}
@endsection
