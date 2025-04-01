@extends('app.page')
   
@section('content')
<h1>Product: {{ $product->name}}</h1>
<div class="row mb-3">
    <div class="col-md-12">
    <a href="{{ route('products.index') }}" class="btn btn-dark">Back to Products</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        @include('products.productCard', ['product' => $product])
    </div>
</div>
@endsection
