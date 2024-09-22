<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo</title>
    <style>
        h1,h2,h3 {
            font-family: "Gill Sans", sans-serif;
            width: 50%;
            text-align: center;
            border-radius: 10px;
        }
        .morning {
            background-color: aquamarine;
            color: green;
        }
        .afternoon {
            background-color: bisque;
            color: darkred;
        }
        .evening {
            background-color:skyblue;
            color:blue
        }
        .night {
            background-color: black;
            color: white;
        }
        img {
            display: grid;
            place-items: center;
            width: 50%; 
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <h1>Привет от PHP</h1>
    <?php
    // -- Вывод текста на страницу --
        // $x = 2;
        // $y = 2;
        // $z = $x + $y;
        // echo "$x + $y = $z";

        //date_default_timezone_set("Europe/Moscow");
        date_default_timezone_set("America/Cuiaba");
        //date_default_timezone_set("Asia/Singapore");
        //date_default_timezone_set("America/Adak");

        $now = date("H:i:s");
        echo ("<h2>Время открытия страницы: $now</h2>");

        $hour = date("H");
        if ($hour < 6) {
            echo ("<h3 class='night'>Доброй ночи!</h3>");
            echo ("<img src='images/night.jpg'>");
        } 
        if (6 <= $hour and $hour < 12) {
            echo ("<h3 class='morning'>Доброе утро!</h3>");
            echo ("<img src='images/morning.jpg'>");
        } 
        if (12 <= $hour and $hour < 19) {
            echo ("<h3 class='afternoon'>Добрый день!</h3>");
            echo ("<img src='images/afternoon.jpg'>");
        } 
        if ($hour >= 19) {
            echo ("<h3 class='evening'>Добрый вечер!</h3>");
            echo ("<img src='images/evening.jpg'>");
        } 
        
    ?>

</body>
</html>