<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Store;
use Illuminate\Http\Request;

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

    public function store(Request $request){
        $data = $request->all(0);

        $user = \App\User::find($data['user']);
        $store = $user->store()->create($data);

        return $store;
    }

    public function edit($id){
        $store = \App\Store::find($id);

        return view('admin.stores.edit', compact('store'));
    }

    public function update(Request $request, $id){
        $data = $request->all();

        $store = \App\Store::find($id);
        $store->update($data);

        return $store;
    }
}
