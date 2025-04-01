@extends('app.page')
   
@section('content')
<div class="row mt-5">
    <div class="col-md-12">
        <div class="card bg-primary text-white">
            <div class="card-header">
                <h5 class="card-title">Edit product</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    @include('products.productFormFields')
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
