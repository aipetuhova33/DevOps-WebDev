<?php
    session_start();

    $x = $_REQUEST["txtX"];
    $y = $_REQUEST["txtY"];

    if(isset($_REQUEST["plus"])) {
        $z = $x + $y;
        $operation = "plus";
    }
    if(isset($_REQUEST["minus"])) {
        $z = $x - $y;
        $operation = "minus";
    }
    if(isset($_REQUEST["multiplication"])) {
        $z = $x * $y;
        $operation = "multiplication";
    }

    $user = $_SESSION["user"];

    $sql = "
    INSERT INTO calcs(UserName, Operation, Number1, Number2, Result) 
    VALUES ('$user','$operation', $x, $y, $z)
    ";
    
    $conn = mysqli_connect("localhost", "root", "", "calc");
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn); 

    sleep(1);
    echo($z);
            
?>