<?php
    require 'vendor/autoload.php';
    use Carbon\Carbon;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prestações a Pagar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-dark">

<h1 class="text-center text-white mt-5">Plano Pagamento</h1>



<?php
    $credito = 1000;
    $numPrest = 6;
    $valorPrestMensal = $credito/$numPrest;
    $despesa = 20;
?>
<div class="my-5">
    <h5 class="container "> Valor a contrair: € <?= $credito; ?> </h5>
    <h5 class="container"> Numero de Prestações: <?= $numPrest; ?> </h5>
    <h5 class="container"> Data do Emprestimo: <?= Carbon::now()->format('d-m-Y'); ?> </h5>
</div>

<?php
    for  ($i=0; $i < $numPrest; $i++)
    {
        $dataInicial = Carbon::now();
        $planoPagamento [$i] [0] = $dataInicial -> addMonths($i) -> format('d/m/Y');

        if ($i == 0)
        {
            $planoPagamento [$i] [1] = number_format($valorPrestMensal + $despesa ,2);
        }
        else {
            $planoPagamento [$i] [1] = number_format($valorPrestMensal ,2);
        }

        $credito -= $valorPrestMensal;
        //              ou
        // $credito = $credito - $valorPrestMensal;
        $planoPagamento [$i] [2] = round($credito,2);
        //              ou
        // $planoPagamento [i] [2] = number_format($credito, 2);
    }


?>

<div class="col-md-6 my-5 mx-auto d-block ">
<table class="table table-bordered">
    <thead>
    <tr class="text-center">
        <th scope="col">Nº Prestacoes</th>
        <th scope="col">Data</th>
        <th scope="col">Valor Prestacao</th>
        <th scope="col">Valor em Dívida</th>
    </tr>
    </thead>
    <tbody class="table-group-divider">

    <?php
        $totalLinhas = count ($planoPagamento);
        $totalCol = count ($planoPagamento[0]);

        for($linhas = 0; $linhas < $totalLinhas; $linhas++){
            echo "<tr class='text-center'>";
            echo "<td class='text-center'>".$linhas;
            for ($col = 0; $col < 3; $col++ )
            {
                echo "<td class='text-center'>".$planoPagamento[$linhas][$col].'</td>';
            }
        }
    ?>
    </tbody>
</table>
    <p class="text-center">O valor da despesa do crédito é de <?= $despesa?>€ e encontra-se incluída na primeira prestação (<?=Carbon::now () -> format('d-m-Y') ?>).</p>
</div>







<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

</body>
</html>