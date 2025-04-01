<div class="form-group mb-3">
    <label for="code">SKU</label>
    <input type="text" class="form-control form-material" id="sku" name="sku" value="{{ old('sku', $product->sku ?? '') }}" required>
    @error('sku')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}" required>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="group">Group</label>
    <input type="text" class="form-control" id="group" name="group" value="{{ old('group', $product->group ?? '') }}">
    @error('group')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="expiring_at">Expiring at</label>
    <input type="date" class="form-control" id="expiring_at" name="expiring_at" value="{{ old('expiring_at', isset($product->expiring_at) ? \Illuminate\Support\Carbon::parse($product->expiring_at)->format('Y-m-d') : '') }}" required>
    @error('expiring_at')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group mb-3">
    <label for="description">Description</label>
    <textarea class="form-control" id="description" name="description">{{ old('description', $product->description ?? '') }}</textarea>
    @error('description')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
