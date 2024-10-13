<?php

namespace App\Helpers;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;


class CustomHelperFunctions {

    public static function storeImage(object $input,string $path):string{
        $manager = new ImageManager(new Driver());
        $input_scaled = $manager->read($input)->scale(255, 255);
        $extension = $input->getClientOriginalExtension();
        $image_name = time().'.'.$extension;
        $path = public_path($path);
        $input_scaled->save($path.$image_name);
        return  $image_name;
    }

}
