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
        
        $result = mysqli_query($con,"select type from publications where publicationID='$id'");
        $row = mysqli_fetch_array($result);
        $type = $row["type"];
        
        mysqli_query($con,"delete from publications where publicationID='$id'");
        
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
            echo "Delete failed";
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

