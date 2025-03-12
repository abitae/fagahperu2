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
            background-image: url("{{ convertImageBase64($line->fondo_autorizacion) }}");
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
            top: 720px;
            left: 330px;
            width: 200px;
            font-size: 14px;
        }

        .title {
            margin-top: 150px;
            margin-left: -80px;
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
            margin-top: 40px;
            margin-left: 30px;
            font-size: 15px;
            line-height: 20%;
            text-align: justify;
            width: 650px;

            page-break-after: auto;
        }

        .saludo {
            margin-top: 0px;
            margin-left: 30px;
            font-size: 13px;
            text-align: justify;
            width: 620px;
            line-height: 150%;
        }

        br {
            display: none;
        }

        n {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="content">
        <img class="logo" src="{{ convertImageBase64($line->firma_autorizacion) }}" alt="">
        <div class="title">
            <h2>AUTORIZACIÓN DE DISTRIBUIDOR OFICIAL</h2>
        </div>
        <div class="fecha">
            Lima, {{ $fecha }}
        </div>
        <div class="customer">
            <p>
                <n>Señor(es):</n> {{ $customer->first_name }}
            </p>
            <p>
                <n>{{ strtoupper($customer->type_code) }}:</n> {{ $customer->code }}
            </p>

        </div>
        <div class="saludo">
            <p>{{ $cuerpo ?? '' }}</p>
            <p>
                Por medio de la presente, {{ $line->name }},
                identificada con RUC 20609446367 y con domicilio fiscal en PJ. Llerena Nro. 170, Huancayo,
                Junín, representada legalmente por la Sra. Flor Soraida Romani Pérez, con DNI [DNI de la
                representante], tiene el gusto de anunciar que {{ $customer->first_name }} , con {{ strtoupper($customer->type_code) }}
                {{ $customer->code }}, ha sido seleccionado como Distribuidor Oficial de nuestros
                productos {{ $line->name }}.
            </p>
            <p>
                Esta designación les autoriza a la comercialización de nuestros productos dentro del Catálogo
                Electrónico de Mobiliario en General del Acuerdo Marco EXT-CE-2023-11.
            </p>
            <p>
                Confiamos en que esta autorización contribuirá al fortalecimiento de la relación comercial entre
                ambas partes y permitirá una expansión exitosa de nuestros productos en el mercado. Estamos
                seguros de que, mediante un trabajo conjunto, lograremos alcanzar los objetivos propuestos y
                satisfacer las expectativas de nuestros clientes.
            </p>
            <p>
                Nos mantenemos atentos a cualquier necesidad que pueda surgir en el desarrollo de esta
                importante tarea.
            </p>
        </div>

    </div>
</body>

</html>
