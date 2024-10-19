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
                input {
                    /*  Тут можно написать комментарий */
                    width: 160px;
                    margin: 10px;
                    text-align: center;
                }
                button {
                    width: 70px;
                    margin: 2px;  
                }

                .calculator {
                    border: solid rgb(61, 90, 114);
                    width: 180px;
                    padding: 10px;
                    text-align: center;
                    background-color: lightblue;
                }
                .pressed {
                    background-color:lightgreen;
                }

            img{
                height: 200px;
                margin: 10px;
            }

            </style>
            
    </head>
    <body>
        <h1>Calculator</h1>
        <div>This is unique CLASSIC calculator. Try it!</div>
        <?php
         
         if(isset($_REQUEST["txtX"])) {
            $error = false; 
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
            // -- Результат для деления сохраняется не корректно из-за типа данных поля БД Result --
            if(isset($_REQUEST["division"])) {
                if($y != 0) {
                    $z = $x / $y;
                    $operation = "division";
                } else {
                    $z = "На 0 делить нельзя!";
                    $error = true;
                }
                
            }
               
            if($error != true) {
                $user = $_SESSION["user"];

                $sql = "
                INSERT INTO calcs(UserName, Operation, Number1, Number2, Result) 
                VALUES ('$user','$operation', $x, $y, $z)
                ";
                
                $conn = mysqli_connect("localhost", "root", "", "calc");
                $result = mysqli_query($conn, $sql);
                mysqli_close($conn);  
            } 
         } else {
            $x = ""; $y = ""; $z = "";
            $error = false; 
         }
            
        ?>
        <div class="calculator">
            <form>
                <input name="txtX" placeholder="Input 1 number" value="<?=$x?>"/> 
                <input name="txtY" placeholder="Input 2 number" value="<?=$y?>"/>
                <div class="button">
                    <button name="plus">+</button> 
                    <button name="minus">-</button>
                    <button name="multiplication">*</button>
                    <!-- Результат для деления сохраняется не корректно из-за типа данных поля БД Result -->
                    <button name="division">/</button>  
                </div>
                <input name="txtZ" placeholder="Result" value="<?=$z?>"/>
            </form>
            
        </div>

    </body>
</html>