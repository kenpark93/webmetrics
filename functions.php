<?php 

function connect_db($db_param)
{
    $conn = mysqli_connect($db_param["server"], $db_param["user"], $db_param["pass"], $db_param["base"]);
    if ($conn)
      mysqli_set_charset($conn, "utf8");
    return $conn;
}