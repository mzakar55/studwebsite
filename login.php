<?php  

$connect = mysqli_connect('localhost','root','','person');      
 extract($_POST);
 $newUName = mysqli_real_escape_string($connect,$uname);
 $newUpw = mysqli_real_escape_string($connect,$upw);
$lQry = "SELECT * FROM paswrd WHERE uName ='$uname'";
 $lQryR = mysqli_query($connect,$lQry);
 $lRow=mysqli_fetch_assoc($lQryR);
  if($lQryR === FALSE){ 
     echo "could not verify login information ... <br/> ". mysqli_error($connect);   
     die();}  
  if( (strcmp($lRow['uName'],$uname) ==0) and (strcmp($lRow['upassW'],$upw) ==0)){	?>

  <h2> Your action  by fname or id: </h2>
  <form method="post" action="process.php"> <table border="1"> <tbody>
  <tr><td>ID / Fname :<input type="text" name = "key" /></td>
          <td><input type="submit" name="display" value="display"/></td>

      <td><input type="submit" name="add" value="add"/></td>
  <td><input type="submit" name="update" value="update"/></td>

  <td><input type="Reset" value="Cancel"/></td></tr></tbody></table></form>
<?php           
} else {     echo"<br/> bad login  ...";	} 
?>
