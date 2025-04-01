<div class="card card-body bg-info text-white">
        <div class="mb-3">
            <label for="filterSKU" class="form-label">Product code</label>
            <input type="text" class="form-control" id="filterSKU" name="sku" value="{{ request('sku') }}">
        </div>
        <div class="mb-3">
            <label for="filterName" class="form-label">Product name</label>
            <input type="text" class="form-control" id="filterName" name="name" value="{{ request('name') }}">
        </div>
        <div class="mb-3">
            <label for="filterGroup" class="form-label">Product group</label>
            <select class="form-select" id="filterGroup" name="group">
                <option value="">All Groups</option>
                @foreach($groups as $group)
                    <option value="{{ $group }}" {{ request('group') == $group ? 'selected' : '' }}>
                        {{ $group }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="filterExpireAt" class="form-label">Expiring at</label>
            <input type="date" class="form-control" id="filterExpireAt" name="expiring_at" value="{{ request('expiring_at') }}">
        </div>
        <button type="submit" class="btn btn-primary">Apply Filters</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Reset Filters</a>
</div>