<?php

        $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
        mysqli_select_db($con, "project3");
        
        $usrname = $_POST["usernameSignin"];
        $password = $_POST["passwordSignin"];
        $result = mysqli_query($con,"select * from userss where username='$usrname' and pass='$password'");
        

        while($row = mysqli_fetch_array($result))
            {
            $getusername = $row["username"];
            $getpassword = $row["pass"];
            $gettype = $row["type"];
            }
        if(isset($getusername)&&isset($getpassword)&&isset($gettype)) {
        if(($getusername == $usrname) && ($getpassword == $password) && ($gettype == 0))
        {
            echo "<script type='text/javascript'>alert('You need to be accepted from the administrator!');</script>";
            ?>
        <meta http-equiv="refresh" content="0.5;url=signin.php"/>
        <?php
        }
        else if(($getusername == $usrname) && ($getpassword == $password) && ($gettype > 0))
        {
            setcookie("signedin",$usrname,time()+3600);   // Log in for 1 hour
            setcookie("typein",$gettype,time()+3600);
            ?>
        <meta http-equiv="refresh" content="0.5;url=index.php"/>
        <?php
        } } 
        else
        {
            echo "<script type='text/javascript'>alert('Sign in failed!');</script>";
            ?>
        <meta http-equiv="refresh" content="0.5;url=signin.php"/>
        <?php
        }
        mysqli_close($con);
        
?>



