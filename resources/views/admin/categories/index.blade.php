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
                    <div class="btn-group">
                        <a href="{{route('admin_categories.edit', ['category'=> $category->id])}}" class="btn btn-sm btn-dedfult">Editar</a>
                        <form action="{{route('admin_categories.destroy', ['category'=> $category->id])}}" method="post">
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
    {{$categories->links()}}
@endsection
