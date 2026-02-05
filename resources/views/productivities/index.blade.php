<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Productivities</title>
</head>
<body>

<h1>Productivity Dashboard</h1>

<table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
            <th>Produto</th>
            <th>Produzido</th>
            <th>Defeitos</th>
            <th>Eficiência (%)</th>
            <th>Criado em</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($productivities as $productivity)
            <tr>
                <td>{{ $productivity->product() }}</td>
                <td>{{ $productivity->produced() }}</td>
                <td>{{ $productivity->defects() }}</td>
                <td>{{ $productivity->calculateEffectiveness() }}</td>
                <td>{{ $productivity->createdAt()->format('d/m/Y H:i') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
