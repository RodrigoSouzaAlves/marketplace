<?php


namespace App\Traits;

use Illuminate\Http\Request;

trait Uploadtrait
{
    private function photoUpload($photos, $imageColumn = null)
    {
        $uploadPhotos = [];

        if(is_array($photos))
        {
            foreach ($photos as $photo) {//Pecorre o array para criar um novo com o endereço da pasta de destino.
                $uploadPhotos[] = [$imageColumn => $photo->store('products', 'public')];
            }
        }else{
            $uploadPhotos = $photos->store('logo', 'public');
        }

        return $uploadPhotos;
    }
}
