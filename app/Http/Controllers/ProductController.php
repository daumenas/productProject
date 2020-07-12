<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\ImageRepositoryInterface;
use App\Charts\ProductChart;

class ProductController extends Controller
{
    private $productRepository;
    private $imageRepository;
    public function __construct(ProductRepositoryInterface $productRepository, ImageRepositoryInterface $imageRepository)
    {
        $this->productRepository = $productRepository;
        $this->imageRepository = $imageRepository;
    }

    public function index()
    {
        $products = $this->productRepository->allActive();

        return view('productTable')->with(['products' => $products]);
    }

    public function indexDeleted()
    {
        $products = $this->productRepository->allInactive();

        return view('productTable')->with(['products' => $products]);
    }

    public function editProduct($id)
    {
        $product = $this->productRepository->byId($id);
        return view("editProduct")->with(['product' => $product]);
    }

    public function displayProduct($id)
    {
        $product = $this->productRepository->byId($id);
        return view("displayProduct")->with(['product' => $product]);
    }

    public function edit(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'EAN' => 'required',
            'type' => 'required',
            'weight' => 'required',
            'color' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);

        $pictures = $request->file('images');

        if($pictures) {
            foreach ($pictures as $picture) {
                $path = $picture->store('/public/storage/storage/images');
                $this->imageRepository->saveImage($path, $request->id);
            }
        }

        $this->productRepository->save($validatedData, $request->id);

        return redirect("/");
    }

    public function createPriceChart($id)
    {
        $prices =[];
        $dates = [];
        $product = $this->productRepository->byId($id);
        foreach($product->histories as $history)
        {
            $prices[] = $history->price;
            $dates[] = $history->created_at->format('d M');
        }
        $chart = new ProductChart;
        $chart->labels($dates);
            $chart->dataset('PriceChange', 'line', $prices)->options([
                'fill' => 'true',
                'borderColor' => '#51C1C0'
            ]);
        return view('productChart',compact('chart'));
    }

    public function createQuantityChart($id)
    {
        $quantities =[];
        $dates = [];
        $product = $this->productRepository->byId($id);
        foreach($product->histories as $history)
        {
            $quantities[] = $history->quantity;
            $dates[] = $history->created_at->format('d M');
        }
        $chart = new ProductChart;
        $chart->labels($dates);
        $chart->dataset('Quantity Change', 'line', $quantities)->options([
            'fill' => 'true',
            'borderColor' => '#51C1C0'
        ]);
        return view('productChart',compact('chart'));
    }

    public function delete(Request $request)
    {
        $this->productRepository->deleteOrRestore($request->id);
        return redirect("/");
    }
}
