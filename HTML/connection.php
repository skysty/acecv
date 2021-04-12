<?php 
 $db_host = "172.16.0.11:3306";
 $db_user = "ulan";
 $db_pass = "ulan@_2016";
 $db = "nitro";
 
 $conn = mysqli_connect($db_host, $db_user, $db_pass);
 if (mysqli_connect_errno()) {
     printf("Serverde baylanys jok: %s\n", mysqli_connect_error());
 }
     mysqli_select_db($conn,$db);
     mysqli_set_charset($conn, "utf8")
?>