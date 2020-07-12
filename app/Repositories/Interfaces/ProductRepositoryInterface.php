<?php

namespace App\Repositories\Interfaces;

interface ProductRepositoryInterface
{
    public function allActive();

    public function allInactive();

    public function byId($id);

    public function save($validatedData, $id);

    public function deleteOrRestore($id);
}
