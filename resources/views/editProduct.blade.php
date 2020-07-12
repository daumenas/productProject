@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card mt-5 ml-auto mr-auto">
            <div class="card-header"><h3>Editting product #{{ $product->id }}</h3></div>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        {{ $error }}
                    @endforeach
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('update-product', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ $product->name }}">
                        @if($errors->has('name'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="ean">EAN</label>
                        <input class="form-control" type="text" name="EAN" id="ean" value="{{ $product->EAN }}">
                        @if($errors->has('EAN'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('EAN') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="type">Type</label>
                        <input class="form-control" type="text" name="type" id="type" value="{{ $product->type }}">
                        @if($errors->has('type'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('type') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="weight">Weight</label>
                        <input class="form-control" type="number" name="weight"
                                  id="weight" value="{{ $product->weight }}">
                        @if($errors->has('weight'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('weight') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input class="form-control" type="text" name="color"
                               id="color" value="{{ $product->color }}">
                        @if($errors->has('color'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('color') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity" id="quantity"
                               value="{{ $product->quantity }}">
                        @if($errors->has('quantity'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('quantity') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" id="price"
                               value="{{ $product->price }}">
                        @if($errors->has('price'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('price') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="images">Images</label>
                        <input type="file" class="form-control-file" name="images[]" id="images" multiple
                               value="{{ asset('public/images/'.$product['images']) }}">
                        @if($errors->has('images'))
                            <div class="alert alert-danger mt-1">
                                {{ $errors->first('images') }}
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
@endsection