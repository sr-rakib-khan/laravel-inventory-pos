<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'category_id' => $row[0],
            'brand_id' => $row[1],
            'Product_name' => $row[2],
            'unit' => $row[3],
            'purchase_price' => $row[4],
            'selling_price' => $row[5],
            'warehouse' => $row[6],
            'storage_spot' => $row[7],
            'min_qty' => $row[8],
            'qty' => $row[9],
            'reorder_lavel' => $row[10],
            'description' => $row[11],
            'supplier' => $row[12],
            'status' => $row[13],
            'photo' => $row[14],
            'sku' => $row[15]
        ]);
    }
}
