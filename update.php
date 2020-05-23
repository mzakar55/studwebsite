<?php 
 extract($_POST);

 $connect = mysqli_connect('localhost','root','','person');
 $newValueIn = mysqli_real_escape_string($connect,$newValue);
$key=Htmlspecialchars($key, ENT_QUOTES, 'UTF-8');

if($uf=='fname'){
	$upQ= "UPDATE info SET fname = '$newValueIn' WHERE id = $key";
	$upR = mysqli_query($connect,$upQ);
	echo "First Name is changed to $newValueIn";
}else if ($uf=='mname'){
	$upQ= "UPDATE info SET mname = '$newValueIn' WHERE id = $key";
	$upR = mysqli_query($connect,$upQ);
	echo "middle name is changed to $newValueIn";
}else if ($uf=='lname'){
	$upQ= "UPDATE info SET lname = '$newValueIn' WHERE id = $key";
	$upR = mysqli_query($connect,$upQ);
	echo "last name is changed to $newValueIn";
}

?>