<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
         $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
        mysqli_select_db($con, "seiis");
        
        if(isset($_POST["id"]))
        {
            $id=$_POST["id"];?>
            <script> 
            var r = confirm("Are you sure you want to delete it?");
    if (r == true) {
        <?php $res= mysqli_query($con, "delete * from publications where id='$id'");?>
    } else {
        window.location = "index.php";
    }
    document.getElementById("demo").innerHTML = txt;
}</script><?php
        }
        ?>
    </body>
</html>
