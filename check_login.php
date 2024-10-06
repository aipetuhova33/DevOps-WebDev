<?php
    session_start();
    
    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];
    $hash = hash('sha256', $pwd);

    //$valid_hash = "8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92";

    // if (hash('sha256', $pwd) == $valid_hash) {
    //     echo("<h1>Hello, $user!</h1>");
    // }
    // else {
    //     echo("<h1>Неверный вход!</h1>");
    // }

    // Ниже ужасные дефекты с точки зрения безопасности

    // Уязвимость SQL Injection
    $sql = "SELECT * FROM logins
            WHERE UserName='$user' 
            and PwdHash='$hash' ";

    // Нарушение приципа наименьших привилегий (root)
    // Слабый пароль
    // Секрет в коде
    $conn = mysqli_connect("localhost", "root", "", "calc");
    $result = mysqli_query($conn, $sql);
    //var_dump( count(mysqli_fetch_all($result)));

    if (count(mysqli_fetch_all($result)) > 0) {
        echo("Привет, $user!");
        $_SESSION["user"] = $user; // выписываем жетон безопасности в виде сесссионной переменной
        echo('<meta http-equiv="refresh" content="1; URL=home_.html" >');
    }
    else {
        echo("Bad login!");
        echo('<meta http-equiv="refresh" content="3; URL=login.html" >');
    }

    mysqli_close($conn);

    