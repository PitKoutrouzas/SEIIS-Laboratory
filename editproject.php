<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php 
        $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
        mysqli_select_db($con, "project3");
        $id = $_POST["id"];  
       $title = $_POST["title"];
            $aim= $_POST["Descr"];
            $partners = $_POST["partners"];
            $startdate = $_POST["startdate"];
            $enddate = $_POST["enddate"];
            $cutbudget=$_POST["cutbudget"];
            $totalbudget=$_POST["totalbudget"];
            $website = $_POST["website"];
            $category = $_POST["category"];
            $type = $_POST["type"];
          $date1 = new DateTime($startdate);
            $date2 = new DateTime($enddate);
            $interval = $date1->diff($date2);
            $duration = $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
            $updated_on = date('Y-m-d H:i:s');
          $personname = $_COOKIE["signedin"];
            
            $resultid = mysqli_query($con,"select * from userss where username='$personname'");
            $rowid = mysqli_fetch_array($resultid);
            $creator=$rowid["memberID"];
        
      $result= mysqli_query($con,"update projects set title='$title', aim='$aim', startdate='$startdate', enddate='$enddate',duration='$duration',"
              . " cutbudget='$cutbudget', totalbudget='$totalbudget', website='$website', creator='$creator', category='$category',"
              . " type='$type', updated_on='$updated_on' where projectID='$id'");
        
        if(mysqli_affected_rows($con)>0)
        {
            ?>
        <meta http-equiv="refresh" content="0.5;url=projects.php"/>
        <?php
        }
        else
        {
            echo "Update failed";
            ?>
        <meta http-equiv="refresh" content="0.5;url=projects.php"/>
        <?php
        }
        mysqli_close($con);
        
        ?>
    </body>
</html>
