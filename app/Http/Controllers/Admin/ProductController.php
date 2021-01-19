<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;


class productController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStore = auth()->user()->store;
        $products = $userStore->products()->paginate(10);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = \App\Category::all(['id','name']);

        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $store = auth()->user()->store;
        $product = $store->products()->create($data);
        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')){//Verifica se tem imagens no request
            $photos = $this->photoUpload($request,'image'); //Prepara o array para salvar na tabela

            $product->photos()->createMany($photos);// Salva o caminho da imagem no banco
        }

        flash('Produto Cadastrado com sucesso!');
        return redirect()->route('admin_products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->find($id);
        $categories = \App\Category::all(['id','name']);
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $product = $this->product->find($id);
        $product->update($data);
        $product->categories()->sync($data['categories']);

        if($request->hasFile('photos')){//Verifica se tem imagens no request
            $photos = $this->photoUpload($request,'image'); //Prepara o array para salvar na tabela

            $product->photos()->createMany($photos);// Salva o caminho da imagem no banco
        }

        flash('Produto Atualizado com sucesso!');

        return redirect()->route('admin_products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->product::find($id);
        $data->delete();

        flash('Produto deletado com sucesso');
        return redirect()->route('admin_products.index');
    }

    private function photoUpload(Request $request, $imageColumn)
    {
        $photos = $request->file('photos');

        $uploadPhotos = [];

        foreach($photos as $photo){//Pecorre o array para criar um novo com o endereço da pasta de destino.
            $uploadPhotos[] = [$imageColumn => $photo->store('products', 'public')];
        }

        return $uploadPhotos;
    }
}
