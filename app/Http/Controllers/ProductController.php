<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ProductsExport;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::query();
        if (request('name')) {
            $products = $products->where('name', 'like', '%' . request('name') . '%');
        }
        if (request('sku')) {
            $products = $products->where('sku', 'like', '%' . request('sku') . '%');
        }
        if (request('group')) {
            $products = $products->where('group', request('group'));
        }
        if (request('expiring_at')) {
            $products = $products->where('expiring_at', request('expiring_at'));
        }

        switch (request('sort')) {
            case 'sku_asc':
                $products = $products->orderBy('sku');
                break;
            case 'sku_desc':
                $products = $products->orderByDesc('sku');
                break;
            case 'name_asc':
                $products = $products->orderBy('name');
                break;
            case 'name_desc':
                $products = $products->orderByDesc('name');
                break;
            case 'expiring_at_asc':
                $products = $products->orderBy('expiring_at');
                break;
            case 'expiring_at_desc':
                $products = $products->orderByDesc('expiring_at');
                break;
            
            default:
                // default sorting?
                break;
        }
        if(request('export')) {
            return $this->export($products->get(), request('export'));
        }
        $products = $products->paginate(15);
        $groups = Product::select('group')->distinct()->orderBy('group')->pluck('group');
        return view('products.index', compact('products', 'groups'));
    }

    /**
     * Export products to csv or excel
     */
    public function export($products, $type)
    {
        if ($type === 'csv') {
            $format = 'csv';
        } else if ($type === 'excel') {
            $format = 'xlsx';
        } else {
            return redirect()->route('products.index');
        }
        return Excel::download(new ProductsExport($products), 'products.' . $format);
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'sku' => 'required|unique:products',
            'name' => 'required',
            // 'group' => 'required',
            'expiring_at' => 'required|date',
            // 'description' => 'required',
        ]);
        
        Product::create($request->all());

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'sku' => 'required|unique:products,sku,' . $product->id,
            'name' => 'required',
            'group' => 'required',
            'expiring_at' => 'required|date',
            'description' => 'required',
        ]);

        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }


}
