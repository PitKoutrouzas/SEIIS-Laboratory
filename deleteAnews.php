<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        $con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
        mysql_select_db("project3", $con);
        
        $id = $_POST["newsdeleteID"];
        
        mysql_query("delete from news where newsID='$id'");
        
        if(mysql_affected_rows()>0)
        {
            
            ?>
        <meta http-equiv="refresh" content="0.5;url=News.php?newschange=0"/>
        <?php
        }
        else
        {
            echo "Delete failed";
            ?>
        <meta http-equiv="refresh" content="0.5;url=News.php?newschange=0"/>
        <?php
        }
        mysql_close($con);
        
        
        
        ?>
    </body>
</html>



