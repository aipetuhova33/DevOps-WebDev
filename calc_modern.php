<?php
    session_start();
    if (!isset($_SESSION["user"])) {
        echo('<meta http-equiv="refresh" content="3; URL=login.html">');
        die("You need login to open this page! Вы будете перенеправлены");
    }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
    <style>
    /* Основной фон страницы */
    body {
        background-color: #DDA0DD;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        flex-direction: column; /* Для вертикального центрирования всего контента */
    }

    /* Стиль для заголовка h1 */
    h1 {
        color: #000011;
        text-align: center;
        margin-bottom: 20px;
        font-size: 2vw; /* Размер шрифта зависит от ширины экрана */
    }

    /* Стиль для ссылки a */
    a {
        color: lightcyan;
        text-decoration: none; /* Убираем подчеркивание */
        font-weight: bold;
        margin-top: 20px;
        text-align: center;
        font-size: 1.0vw; /* Размер шрифта зависит от ширины экрана */
    }

    a:hover {
        color: darkblue; /* Цвет ссылки при наведении */
        transform: scale(1.3);
    }

    /* Стиль для текста в div */
    div {
        color: #000044;
        text-align: center;
        font-size: 1.5vw; /* Размер шрифта зависит от ширины экрана */
    }
    text1 {
        color: #000044;
        text-align: center;
        margin: 10px;
        margin-bottom: 30px;
        font-size: 1.5vw; /* Размер шрифта зависит от ширины экрана */
    }

    /* Стиль для .calculator и его центрирование */
    .calculator {
        border: solid #E6E6FA;
        width: 20vw; /* Занимает 30% от ширины экрана */
        height: 20vh; /* Занимает 30% от высоты экрана */
        padding: 2vw;
        text-align: center;
        background-color: #E6E6FA;
        border-radius: 8px;
        transform: scale(1);
        transition: transform 0.3s ease;
    }

    .calculator:hover {
        transform: scale(1.02);
    }

    /* Изменение цвета input при нажатии */
    input {
        width: 80%; /* Занимает 80% от ширины родительского контейнера */
        height: 20%;
        margin: 0.2vw;
        border-radius: 5px;
        text-align: center;
        transition: background-color 0.3s ease;
        font-size: 1.01vw; /* Размер шрифта зависит от ширины экрана */
    }

    input:focus {
        background-color: #F0FFFF;
    }

    /* Стили кнопок */
    button {
        width: 15%; /* Занимает 15% от ширины родительского контейнера */
        height: 5%;
        margin: 0.5vw;
        padding: 1vw;
        border: none;
        border-radius: 20px; /* Овальная форма */
        background-color: #4169E1;
        color: white;
        cursor: pointer;
        transition: transform 0.2s, background-color 0.3s ease;
    }

    button:hover {
        transform: scale(1.1); /* Увеличение при наведении */
        background-color: #DA70D6;
    }
</style>

    <script>
        function plus(){
            var url = "api/calc_service.php?txtX="
                        + document.getElementById("txtX").value
                        + "&txtY="
                        + document.getElementById("txtY").value 
                        + "&plus=&txtZ=";
            
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onload = function(){
                var result = xhr.responseText;
                document.getElementById("txtZ").value = result;
            }
            document.getElementById("txtZ").value = "WAIT...";
            xhr.send();  
        }
        function minus(){
            var url = "api/calc_service.php?txtX="
                        + document.getElementById("txtX").value
                        + "&txtY="
                        + document.getElementById("txtY").value 
                        + "&minus=&txtZ=";
            
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onload = function(){
                var result = xhr.responseText;
                document.getElementById("txtZ").value = result;
            }
            document.getElementById("txtZ").value = "WAIT...";
            xhr.send();  
        }
        function multiplication(){
            var url = "api/calc_service.php?txtX="
                        + document.getElementById("txtX").value
                        + "&txtY="
                        + document.getElementById("txtY").value 
                        + "&multiplication=&txtZ=";
            
            var xhr = new XMLHttpRequest();
            xhr.open("GET", url, true);
            xhr.onload = function(){
                var result = xhr.responseText;
                document.getElementById("txtZ").value = result;
            }
            document.getElementById("txtZ").value = "WAIT...";
            xhr.send();  
        }
    </script>
</head>
<body>
    <h1>Современный калькулятор на AJAX</h1>
    <text1>Вы можете сложить, вычесть или умножить 2 числа</text1>

    <div class="calculator">
        <input id="txtX" placeholder="Введите 1 число" autocomplete="off"/> 
        <input id="txtY" placeholder="Введите 2 число" autocomplete="off"/>
        <div class="button">
            <button id="plus" onclick="plus();">+</button> 
            <button id="minus" onclick="minus();">-</button>
            <button id="multiplication" onclick="multiplication();">*</button>
        </div>
        <input id="txtZ" placeholder="Результат"/>
    </div>
    <a href="home_.html">Вернуться на Главную</a> <br /><br />
</body>
</html>
