<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ProductsExport implements FromArray
{

    protected $producs;

    public function __construct($producs)
    {
        $this->producs = $producs;
    }

    public function array(): array
    {
        $data = [
            ['SKU', 'Name', 'Group', 'Expiring At', 'Description', 'Created At', 'Updated At'],
        ];

        foreach ($this->producs as $product) {
            $data[] = [
                $product->sku,
                $product->name,
                $product->group,
                $product->expiring_at,
                $product->description,
                $product->created_at,
                $product->updated_at,
            ];
        }

        return $data;
    }
}
