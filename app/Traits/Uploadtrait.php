<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait Uploadtrait
{
    private function photoUpload(Request $request, $imageColumn = null)
    {
        $photos = $request->file('photos');

        $uploadPhotos = [];

        foreach($photos as $photo){//Pecorre o array para criar um novo com o endereço da pasta de destino.
           if(!is_null($imageColumn))
           {
               $uploadPhotos[] = [$imageColumn => $photo->store('products', 'public')];
           }else{
               $uploadPhotos = $photo;
           }
        }

        return $uploadPhotos;
    }
}
