<?php

$sql = "
INSERT INTO calcs(UserName, Operation, Number1, Number2, Result) 
VALUES ('Dasha','minus',111,100,11)
";

$conn = mysqli_connect("localhost", "root", "", "calc");
$result = mysqli_query($conn, $sql);
mysqli_close($conn);