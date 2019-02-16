<?php

            $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
            mysqli_select_db($con, "project3");
            
            $address = $_POST["address"];
            $telephone = $_POST["telephone"];
            $email = $_POST["email"];
            $fax = $_POST["fax"];
            
            $result = mysqli_query($con, "select * from contactus");
            if (mysqli_num_rows($result) == 0)
            {
            mysqli_query($con, "insert into contactus(address,telephone,email,fax) values('$address','$telephone','$email','$fax')");    
            }
            else
            {
            mysqli_query($con, "update contactus set address='$address', telephone='$telephone', email='$email', fax='$fax'");
            }
            
            if(mysqli_affected_rows($con)>0)
        {
            ?>
        <meta http-equiv="refresh" content="0.5;url=contactus.php"/>
        <?php
        }
        else
        {
            ?>
        <meta http-equiv="refresh" content="0.5;url=contactus.php"/>
        <?php
        }
        mysqli_close($con);
        
        ?>


