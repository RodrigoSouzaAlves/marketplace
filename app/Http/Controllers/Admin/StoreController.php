<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequest;
use App\Traits\Uploadtrait;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    use Uploadtrait;

    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create','store']);
    }

    public function index(){
        $store = auth()->user()->store;

        return view('admin.stores.index', compact('store'));
    }

    public function create(){
        $users = \App\User::all(['id','name']);

        return view('admin.stores.create', compact('users'));
    }

    public function store(StoreRequest $request){
        $data = $request->all(0);
        $user = auth()->user();

        if($request->hasFile('logo'))
        {
            $data['logo'] = $this->photoUpload($request->file('logo'));
        }
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

        if($request->hasFile('logo'))
        {
            if(Storage::disk('public')->exists($store->logo))
            {
                Storage::disk('public')->delete($store->logo);
            }

            $data['logo'] = $this->photoUpload($request->file('logo'));
        }

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
