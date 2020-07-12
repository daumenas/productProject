@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="container d-flex flex-wrap justify-content-around" id="productList">
                @foreach($products as $product)
                    <div class="card w-30 col-sm-6" id="{{ $product->id }}">
                        @foreach($product->images as $image)
                            <img src="{{ Storage::url("{$image->product_image}") }}" alt="{{ $image->product_image }}" class="thumbnail" >
                            @break
                        @endforeach
                        <div class="card-body">
                            <h4 class="card-title">{{ $product->name }}</h4>
                            <p class="card-text mt-auto mb-auto">
                                <h6>Quantity:</h6>
                                {{ $product->quantity }}
                            <h6>Price:</h6>
                            <p class="card-tex mt-auto mb-auto">
                                ${{ $product->price }}
                            </p>
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="container d-inline-flex justify-content-between">
                                <div class="mt-auto mb-auto">
                                    <a class="btn btn-primary"
                                       href="{{ route('barChart', ['id' => $product->id]) }}">Price history</a>
                                    <a class="btn btn-primary"
                                       href="{{ route('quantityChart', ['id' => $product->id]) }}">Quantity history</a>
                                    <a class="btn btn-primary"
                                       href="{{ route('more-info-product', ['id' => $product->id]) }}">Product details</a>
                                    <a class="btn btn-primary"
                                       href="{{ route('edit-product', ['id' => $product->id]) }}">Edit</a>
                                    @if($product->active == true)
                                        <a class="btn btn-primary"
                                            href="{{ route('delete-product', ['id' => $product->id]) }}">Delete</a>
                                    @else
                                        <a class="btn btn-primary"
                                           href="{{ route('delete-product', ['id' => $product->id]) }}">Restore</a>
                                    @endIf
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection