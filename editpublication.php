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
        $updated_on = date('Y-m-d H:i:s');
        
        $title = $_POST["title"];
        $description=$_POST["Descr"];
        $partners=$_POST["partners"];
        $venue=$_POST["venue"];
       
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
        if(!isset($_POST["type"]))
        {
            $fetchtype = mysqli_query($con, "select type from publications where publicationID = '$id'");
            $row = mysqli_fetch_array($fetchtype);
            $type = $row["type"];
        }
        else
        {
        $type=$_POST["type"];
        }
        
        $personname = $_COOKIE["signedin"];
            
            $resultid = mysqli_query($con,"select * from userss where username='$personname'");
            $rowid = mysqli_fetch_array($resultid);
            $creator=$rowid["memberID"];
            
            if (isset($upload))
        { 
            mysqli_query($con, "update publications set title='$title',description='$description',partners='$partners',upload='$upload' ,type='$type', creator='$creator', updated_on='$updated_on', venue='$venue' where publicationID='$id'");
        } else
        { mysqli_query($con, "update publications set title='$title',description='$description',partners='$partners',type='$type', creator='$creator', updated_on='$updated_on', venue='$venue' where publicationID='$id'");
        }
            
           if(mysqli_affected_rows($con)>0)
        {
            if ($type=='Journals')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=publications.php?pubchange=1"/>
                <?php
                }
                else if ($type=='Conferences')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=publications.php?pubchange=2"/>
                <?php
                }
                else if ($type=='Books')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=publications.php?pubchange=3"/>
                <?php
                }
                else if ($type=='Book Chapters')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=publications.php?pubchange=4"/>
                <?php
                }
                else if ($type=='Editorials')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=publications.php?pubchange=5"/>
                <?php
                }
        }
        else
        {
            echo "Update failed";
            if ($type=='Journals')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=publications.php?pubchange=1"/>
                <?php
                }
                else if ($type=='Conferences')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=publications.php?pubchange=2"/>
                <?php
                }
                else if ($type=='Books')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=publications.php?pubchange=3"/>
                <?php
                }
                else if ($type=='Book Chapters')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=publications.php?pubchange=4"/>
                <?php
                }
                else if ($type=='Editorials')
                {
                ?>
                <meta http-equiv="refresh" content="2;url=publications.php?pubchange=5"/>
                <?php
                }
        }

        mysqli_close($con);
        ?>
    </body>
</html>
