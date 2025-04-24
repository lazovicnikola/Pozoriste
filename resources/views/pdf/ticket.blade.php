<!DOCTYPE html>
<html lang="sr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacija</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: auto;
        }

        .header {
            font-size: 24px;
            font-weight: bold;
        }

        .info {
            margin-top: 20px;
            text-align: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">Potvrda rezervacije</div>
        <div class="info">
            <p><strong>Ime:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Predstava:</strong> {{ $show->title }}</p>
            <p><strong>Vreme:</strong> {{ $show->start_time }} - {{ $show->date }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Red</th>
                    <th>Sedište</th>
                    <th>Vrsta ulaznice</th>
                    <th>Cena (€)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->seat->row }}</td>
                    <td>{{ $reservation->seat->number }}</td>
                    <td>{{ $reservation->type }}</td>
                    <td>{{ number_format($reservation->price, 2) }} €</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <p><strong>Ukupno:</strong> {{ number_format(array_sum(array_column($reservations, 'price')), 2) }} €</p>
        <div class="info">
            <p><strong>Datum rezervacije:</strong> {{ $reservations[0]->reservation_time }}</p>
            <p><strong>Napomena!</strong> <i>Rezervacija vazi samo 24 casa, ukoliko se karta ne preuzme u ovom periodu, rezervacija se odbija</i></p>
        </div>
    </div>
</body>

</html>