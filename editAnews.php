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
        
        $id = $_POST["newseditID"];
        $title = $_POST["newseditTitle"];
        $description = $_POST["newseditDescr"];
        
//        if (isset($_POST["newseditFile"]))
//        {
        $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["newseditFile"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["newseditFile"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["newseditFile"]["tmp_name"], $target_file)) {
        echo " ";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
        $upload=$target_file; 
        
//    } 
        
        if (isset($upload))
        {
            mysql_query("update news set newsTitle='$title', description='$description', newsUpload='$upload' where newsID='$id'");
        }
        else
        {
            mysql_query("update news set newsTitle='$title', description='$description' where newsID='$id'");
        }
        
        if(mysql_affected_rows()>0)
        {

            ?>
        <meta http-equiv="refresh" content="0.5;url=News.php?newschange=0"/>
        <?php
        }
        else
        {
            echo "Update failed";
            ?>
        <meta http-equiv="refresh" content="0.5;url=News.php?newschange=0"/>
        <?php
        }
        mysql_close($con);
        
        
        
        ?>
    </body>
</html>



