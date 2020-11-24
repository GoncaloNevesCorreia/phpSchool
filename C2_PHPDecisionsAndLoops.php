<?php
    $age;
    $classificao;

    if (isset($_POST["calcEscalao"])) {
        if (isset($_POST["age"])) {
            if (!empty($_POST["age"])) {
                $age = round(intval($_POST["age"]));

                if($age <= 6) {
                    $classificao = "Golfinho: até aos 6 anos";
                } elseif ($age <= 10) {
                    $classificao = "Infantil: 7-10 anos";
                } elseif ($age <= 13) {
                    $classificao = "Juvenil: 11-13 anos";
                }elseif ($age <= 17) {
                    $classificao = "Tubarão: 14-17 anos";
                } elseif ($age >= 18) {
                    $classificao = "Cota: maiores de 18 anos";
                }
            }
        }
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Decisions And Loops</title>
</head>
<body>
    <section class="natacao">
        <h1>Classes de natação</h1>
        <form method="post">
            <label for="age">Idade:</label>
            <input id="age" type="text" name="age">
            <input type="submit" name="calcEscalao" value="Calcular Escalão">
        </form>

        <div class="solution">
            <?php 
                if (isset($classificao)) {
                    echo "<p>$classificao</p>";
                }
            ?>
        </div>
    </section>
</body>
</html>