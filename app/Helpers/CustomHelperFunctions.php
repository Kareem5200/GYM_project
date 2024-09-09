<?php

namespace App\Helpers;


class CustomHelperFunctions {

    public static function storeImage(object $input,string $path):string{
        $extension = $input->getClientOriginalExtension();
        $image_name = time().'.'.$extension;
        $path = public_path().$path;
        $input->move($path,$image_name);
        return  $image_name;
    }

}
