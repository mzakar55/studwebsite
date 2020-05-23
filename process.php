
<?php
$connect = mysqli_connect('localhost','root','','person');      
 extract($_POST);
 $newkey = mysqli_real_escape_string($connect,$key);
 $actionQry = "SELECT * FROM info WHERE id ='$newkey' OR fname = '$newkey' ";
 $actionQryR = mysqli_query($connect,$actionQry);
  if($actionQryR === FALSE){
      echo "bad database action ... <br/> ". mysqli_error($connect);             
      die();
       }  
    
while($actionRow=mysqli_fetch_assoc($actionQryR)){
  
if(isset($add)){
      addNew();
    }
  else if(isset($update)){
      
      displayResult($actionRow['id'],$actionRow['fname'],$actionRow['mname'],$actionRow['lname']);
      updateFun($actionRow['id']);

  } else if(isset($display)){

    echo"<h2> SELECT: $key </h2>";
    displayResult($actionRow['id'],
        $actionRow['fname'], $actionRow['mname'],   $actionRow['lname']);
}
    
}

function displayResult($id,$fn,$mn,$ln){
     echo "<table border=\"1\"><thead>
     <tr><th>id</th><th>fname</th>
     <th>mname</th><th>lname</th></tr>
               </thead><tbody><tr><td> $id</td><td>
                $fn</td><td> $mn </td><td> $ln
                </td></tr></tbody></table>"; 
 }


function addNew(){
     echo "<form method='post' action='add.php'>
       <p> <label>first name:</label> 
        <input name=\"fname\" type=\"text\"/>
        </p> <p> <label>id:</label> 
        <input name='id' type=\"text\"/>
        </p><p> <label>mid name:</label> 
        <input name=\"mname\" type=\"text\"/>
        </p><p> <label>last name:</label> 
        <input name=\"lname\" type=\"text\"/>
        <p> <input name=\"submit\" type=\"submit\" value=\"submit\"/></p>
        </p></form>"; 
 }

 function updateFun($id){

     echo  "<br><br><form method='post' action='update.php'> 
                         <input type='hidden' name='key' value='$id'/> 
                         <p>Enter new : </p>
                    <select name ='uf'>
                     <option name = 'fname'> fname</option>
                      <option name = 'mname'> mname</option>
                       <option name = 'lname'> lname</option>
                    </select><input type ='text' name ='newValue'><br>
                    <input type = 'submit' value = 'submit'>
      "; 
 }