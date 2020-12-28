<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function index(){
        $stores = \App\Store::paginate(10);

        return view('admin.stores.index', compact('stores'));
    }

    public function create(){
        $users = \App\User::all(['id','name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request){
        $data = $request->all(0);
        $user = auth()->user();
        $store = $user->store()->create($data);

        flash('Loja Criada com sucesso!!')->success();
        return redirect()->route('admin_stores.index');
    }

    public function edit($id){
        $store = \App\Store::find($id);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(StoreRequest $request, $id){
        $data = $request->all();

        $store = \App\Store::find($id);
        $store->update($data);

        flash('Loja Alterada com sucesso!!')->success();
        return redirect()->route('admin_stores.index');
    }

    public function destroy($id){
        $store = \App\Store::find($id);
        $store->delete();

        flash('Loja Excluida com sucesso!!')->success();
        return redirect()->route('admin_stores.index');
    }
}
