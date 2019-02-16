<?php

            $con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
            mysql_select_db("project3", $con);
            
            $description = $_POST["description"];
            
            $result = mysql_query("select * from homepage");
            if (mysql_num_rows($result) == 0)
            {
            mysql_query("insert into homepage(description) values('$description')");    
            }
            else
            {
            mysql_query("update homepage set description='$description'");
            }
            
            if(mysql_affected_rows($con)>0)
        {
            ?>
        <meta http-equiv="refresh" content="0.5;url=index.php"/>
        <?php
        }
        else
        {
            ?>
        <meta http-equiv="refresh" content="0.5;url=index.php"/>
        <?php
        }
        mysql_close($con);
        
        ?>

