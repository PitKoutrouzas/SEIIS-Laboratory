<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
        mysqli_select_db($con, "seiis");
        $resul=mysqli_query($con,"select relpub from ra where id=6");
        while($row= mysqli_fetch_array($resul)){
            echo $row["relpub"];
        }
        ?>
    </body>
</html>
