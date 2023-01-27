@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('products.create') }}"> Create </a>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>
<th>Product Name</th>
<th>variants</th>
<th> price</th>
<th width="280px">Action</th>
</tr>
<?php $i = 0 ?>
@foreach ($products as $product)
<tr>
<td>{{ ++$i }}</td>
<td>{{ $product->name }}</td>
<td>{{ $product->kg }}</td>
<td>{{ $product->price }}</td>
<td>

<a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

</td>
</tr>
@endforeach
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
