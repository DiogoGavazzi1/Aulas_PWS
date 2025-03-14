<?php
require 'vendor/autoload.php';
use Carbon\Carbon;

// Verifica se foi submetido um número de prestações, senão usa um padrão (6)
$numPrest = isset($_POST['numPrest']) ? (int)$_POST['numPrest'] : 6;
$credito = 1000;
$valorPrestMensal = $credito / $numPrest;
$despesa = 20;
?>

    <!DOCTYPE html>
    <html lang="pt">
    <head>
        <meta charset="UTF-8">
        <title>Prestações a Pagar</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body class="bg-dark">

    <h1 class="text-center text-white mt-5">Plano Pagamento</h1>

    <!-- Formulário para selecionar o número de prestações -->
    <div class="container my-4">
        <form method="POST" class="text-center">
            <label for="numPrest" class="text-white">Escolha o número de prestações:</label>
            <select name="numPrest" id="numPrest" class="form-select w-25 d-inline-block">
                <?php
                // Criar opções de 3 a 12 meses
                for ($i = 3; $i <= 12; $i++) {
                    $selected = ($i == $numPrest) ? 'selected' : '';
                    echo "<option value='$i' $selected>$i Prestações</option>";
                }
                ?>
            </select>
            <button type="submit" class="btn btn-primary">Calcular</button>
        </form>
    </div>

    <div class="my-5">
        <h5 class="container text-white">Valor a contrair: € <?= $credito; ?></h5>
        <h5 class="container text-white">Número de Prestações: <?= $numPrest; ?></h5>
        <h5 class="container text-white">Data do Empréstimo: <?= Carbon::now()->format('d-m-Y'); ?></h5>
    </div>

    <?php
    $planoPagamento = [];

    for ($i = 0; $i < $numPrest; $i++) {
        $dataInicial = Carbon::now();
        $planoPagamento[$i][0] = $dataInicial->addMonths($i)->format('d/m/Y');

        if ($i == 0) {
            $planoPagamento[$i][1] = number_format($valorPrestMensal + $despesa, 2);
        } else {
            $planoPagamento[$i][1] = number_format($valorPrestMensal, 2);
        }

        $credito -= $valorPrestMensal;
        $planoPagamento[$i][2] = round($credito, 2);
    }
    ?>

    <div class="col-md-6 my-5 mx-auto d-block">
        <table class="table table-bordered text-white">
            <thead>
            <tr class="text-center">
                <th scope="col">Nº Prestações</th>
                <th scope="col">Data</th>
                <th scope="col">Valor Prestação</th>
                <th scope="col">Valor em Dívida</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php
            foreach ($planoPagamento as $index => $prestacao) {
                echo "<tr class='text-center'>";
                echo "<td class='text-center'>".($index + 1)."</td>";
                echo "<td class='text-center'>{$prestacao[0]}</td>";
                echo "<td class='text-center'>€ {$prestacao[1]}</td>";
                echo "<td class='text-center'>€ {$prestacao[2]}</td>";
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <p class="text-center text-white">
            O valor da despesa do crédito é de <?= $despesa; ?>€ e encontra-se incluído na primeira prestação (<?= Carbon::now()->format('d-m-Y'); ?>).
        </p>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    </body>
    </html>
<?php
