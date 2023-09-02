<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Conversor de Moedas</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="din">Quantos R$ você quer converter?</label>
            <input type="number" name="din" id="din">
            <input type="submit" value="Converter">
        </form>
    </main>
</body>
</html>