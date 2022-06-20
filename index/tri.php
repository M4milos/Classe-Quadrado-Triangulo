<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Triângulo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo2.css'>
    <?php
        require "../class/triangulo.class.php";

        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $lado1 = isset($_GET['lado1']) ? $_GET['lado1'] : "";
        $lado2 = isset($_GET['lado2']) ? $_GET['lado2'] : "";
        $base = isset($_GET['base']) ? $_GET['base'] : "";

        // $id,$cor,$tabuleiro,$base,$altura,$lado1,$lado2

        $tri = new Triangulo($id,'Violeta',1,$base,$lado1,$lado2);

        //echo $tri;

            /*echo "Lado: ". $lado. "<br>".
            "Cor: ". $cor;
            */
    ?>
</head>
<body>
    <center>
        <?php   
            include "../menu/menu.php";

            echo $tri;

            echo $tri->desenha();

        ?>
    </center>
    <!-- <div class='container cor'></div> -->

</body>
</html>