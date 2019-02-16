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
            $aim= $_POST["aim"];
            $partners = $_POST["partners"];
            
            if (isset($_POST["startdate"]))
            {
            $startdate = $_POST["startdate"];  // ta relevant publications (parolo pou grafi startdate)
            $arr_length = count($startdate);
            }
            else
            {
                $startdate = 0;
                $arr_length = 0;
            }

            $personname = $_COOKIE["signedin"];
            
            $resultid = mysqli_query($con,"select * from userss where username='$personname'");
            $rowid = mysqli_fetch_array($resultid);
            $creator=$rowid["memberID"];
            
            $result=mysqli_query($con,"select MAX(researchareaID) from researchareas");
            
             while ($row = mysqli_fetch_array($result)) {
                  $countIds=$row['MAX(researchareaID)']+1;

            $result1=mysqli_query($con, "insert into researchareas values('$countIds', 1 , '$title', '$partners',0,'$creator', '$aim')");
            
                        for ($i=1; $i<=$arr_length; $i++)
            {
                            $prwto = $startdate[$i-1];
            $result2=mysqli_query($con, "insert into respub values('$countIds', '$prwto', '$i')");
            }
            
}
            if (mysqli_affected_rows($con) > 0) {
                if ($partners == 'Software Engineering')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=practisera.php?reschange=1"/>
                <?php
                }
                else
                { echo "Insert failed";
                ?>
                <meta http-equiv="refresh" content="2;url=practisera.php?reschange=2"/>
                <?php  
                }
            } 
            else {
                if ($partners == 'Software Engineering')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=practisera.php?reschange=1"/>
                <?php
                }
                else
                { echo "Insert failed";
                ?>
                <meta http-equiv="refresh" content="2;url=practisera.php?reschange=2"/>
                <?php  
                }
            } 
        ?>
    </body>
</html>
