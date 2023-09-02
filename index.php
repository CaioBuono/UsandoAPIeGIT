<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de Moedas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $urlApi = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'08-28-2023\'&@dataFinalCotacao=\'09-02-2023\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

        $dadosApi = json_decode(file_get_contents($urlApi), true); // dados do link da api
        // var_dump($dadosApi);
        $cotacaoDolar = $dadosApi["value"][0]["cotacaoCompra"]; // valor do dolar

        $valorReais = $_GET['din'] ?? 0; // valor em reais recebido
    ?>
    <main>
        <h1>Conversor de Moedas</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="din">Quantos R$ você quer converter?</label>
            <input type="number" name="din" id="din" value="<?=$valorReais?>">
            <input type="submit" value="Converter">
        </form>
    </main>
    <section>
        <h2>Resultado da conversão</h2>
        <?php 
            $brMoeda = numfmt_create("pt_BR", NumberFormatter::CURRENCY); // internacionalização de moeda
            $valorConvertido = $valorReais / $cotacaoDolar;

            echo "<p>A quantia de " . numfmt_format_currency($brMoeda, $valorReais, "BRL") . " equivale a <strong>" . numfmt_format_currency($brMoeda, $valorConvertido, "USD") . "</strong></p>"
        ?>
    </section>
</body>
</html>