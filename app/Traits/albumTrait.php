<?php

namespace App\Traits;
use App\Models\Picture;
use App\Models\Album;

Trait albumTrait
{
    public function saveImage($photos,$path,$id){
         foreach($photos as $photo){
        // $file_extention=$photo ->getClientOriginalExtension();
        // $file_name=time().'.'.$file_extention;
        $file_name=$photo ->getClientOriginalName();

        $photo ->move($path,$file_name);
            picture::create([
                'picture_name'=>$file_name,
                'album_id' =>$id,
            ]);
     }
}
}
