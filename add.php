<?php
$connect = mysqli_connect('localhost','root','','person');
   extract($_POST);
$fname=Htmlspecialchars($fname, ENT_QUOTES, 'UTF-8');
$mname=Htmlspecialchars($mname, ENT_QUOTES, 'UTF-8');
$lname=Htmlspecialchars($lname, ENT_QUOTES, 'UTF-8');
$id=Htmlspecialchars($id, ENT_QUOTES, 'UTF-8');

   $addQ = "INSERT into info (fname , id , mname , lname) VALUES ( '$fname' , $id, '$mname' , '$lname')";
   $addR = mysqli_query($connect, $addQ);
   echo "<h2>[", mysqli_affected_rows ($connect),"] the row added ...</h2>";     
 ?>