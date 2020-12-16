@extends('admin.layouts.app')

@section('content')
    <h1>Criar Produto</h1>
    <form action="{{route('admin_products.create')}}" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label>Nome do Produto</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label>Descrição</label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="form-group">
            <label>Conteudo</label>
            <input type="text" name="body" class="form-control">
        </div>

        <div class="form-group">
            <label>Preço</label>
            <input type="text" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control">
        </div>

        <div class="form-group">
            <label>Usuário</label>
            <select name="user" class="form-control">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <div>
            <button type="submit" class="btn btn-lg btn-success">Criar Produto</button>
        </div>
    </form>

@endsection
