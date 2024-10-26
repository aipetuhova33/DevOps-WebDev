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

            <script>
                function plus(){
                    var url = "api/calc_service.php?txtX="
                                + document.getElementById("txtX").value
                                + "&txtY= "
                                + document.getElementById("txtY").value 
                                + "&plus=&txtZ=";
                    
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", url, true);
                    xhr.onload =function(){
                        var result = xhr.responseText;
                        //alert(result);
                        document.getElementById("txtZ").value = result;
                    }
                    document.getElementById("txtZ").value = "WAIT...";
                    xhr.send();  
                }
                function minus(){
                    var url = "api/calc_service.php?txtX="
                                + document.getElementById("txtX").value
                                + "&txtY= "
                                + document.getElementById("txtY").value 
                                + "&minus=&txtZ=";
                    
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", url, true);
                    xhr.onload =function(){
                        var result = xhr.responseText;
                        //alert(result);
                        document.getElementById("txtZ").value = result;
                    }
                    document.getElementById("txtZ").value = "WAIT...";
                    xhr.send();  
                }
                function multiplication(){
                    var url = "api/calc_service.php?txtX="
                                + document.getElementById("txtX").value
                                + "&txtY= "
                                + document.getElementById("txtY").value 
                                + "&multiplication=&txtZ=";
                    
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", url, true);
                    xhr.onload =function(){
                        var result = xhr.responseText;
                        //alert(result);
                        document.getElementById("txtZ").value = result;
                    }
                    document.getElementById("txtZ").value = "WAIT...";
                    xhr.send();  
                }

            </script>
            
    </head>
    <body>
        <h1>Calculator with AJAX</h1>
        <div>This is unique MODERN calculator with AJAX. Try it!</div>

        <div class="calculator">
                <input id="txtX" placeholder="Input 1 number" autocomplete="off"/> 
                <input id="txtY" placeholder="Input 2 number" autocomplete="off"/>
                <div class="button">
                    <button id="plus" onclick="plus();">+</button> 
                    <button id="minus" onclick="minus();">-</button>
                    <button id="multiplication" onclick="multiplication();">*</button>
                </div>
                <input id="txtZ" />
        </div>

        <textarea>
            
        </textarea>

    </body>
</html>