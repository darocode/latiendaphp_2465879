<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css" integrity="sha512-T584yQ/tdRR5QwOpfvDfVQUidzfgc2339Lc8uBDtcp/wYu80d7jwBgAxbyMh0a9YM9F8N3tdErpFI8iaGx6x5g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Paises</title>
</head>
<body>
    <h1>Paises de la Region</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Pais</th>
                <th>Capitales</th>
                <th>Moneda</th>
                <th>Poblacion</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>

        </tfoot>
        @foreach($paises as $pais => $infopais )
            <tr>
                <td>
                    {{ $pais }}
                </td>
                <td>
                    {{ $infopais["capital"] }}
                </td>
                <td>
                    {{ $infopais["moneda"] }}
                </td>
                <td>
                    {{ $infopais["poblacion"] }}
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>