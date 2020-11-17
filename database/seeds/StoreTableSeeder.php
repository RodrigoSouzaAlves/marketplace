<?php

use Illuminate\Database\Seeder;

class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Busca no banco todas as lojas.
        $stores = \App\Store::all();

        //Para loja cria um produto.
        foreach ($stores as $store){
            $store->products()->save(factory(\App\Product::class)->make());
        }
    }
}
