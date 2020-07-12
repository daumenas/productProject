@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div id="carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @if(isset($product->images))
                            @foreach($product->images as $key => $image)
                                <li data-target="#carousel"
                                    data-slide-to="{{ $key }}"{{ $key == 0 ? ' class="active"' : '' }}></li>
                            @endforeach
                        @endif
                    </ol>
                    <div class="carousel-inner">
                        @if(isset($product->images))
                            @foreach($product->images as $key => $image)
                                <div class="carousel-item{{ $key == 0 ? ' active' : '' }}">
                                    <img class="d-block img-fluid w-100 thumbnail" src="{{ Storage::url("{$image->product_image}") }}"
                                         alt="product photo">
                                </div>
                            @endforeach
                        @else
                            <div class="carousel-item active">
                                <img class="d-block img-fluid w-100" src="http://placehold.it/400x250/000/fff"
                                     alt="product photo">
                            </div>
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-sm">
                <div class="card mt-3">
                    <div class="card-header font-weight-bold">
                        <h4 class="mt-auto mb-auto">
                            {{ $product->name }}
                        </h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h6 class="font-weight-bold">EAN</h6>
                                {{ $product->EAN }}
                            </li>
                            <li class="list-group-item">
                                <h6 class="font-weight-bold">Type</h6>
                                {{ $product->type }}
                            </li>
                            <li class="list-group-item">
                                <h6 class="font-weight-bold">Weight</h6>
                                {{ $product->weight }}
                            </li>
                            <li class="list-group-item">
                                <h6 class="font-weight-bold">Color</h6>
                                {{ $product->color }}
                            </li>
                            <li class="list-group-item">
                                <h6 class="font-weight-bold">Quantity</h6>
                                {{ $product->quantity }}
                            </li>
                            <li class="list-group-item">
                                <h6 class="font-weight-bold">Price</h6>
                                ${{ $product->price }}
                            </li>
                    </div>
              </div>
          </div>
      </div>
@endsection