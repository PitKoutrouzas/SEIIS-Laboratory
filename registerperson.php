<?php
session_start();
$con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
        mysql_select_db("project3", $con);
        
        $fname = $_GET["fnameRegister"];
        $sname = $_GET["snameRegister"];
        $email = $_GET["emailRegister"];
        $usr= $_GET["usernameRegister"];
        $pass= $_GET["passRegister"];
        $pass2= $_GET["passRegister2"];
        $newsletter = $_GET["newsletter"];
        
        $result = mysql_query("select MAX(memberID) as memid from userss");
        while ($row = mysql_fetch_array($result))
        {
        $id = $row["memid"] + 1;
        }
        
        $emailresult = mysql_query("select email from userss where email = '$email' ");
        $emailrow = mysql_fetch_array($emailresult);
        
        $usernameresult = mysql_query("select username from userss where username = '$usr' ");
        $usernamerow = mysql_fetch_array($usernameresult);
        
        if(($pass == $pass2) && ($emailrow["email"]!=$email) && ($usernamerow["email"]!=$usr))
        {
        mysql_query("insert into userss(memberName,memberSurname,email,pass,username,memberID,newsletter) values('$fname', '$sname', '$email', '$pass','$usr', '$id', '$newsletter')"); 
        }
        
        
        $result = mysql_query("select MAX(memberID) as memid from userss");
        while ($row = mysql_fetch_array($result))
        {
        $newid = $row["memid"];
        }
        
        if($id < $newid+1)
        {
            echo "<script type='text/javascript'>alert('Register complete!');</script>";
            ?>
        <meta http-equiv="refresh" content="0.5;url=signin.php"/>
        <?php
        }
        else
        {
             echo "<script type='text/javascript'>alert('Register failed! The username or email may have been taken already');</script>";
            ?>
        <meta http-equiv="refresh" content="0.5;url=register.php"/>
        <?php
        }
        mysql_close($con);
        
?>

