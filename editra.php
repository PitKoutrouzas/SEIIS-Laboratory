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
       $title = $_POST["title"];
            $description= $_POST["aim"];
            
            $type = $_POST["partners"];
            if (isset($_POST["startdate"]))
            {
                $values = $_POST["startdate"];
                $counter = count($values);
            }
         $id = $_POST["id"]; 
         
         $_SESSION["id"] = $id;
         $oldcount =0;
         $prevcount = mysqli_query($con,"select COUNT(*) from respub where rid='$id'");
         $row4 = mysqli_fetch_array($prevcount);
         $oldcount = $row4["COUNT(*)"];
         
         $personname = $_COOKIE["signedin"];
            
            $resultid = mysqli_query($con,"select * from userss where username='$personname'");
            $rowid = mysqli_fetch_array($resultid);
            $creator=$rowid["memberID"];
         
        
        mysqli_query($con,"update researchareas set title='$title', description='$description', type='$type',relpub=0, creator='$creator' where researchareaID='$id'");
        $deleting = false;
        
        //UPDATE, INSERT IF MORE, DELETE IF LESS MECHANISM FOR EDIT
        
            $i=0;
            if(!isset($counter))
            {
                $counter =0;
            }
            for($i; $i<$oldcount; $i++)
            {
                if($i < $counter)
                {
                $upcount = $i+1;
                mysqli_query($con,"update respub set pid='$values[$i]' where rid='$id' and counter='$upcount'");
                }
                else
                {
                $deleting = true;
                $maxfetch = mysqli_query($con,"select MAX(counter) from respub where rid='$id'");
                $row5 = mysqli_fetch_array($maxfetch);
                $maxcounter = $row5["MAX(counter)"];
                mysqli_query($con,"delete from respub where rid='$id' and counter='$maxcounter'");  
                }
            }
            
            if (($i >= $oldcount) && ($deleting == false) && ($oldcount != $counter))
            {
                for($j=$i; $j<$counter; $j++)
                {
                    if($oldcount == 0)
                    {
                $oldnewcount = $j+1;
                mysqli_query($con,"insert into respub values('$id','$values[0]', '$oldnewcount')");
                $oldcount +=1;
                    }
                    else
                    {
                $newcount = $j+1;
                mysqli_query($con,"insert into respub values('$id','$values[$j]', '$newcount')");
                    }
                }
            }
            
            // END
        
        
        if(mysqli_affected_rows($con)>0)
        {
            if ($type == 'Software Engineering')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=practisera.php?reschange=1"/>
                <?php
                }
                else
                {
                ?>
                <meta http-equiv="refresh" content="2;url=practisera.php?reschange=2"/>
                <?php  
                }
        }
        else
        {
            echo "<script type='text/javascript'>alert('Update failed');</script>";
            if ($type == 'Software Engineering')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=practisera.php?reschange=1"/>
                <?php
                }
                else
                {
                ?>
                <meta http-equiv="refresh" content="2;url=practisera.php?reschange=2"/>
                <?php  
                }
        }
        mysqli_close($con);
        
        ?>
    </body>
</html>
