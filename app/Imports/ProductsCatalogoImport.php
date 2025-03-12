<?php
namespace App\Imports;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Line;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ProductsCatalogoImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $brand = Brand::where('name', $row[0])->first();
        if (! $brand) {
            $brand = Brand::create([
                'code' => $row[0],
                'name' => $row[0],
            ]);
        }
        $category = Category::where('name', $row[1])->first();
        if (! $category) {
            $category = Category::create([
                'code' => $row[1],
                'name' => $row[1],
            ]);
        }
        $line = Line::where('name', $row[2])->first();
        if (! $line) {
            $line = Line::create([
                'code' => $row[2],
                'name' => $row[2],
                'logo' => '',
                'fondo' => '',
                'firma_autorizacion' => '',
                'fondo_autorizacion' => '',
                'fondo_rotulo' => '',
                'archivo' => '',
            ]);
        }
        return new Product([
            'brand_id'      => Brand::where('name', $row[0])->pluck('id')->first(),
            'category_id'   => Category::where('name', $row[1])->pluck('id')->first(),
            'line_id'       => Line::where('name', $row[2])->pluck('id')->first(),
            'code'          => $row[3],
            'code_fabrica'  => $row[4],
            'code_peru'     => $row[5],
            'price_compra'  => $row[6],
            'price_venta'   => $row[7],
            'porcentaje'    => 0,
            'stock'         => $row[8],
            'dias_entrega'  => 0,
            'description'   => $row[9],
            'tipo'          => '',
            'color'         => '',
            'garantia'      => '',
            'observaciones' => '',
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
