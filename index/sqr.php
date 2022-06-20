<!DOCTYPE html>
<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadrado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../css/estilo2.css'>
    <?php
        require "../class/quadrado.class.php";

        $id = isset($_GET['id']) ? $_GET['id'] : 0;
        $lado = isset($_GET['lado']) ? $_GET['lado'] : "";
        $cor = isset($_GET['cor']) ? $_GET['cor'] : "";
        $idTab = isset($_GET['idTab']) ? $_GET['idTab'] : "";

        $sqr = new Quadrado($id,$lado,$cor,$idTab);

        //echo $sqr;

            /*echo "Lado: ". $lado. "<br>".
            "Cor: ". $cor;
            */
    ?>
</head>
<body>
    <center>
        <?php   
            include "../menu/menu.php";

            echo $sqr;

            echo $sqr->desenha();

        ?>
    </center>
    <!-- <div class='container cor'></div> -->

</body>
</html>