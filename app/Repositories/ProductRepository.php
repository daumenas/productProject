<?php

namespace App\Repositories;

use App\History;
use App\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Psy\Util\Json;

class ProductRepository implements ProductRepositoryInterface
{
    public function allActive()
    {
        return Product::with('images')->where('active', true)->simplePaginate(6);
    }

    public function allInactive()
    {
        return Product::with('images')->where('active', false)->simplePaginate(6);
    }

    public function byId($id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function save($validatedData, $id)
    {
        $product = Product::findOrFail($id);


        if($product) {
            if ($product->price != $validatedData['price'] || $product->quantity != $validatedData['quantity']) {
                $history = new History();
                $history->price = $validatedData['price'];
                $history->quantity = $validatedData['quantity'];
                $history->product_id = $id;
                $history->save();
            }

            $product->name = $validatedData['name'];
            $product->EAN = $validatedData['EAN'];
            $product->type = $validatedData['type'];
            $product->weight = $validatedData['weight'];
            $product->color = $validatedData['color'];
            $product->price = $validatedData['price'];
            $product->quantity = $validatedData['quantity'];
            $product->active = true;

            $product->save();
        }
    }

    public function deleteOrRestore($id)
    {
        $product = Product::findOrFail($id);
        if($product) {
            if ($product->active == true) {
                $product->active = false;
            } else {
                $product->active = true;
            }
            $product->save();
        }
    }
}