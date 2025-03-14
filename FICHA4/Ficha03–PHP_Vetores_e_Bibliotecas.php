<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php
$desportos = array('1022'=>'Atletismo', '100'=>'Badminton', '2658'=>'Basquetbol', '5000'=>'Futebol', '1026'=>'Natação');
?>


<label>Selecione um desporto:</label>
<select name="desportos">
    <!-- o nome dentro do select pode ser qualquer coisa nao precisa de ser o mesmo da variavel-->


    <?php
        foreach($desportos as $key => $value)
        {
            echo  '<option value="' . $key . '">' . $value . '(' . $key . ') </option>';
        }
    ?>
</select>

<hr><br>

<form method="post" action="">
    <label for="frutas[]">Escolha as suas frutas favoritas:</label><br><br>
    <input type="checkbox" name="frutas[]" value="morango">Morango<br>
    <input type="checkbox" name="frutas[]" value="laranja">Laranja<br>
    <input type="checkbox" name="frutas[]" value="banana">Banana<br>
    <input type="checkbox" name="frutas[]" value="framboesa">Framboesa<br><br>
    <button type="submit">Submeter</button>
</form>
<br>

<?php
   if(isset($_POST["frutas"])){
       $frutas = $_POST["frutas"];
       $listaFrutas = '';
       foreach($frutas as $fruta)
       {
           if (empty($listaFrutas))
           {
               $listaFrutas .= $fruta;
           }
           else {
               $listaFrutas = $listaFrutas . ', ' . $fruta;
           }
       }
       echo "As suas frutas favoritas são: ". $listaFrutas;
   }
?>


</body>
</html>