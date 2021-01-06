@extends('admin.layouts.app')

@section('content')
    <a href="{{route('admin_categories.create')}}" class="btn btn-success">Criar Categoria</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Nome da categoria</th>
            <th>Descrição</th>
            <th>Slug</th>
            <th>Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>{{$category->slug}}</td>
                <td>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$categories->links()}}
@endsection
