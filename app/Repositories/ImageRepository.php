<?php

namespace App\Repositories;

use App\History;
use App\Image;
use App\Product;
use App\Repositories\Interfaces\ImageRepositoryInterface;
use Psy\Util\Json;

class ImageRepository implements ImageRepositoryInterface
{
    public function saveImage($path, $id)
    {
        $image = new Image();
        $image->product_image = $path;
        $image->product_id = $id;
        $image->save();
    }
}