<?php
$con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
            mysql_select_db("project3", $con);
            
if (isset($_POST["actionlistadded"]))
{
  //Einai pinakas gia afto prepei na paroume ksexwrista
  //ton arithmo eggrafwn ston pinaka kai ta id
  //(p.x array[1] = apple)

  $values = $_POST["actionlistadded"];  //oi times tou pinaka
  $counter = count($values);     //o arithmos twn eggrafwn
  $ids = array();
  $nextid = 0;
  
  $result = mysql_query("select memberID from userss where type != 0");
  while ($row = mysql_fetch_array($result))
  {
     $ids[$nextid] = $row["memberID"]; 
     $nextid += 1;
  }
  
  for ($i=0; $i<$counter; $i++)
  {
     mysql_query("update userss set type='$values[$i]' where memberID='$ids[$i]'");
  }
  ?><meta http-equiv="refresh" content="2;url=users.php"><?php
}           
 mysql_close();          
?>

