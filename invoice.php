<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Счет</title>

    <style>
        td {
            border: thin solid black;
            padding: 3px;
        }
        info {
            color: blueviolet;
            margin-bottom: 200px;
            font-size: 20px;
        }
    </style>

</head>
<body> 
    <h1>Счет за ваши вычисления</h1>
    <a href="home_.html">Вернуться на Главную</a> <br /><br />
    <table>
        <tr>
            <th>Время</th>
            <th>x</th>
            <th>y</th>
            <th>Операция</th>
            <th>Результат</th>
        </tr>
        <?php 
            session_start();
            $user = $_SESSION["user"];
            
            $conn = mysqli_connect("localhost", "root", "", "calc");
            
            $all_count_sql = "SELECT COUNT(*) FROM calcs WHERE UserName='$user' AND Result IS NOT NULL";
            $all_count_result_sql = mysqli_query($conn, $all_count_sql);
            if ($all_count_result_sql) {
                $row = mysqli_fetch_all($all_count_result_sql); // Извлекаем результат в виде массива
                $count = $row[0][0]; // Достаем значение по ключу 'count'
                echo("<info>$user, Вы выполнили $count вычислений</info>");
            } else {
                echo "Ошибка в запросе: " . mysqli_error($conn); // Отображаем ошибку, если запрос не удался
            }


            $sql = "SELECT * FROM calcs WHERE UserName='$user' ORDER BY Timestamp DESC ";
            $result = mysqli_query($conn, $sql);
            $calcs = mysqli_fetch_all($result);
            //var_dump($calcs);
            
            for($i=0; $i < count($calcs); $i++) {
                $calc = $calcs[$i];
                echo("
                    <tr>
                        <td>$calc[2]</td>
                        <td>$calc[4]</td>
                        <td>$calc[5]</td>
                        <td>$calc[3]</td>
                        <td>$calc[6]</td>
                    </tr>
                ");
            }

            mysqli_close($conn);
        ?>
    </table>
    
</body>
</html>