<?php 
session_start();
include "../connections.php";
$total_que=0;
$real=mysqli_query($link,"select * from questions where category= '$_SESSION[exam_category]'");
$total_que=mysqli_num_rows($real);
echo $total_que;


?>