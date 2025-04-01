@extends('app.page')

@section('content')
<h1>Products</h1>
<div class="row mb-3">
    <form name="productFilterForm" method="GET" action="{{ route('products.index') }}">
        <div class="col-md-12">
            <a href="{{ route('products.create') }}" class="btn btn-success">Create Product</a>
            <button class="btn btn-info text-white" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">
                Filter Products
            </button>
            <label for="sort" class="form-label me-2">Sort By:</label>
            <select name="sort" id="sort" class="form-select d-inline-block w-auto" onchange="this.form.submit()">
                <option value="">Select</option>
                <option value="sku_asc" {{ request('sort') == 'sku_asc' ? 'selected' : '' }}>SKU (A-Z)</option>
                <option value="sku_desc" {{ request('sort') == 'sku_desc' ? 'selected' : '' }}>SKU (Z-A)</option>
                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)</option>
                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)</option>
                <option value="expiring_at_asc" {{ request('sort') == 'expiring_at_asc' ? 'selected' : '' }}>Expiring at (ASC)</option>
                <option value="expiring_at_desc" {{ request('sort') == 'expiring_at_desc' ? 'selected' : '' }}>Expiring at (DESC)</option>
            </select>
            <button class="btn btn-primary" type="submit" name="export" value="csv">Export CSV</button>
            <button class="btn btn-secondary" type="submit" name="export" value="excel">Export Excel</button>
        </div>
        <div class="col-md-12">
            <div class="collapse mt-3" id="filterCollapse">
                @include('products.productFilter')
            </div>
        </div>
    </form>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
                @include('products.productCard', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-12">
        <div class="d-flex justify-content-center">
            {{ $products->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection