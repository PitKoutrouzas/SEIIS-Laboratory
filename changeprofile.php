<?php
$fname = $_POST["prof_fname"];
$sname = $_POST["prof_sname"];
$email = $_POST["prof_email"];

$personname = $_COOKIE["signedin"];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["prof_file"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["prof_file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    /*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["prof_file"]["tmp_name"], $target_file)) {
        echo " ";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

        $upload=$target_file;

$con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
   mysql_select_db("project3", $con);
   
   if (isset($upload)) {
   mysql_query("update userss set memberName='$fname', memberSurname='$sname', email='$email', image='$upload' where username='$personname'");
   }
   else
   {
   mysql_query("update userss set memberName='$fname', memberSurname='$sname', email='$email' where username='$personname'");    
   }
   if(mysql_affected_rows()>0)
        {
            echo "Update succesful";
            ?>
        <meta http-equiv="refresh" content="0.5;url=profile.php"/>
        <?php
        }
        else
        {
            echo "Update failed";
            ?>
        <meta http-equiv="refresh" content="0.5;url=profile.php"/>
        <?php
        }
        mysql_close($con);



?>
