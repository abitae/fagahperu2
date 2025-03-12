<?php

namespace App\Imports;

use App\Models\ProductData;

use Maatwebsite\Excel\Concerns\ToModel;


class ProductsImport implements ToModel
{

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if ($row[39] == "0") {
            return null;
        }
        $porciones = explode(" ", $row[1]);
        
        return new ProductData([
            'cod_acuerdo_marco'     => $porciones[0],
            'ruc_proveedor'    => $row[2],
            'razon_proveedor' => $row[3],
            'ruc_entidad' => $row[4],
            'razon_entidad' => $row[5],
            'unidad_ejecutora' => $row[6],
            'procedimiento' => $row[7],
            'tipo' => $row[8],
            'orden_electronica' => $row[9],
            'estado_orden_electronica' => $row[10],
            'link_documento' => $row[11],
            'total_entrega' => $row[12],
            'num_doc_estado' => $row[13],
            'orden_fisica' => $row[14],
            'fecha_doc_estado' => $row[15],
            'fecha_estado_oc' => $row[16],
            'sub_total_orden' => $row[17],
            'igv_orden' => $row[18],
            'total_orden' => $row[19],
            'orden_digital_fisica' => $row[20],
            'sustento_fisica' => $row[21],
            'fecha_publicacion' => \Carbon\Carbon::createFromFormat('d/m/Y', $row[24])->format('Y-m-d'),
            'fecha_aceptacion' => \Carbon\Carbon::createFromFormat('d/m/Y', $row[25])->format('Y-m-d'),
            'usuario_create_oc' => $row[27],
            'acuerdo_marco' => $row[28],
            'ubigeo_proveedor' => $row[29],
            'direccion_proveedor' => $row[30],
            'monto_documento_estado' => $row[31],
            'catalogo' => $row[32],
            'categoria' => $row[33],
            'descripcion_ficha_producto' => $row[34],
            'marca_ficha_producto' => $row[35],
            'numero_parte' => $row[36],
            'link_ficha_producto' => $row[37],
            'monto_flete' => $row[38],
            'numero_entrega' => $row[39],
            'fecha_inicio' => \Carbon\Carbon::createFromFormat('d/m/Y', $row[40])->format('Y-m-d'),
            'plazo_entrega' => $row[41],
            'fecha_fin' => \Carbon\Carbon::createFromFormat('d/m/Y', $row[42])->format('Y-m-d'),
            'cantidad' => $row[48],
            'entrega_afecto_igv' => $row[49],
            'precio_unitario' => $row[50],
            'sub_total' => $row[51],
            'igv_entrega' => $row[52],
            'total_monto' => $row[53],
        ]);
    }

}
