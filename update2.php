<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
 <?php
          session_start();
        $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
        mysqli_select_db($con, "seiis");
        
        $id = $_POST["id"];    
        $_SESSION["id"] = $id;
        
        $title = $_POST["title"];
        $description=$_POST["description"];
        $partners=$_POST["partners"];
        $type=$_POST["type"];
        if(isset($_POST["upload"]))
        {
            $upload=$_POST["upload"];
        }
            
            mysqli_query($con, "update publications set title='$title',description='$description',partners='$partners',type='$type' where id='$id'");
            
            echo "Update Succesfull";
            ?>
        <meta http-equiv="refresh" content="2;index.php"/>

        <?php

        mysqli_close($con);
        ?>
    </body>
</html>
