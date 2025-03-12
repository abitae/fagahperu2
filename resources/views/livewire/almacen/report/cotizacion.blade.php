@php
    function convertImageBase64($image)
    {
        $pathImage = 'storage/' . $image;
        $arrContextOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];
        $path = $pathImage;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path, false, stream_context_create($arrContextOptions));
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
    function convertImageBase64Product($image)
    {
        $pathImage = './storage/' . $image;
        $arrContextOptions = [
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ];
        $path = $pathImage;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path, false, stream_context_create($arrContextOptions));
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
@endphp
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <style>
        html {
            margin: 0px;
        }

        body {
            height: 1120px;
            width: 794px;
            background-image: url("{{ convertImageBase64($line->fondo) }}");
            background-repeat: no-repeat;
            page-break-after: always;
            margin-top: -5px;
            margin-left: -5px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .content {
            margin-top: 50px;
            margin-left: 50px;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 570px;
            width: 120px;
            font-size: 14px;
        }

        .title {
            margin-top: 100px;
            margin-left: -100px;
            font-size: 14px;
            line-height: 20%;
            text-align: center;
        }

        .fecha {
            position: absolute;
            top: 140px;
            left: 520px;
            font-size: 14px;
            text-align: center;
        }

        .customer {
            margin-top: 0px;
            margin-left: 0px;
            font-size: 13px;
            line-height: 20%;
            text-align: justify;
            width: 650px;
            page-break-after: auto;
        }

        .saludo {
            margin-top: 0px;
            margin-left: 0px;
            font-size: 13px;
            text-align: justify;
            width: 620px;
        }

        br {
            display: none;
        }

        n {
            font-weight: bold;
        }

        .table {
            border: 1px solid #ffffff;
            margin-left: 0px;
            width: 650px;
        }

        .table th {
            padding: 8px;
            padding-top: 12px;
            padding-bottom: 12px;
            font-size: 10px;
            text-align: left;
            background-color: #13065e;
            color: white;
            white-space: nowrap;
        }

        .table td {
            border: 1px solid #ffffff;
            padding: 8px;
            font-size: 9px;
            background-color: #ffffff;
        }

        .table td img {
            width: 100px;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 10;
            width: 100%;
        }

        .footer .condition {
            margin-left: 50px;
            font-size: 9px;
            width: 50%;
        }
    </style>
</head>

<body>
    <div class="content">
        <img class="logo" src="{{ convertImageBase64($line->logo) }}" alt="">
        <div class="title">
            <h2>COTIZACIÓN</h2>
            <h4>N° {{ $num_coti ?? '[CODIGO_COTIZACION]' }}</h4>
        </div>
        <div class="fecha">
            Lima, {{ $fecha }}
        </div>
        <div class="customer">
            <p>
                <n>Señor(es):</n> {{ $customer->first_name }}
            </p>
            <p>
                <n>{{ $customer->type_code }}:</n> {{ $customer->code }}
            </p>
            <p>
                <n>Dirección:</n> {{ $customer->address }}
            </p>
        </div>
        <div class="saludo">
            <p>{{ $cuerpo ?? '' }}</p>
            <p>Agradecemos la oportunidad de servirle y quedamos a su disposición para cualquier consulta o aclaración
                adicional.
            </p>
        </div>
        <div class="table">
            <table>
                <tr>
                    <th>CODIGO</th>
                    <th>DESCRIPCION</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO UNIT.</th>
                    <th>SUB TOTAL</th>
                </tr>
                @forelse ($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>
                            @php
                                $producto = App\Models\Product::where('id', $item->id)->first();
                            @endphp
                            {{ $producto->description }}
                        </td>
                        <td>{{ $item->qty }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->priceTotal }}</td>
                    </tr>
                    <tr>
                        <td colspan="5">
                            @php
                                $producto = App\Models\Product::where('id', $item->id)->first();
                            @endphp
                            @if (file_exists('storage/' . $producto->image))
                                <img src="{{ convertImageBase64Product("$producto->image") }}" alt="">
                            @else
                                No image
                            @endif

                        </td>
                    </tr>
                @empty
                @endforelse

                <tr>
                    <td colspan="5">
                        <hr>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                    <td colspan="2">
                        <n style="color: white"> SUB TOTAL </n>
                    </td>
                    <td colspan="1">
                        S/ {{ round($igv, 2) }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                    <td colspan="2">
                        <n style="color: white"> IGV </n>
                    </td>
                    <td colspan="1">
                        S/ {{ round($sub_total, 2) }}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    </td>
                    <td style="background-color: #13065e;" colspan="2">
                        <n style="color: white"> PRECIO TOTAL INCLUIDO IGV </n>
                    </td>
                    <td colspan="1">
                        S/ {{ $total }}
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <hr>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer">
        <div class="condition">
            <h4>CONDICIONES DE VENTA</h4>
            <ul>
                <li>Forma de pago: {{ $forma_pago ?? 'CONTADO' }}</li>
                <li>Tiempo de entrega: {{ $time_entrega ?? '12 a 14 días' }} </li>
                <li>Validez de la cozación: {{ $valido_coti ?? '3 días' }}</li>
                @isset($mensage01)
                    <li>{{ $mensage01 ?? '' }}</li>
                @endisset
                @isset($mensage02)
                    <li>{{ $mensage02 ?? '' }}</li>
                @endisset
                @isset($mensage03)
                    <li>{{ $mensage03 ?? '' }}</li>
                @endisset
            </ul>
        </div>
    </div>
</body>

</html>
