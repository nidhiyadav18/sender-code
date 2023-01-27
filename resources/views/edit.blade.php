@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"></div>
                <div class="pull-right mb-2">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="pull-right">
<a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
</div>
</div>
</div>

@if(session('status'))
<div class="alert alert-success mb-1 mt-1">
{{ session('status') }}
</div>
@endif
<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<input type="hidden" name="id" class="form-control" required value="{{$product->id}}">

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Name:</strong>
<input type="text" name="name" class="form-control" required value="{{$product->name}}" placeholder="Company Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<br>
<br>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Variants:</strong>

<select class="form-control"name="kg" required id="">
        <option value="" disabled selected>Variants</option>
        @foreach($variants as $variant)
            <option value="{{ $variant->kg }}"?> {{ $variant->kg}}</option>
        @endforeach
    </select>
   
</div>
</div>

<br>
<br>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong> Choose Price:</strong>
<select class="form-control"name="price" required id="">
        <option value="" disabled selected>Price</option>
        @foreach($price as $prices)
            <option value="{{ $prices->price }}"?> {{ $prices->price}}</option>
        @endforeach
    </select>
</div>
</div>
<br>
<br>
<br>
<br>
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
