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
        
        mysqli_query($con,"delete from projects where projectID='$id'");
        
        if(mysqli_affected_rows($con)>0)
        {
            echo "Delete succesful";
            ?>
        <meta http-equiv="refresh" content="0.5;url=projects.php"/>
        <?php
        }
        else
        {
            echo "Delete failed";
            ?>
        <meta http-equiv="refresh" content="0.5;url=projects.php"/>
        <?php
        }
        mysqli_close($con);
        
        ?>
    </body>
</html>
