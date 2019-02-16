<?php
session_start();
$con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
        mysql_select_db("project3", $con);
        
        $username = $_GET["usernameSignin"];
        $email = $_GET["emailRegister"];
        $pass= $_GET["passRegister"];
        $pass2= $_GET["passRegister2"];
        
        $result = mysql_query("select COUNT(memberID) as memid from userss");
        while ($row = mysql_fetch_array($result))
        {
        $id = $row["memid"];
        }
        if($pass == $pass2)
        {
        mysql_query("update userss set pass='$pass' where email='$email' and username='$username' "); 
        }
        
        if(mysql_affected_rows()>0)
        {
            echo "<script type='text/javascript'>alert('Update succesful');</script>"; 
            ?>
        <meta http-equiv="refresh" content="2;url=signin.php"/>
        <?php
        }
        else
        {
           echo "<script type='text/javascript'>alert('The passwords do not match, or the email and password does not exist in the system!');</script>";
            ?>
        <meta http-equiv="refresh" content="2;url=forgotpassword.php"/>
        <?php
        }
        mysql_close($con);
        
?>

<!--[mail function]
; For Win32 only.
; http://php.net/smtp
SMTP = localhost
; http://php.net/smtp-port
smtp_port = 25

; For Win32 only.
; http://php.net/sendmail-from
;sendmail_from = postmaster@localhost-->