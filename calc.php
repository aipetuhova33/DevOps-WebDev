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
            <script>
                function plus(){
                   var x,y,z;
                   x = parseInt(document.getElementById("txtX").value);
                   y = parseInt(document.getElementById("txtY").value);
                   z = x + y;
                   document.getElementById("txtZ").value = z;
                //    document.getElementById("buttonPlus").className = "pressed";
                //    document.getElementById("buttonMinus").className = "";
                   document.getElementById("buttonPlus").classList.add("pressed");
                   document.getElementById("buttonMinus").classList.remove("pressed");

                }
                function minus(){
                   var x,y,z;
                   x = parseInt(document.getElementById("txtX").value);
                   y = parseInt(document.getElementById("txtY").value);
                   z = x - y;
                   document.getElementById("txtZ").value = z;
                   document.getElementById("buttonMinus").classList.add("pressed");
                   document.getElementById("buttonPlus").classList.remove("pressed");
                }
                

            </script>
    </head>
    <body>
        <!-- Тут можно написать комментарий-->
        <h1>Calculator</h1>
        <div>This is unique calculator. Try it!</div>
        <div class="calculator">
            <input id="txtX" placeholder="Input 1 number"/> 
            <input id="txtY" placeholder="Input 2 number"/>
            <div class="button">
                <button id="buttonPlus" onclick="plus();">+</button> 
                <button id="buttonMinus" onclick="minus();">-</button> 
            </div>
            <input id="txtZ" placeholder="Result"/>
        </div>

        <img src="images/morning.jpg">

    </body>
</html>