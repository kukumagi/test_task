
<div class="card bg-primary text-white mb-3">
    <div class="card-header">
        <h5 class="card-title">Product: {{ $product->name }}</h5>
    </div>
    <div class="card-body">
        
        <div class="product-details">
            <p><strong>SKU:</strong> {{ $product->sku }}</p>
            <p><strong>Name:</strong> {{ $product->name }}</p>
            <p><strong>Group:</strong> {{ $product->group }}</p>
            <p><strong>Expiring at:</strong> {{ isset($product->expiring_at) ? \Illuminate\Support\Carbon::parse($product->expiring_at)->format('Y-m-d') : '' }}</p>
            <p><strong>Description:</strong> {{ $product->description }}</p>
            <p><strong>Created At:</strong> {{ $product->created_at }}</p>
            <p><strong>Updated At:</strong> {{ $product->updated_at }}</p>
            <div class="actions mt-3">
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
    