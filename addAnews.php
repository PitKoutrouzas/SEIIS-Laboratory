<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        // NewsID start from 3 and its auto-increment
        
        $con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
        mysql_select_db("project3", $con);
        
        $title = $_POST["newsTitle"];
        $description = $_POST["newsDescr"];
        $projectID = 1;
        
        $target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["newsFile"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["newsFile"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["newsFile"]["tmp_name"], $target_file)) {
        echo " ";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$upload=$target_file;

        $result = mysql_query("select newsID as memid from news");
        while ($row = mysql_fetch_array($result))
        {
        $id = $row["memid"];
        }
        
        $id += 1;
        
        mysql_query("insert into news(newsTitle,description,newsUpload,newsID,projectID) values('$title', '$description', '$upload', '$id', '$projectID')");
        
        if(mysql_affected_rows()>0)
        {

            ?>
        <meta http-equiv="refresh" content="0.5;url=News.php?newschange=0"/>
        <?php
        }
        else
        {
            echo "Insert failed";
            ?>
        <meta http-equiv="refresh" content="0.5;url=News.php?newschange=0"/>
        <?php
        }
        mysql_close($con);
        
        
        
        ?>
    </body>
</html>


