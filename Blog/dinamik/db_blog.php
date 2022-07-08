<?php

$db_host="localhost";
$db_user="root";
$db_password="";
$db_data="blog";

//bağlantı cümleci
$conn = mysqli_connect($db_host,$db_user,$db_password,$db_data);
$conn->set_charset("utf8");
//bağlantı olup olamadığını bir koşul ile sağladım
if (!$conn) {
    die("bağlantı başarısız: " . mysqli_connect_error());
  }

?>