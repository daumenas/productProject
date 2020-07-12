<?php

namespace App\Repositories\Interfaces;

interface ImageRepositoryInterface
{
    public function saveImage($path, $id);
}