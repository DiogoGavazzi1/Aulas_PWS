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
$titulo = "indice";
$capitulo1 = 'capitulo1';
$capitulo2 = 'capitulo2';
$capitulo3 = 'capitulo3';
$versao =  '1.0';
?>

<h1><?php echo "$titulo"  ?></h1>
<h1><?php echo "$versao" ?></h1>

<ul>
    <li><a href="capitulos/capitulo1.php"> capitulo1</a></li>
    <li><a href="capitulos/cap2.php"> capitulo2</a></li>
    <li><a href="capitulos/cap3.php"> capitulo3</a></li>
</ul>

</body>
</html>