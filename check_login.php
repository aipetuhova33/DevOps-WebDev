<?php
    $user = $_REQUEST["user"];
    $pwd = $_REQUEST["pwd"];
    $hash = hash("sha256",$pwd);

    $valid_hash = "8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92";

    // if (hash("sha256",$pwd) == $valid_hash) {
    //     echo ("<h1>Hello, $user!</h1>");
    // } 
    // else {
    //     echo ("<h1>Неверные данные</h1>");
    // }
    
    $sql = "SELECT * FROM `logins` 
        WHERE UserName='$user' 
        and PwdHash='$hash' ";

    $conn = mysqli_connect("localhost","root","","calc");
    $result = mysqli_query($conn, $sql);
    if ( count(mysqli_fetch_all($result)) == 1) {
        echo ("<h1>Hello, $user!</h1>");
    }
    else {
         echo ("<h1>Неверные данные</h1>");
    }
    //var_dump(count(mysqli_fetch_all($result)));

    mysqli_close($conn);
