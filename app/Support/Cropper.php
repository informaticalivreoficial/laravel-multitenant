<?php
/**
 * Created by PhpStorm.
 * User: gustavoweb
 * Date: 2019-03-01
 * Time: 09:57 
 */

namespace App\Support;

use CoffeeCode\Cropper\Cropper as CropperCropper;

class Cropper
{
    public static function thumb(string $uri, int $width, int $height = null)
    {
        $cropper = new CropperCropper('../public/storage/cache');
        $pathThumb = $cropper->make(config('filesystems.disks.public.root') . '/' . $uri, $width, $height);

        $file = 'cache/' . collect(explode('/', $pathThumb))->last();
        return $file;
    }

    public static function flush(?string $path)
    {
        $cropper = new CropperCropper('../public/storage/cache');

        if(!empty($path)) {
            $cropper->flush($path);
        } else {
            $cropper->flush();
        }

    }
}