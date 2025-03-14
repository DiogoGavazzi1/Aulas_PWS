<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
$capitulo1 = 'Capitulo 1';
$capitulo2 = 'Capitulo 2';
$capitulo3 = 'Capitulo 3';
$titulo = 'Indice';
$versao = '1.0';
?>

<!-- tmb se pode usar = em vez de ?php apenas quando teos um ecbo e mais codigo nenhum -->

<h1><?php echo "$titulo"?></h1>
<h1><?php echo "$versao"?></h1>

<?php
$protocolo = 'https://';
$dominio = 'www.ipleiria.pt';
$caminho = '/estudar/cursos/tesp/';

$url_completa = $protocolo . $dominio . $caminho;
echo $url_completa;
?>

<p>Visite a página: <a href="<?php echo $url_completa; ?>" target="_blank">Clique aqui</a></p>

</body>
</html>