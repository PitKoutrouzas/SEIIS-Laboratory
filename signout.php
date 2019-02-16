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
        if(isset($_COOKIE["signedin"]))
        {
            setcookie("signedin", "",time()-1);
            setcookie("typein","",time()-1);
        }
        ?>
        <meta http-equiv="refresh" content="0.5;url=index.php">
    </body>
</html>
