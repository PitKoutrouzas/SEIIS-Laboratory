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

        $typequery = mysqli_query($con, "select * from researchareas where researchareaID='$id'");
        $row = mysqli_fetch_array($typequery);
        $type = $row["type"];
        echo $type;

        mysqli_query($con, "delete from researchareas where researchareaID='$id'");
        mysqli_query($con, "delete from respub where rid='$id'");

        if (mysqli_affected_rows($con) > 0) {
            if ($type == 'Software Engineering') {
                echo "Delete succesful";
                ?>
                <meta http-equiv="refresh" content="0.5;url=practisera.php?reschange=1"/>
                <?php
            } else {
                echo "Delete succesful";
                ?>
                <meta http-equiv="refresh" content="0.5;url=practisera.php?reschange=2"/>
                <?php
            }
        } else {
            if ($type == 'Software Engineering') {
                echo "Delete failed";
                ?>
                <meta http-equiv="refresh" content="0.5;url=practisera.php?reschange=1"/>
                <?php
            } else {
                echo "Delete failed";
                ?>
                <meta http-equiv="refresh" content="0.5;url=practisera.php?reschange=2"/>
                <?php
            }
        }
        mysqli_close($con);
        ?>
    </body>
</html>
