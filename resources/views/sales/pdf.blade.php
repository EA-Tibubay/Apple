<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Ventas</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        @media print {
            h1 {
                color: #000;
                border-bottom: 2px solid #000;
            }

            th, td {
                border-color: #000;
            }
        }
    </style>
</head>
<body>

<h1>Informe de Ventas</h1>

<table border="1">
    <thead>
        <tr>
            <th>Venta ID</th>
            <th>Fecha de Venta</th>
            <th>Total Amount</th>
            <th>Método de Pago</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                <td>{{ $sale->id }}</td>
                <td>{{ $sale->sale_date }}</td>
                <td>{{ $sale->total_amount }}</td>
                <td>{{ $sale->payment_method }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
