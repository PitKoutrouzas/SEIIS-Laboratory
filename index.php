<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

        <meta charset="UTF-8">
        <style type="text/css">

            .hrclass{
                color: #A9E2F3;
            }
            .active {
                background-color: #4d90fe;
            }
           
body {
  font-family: Raleway !important;
  margin:0;
   padding:0;
}

            html {
                position: relative;
                min-height: 100%;
            }

            .mySlides2{
                margin: 1em 0 0.5em 0;
                width: 980px;
                position: relative;
                text-shadow: 0 -1px rgba(0,0,0,0.6);
                font-size: 22px;
                line-height: 30px;
                background: #355681;	
                border: 1px solid #fff;
                padding: 5px 15px;
                color: white;
                border-radius: 0 10px 0 10px;
                box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
            }

            .dropdown-content{
                z-index: 1;
            }
        </style>
        <title>Homepage</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <?php
        if (isset($_COOKIE["signedin"])) {
            $person = "You are signed in as " . $_COOKIE["signedin"];
        } else {
            $person = "";
        }
        if (isset($_COOKIE["typein"])) {
            $type = $_COOKIE["typein"];
        } else {
            $type = 0;
        }
        ?>


        <!-- Section to host top layout of page-->
                        
        <div class="container-fluid">
                <a target="_blank" href="index.html">
                    <img src="logoshort.png" alt="seiis logo" width="100" height="40" align="left" style="margin-top: 10px; margin-left: -10px;"/></a>

                    <ul class="nav navbar-nav" style="color: #095dbc">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="News.php?newschange=0">News</a></li>
                    <li><a href="projects.php">Projects</a></li>
                    <li><a href="tm.php">Team Members</a></li>
                    <?php
                    if ($type > 0) {
                        ?>
                        <li><a href="calendar.php">Calendar</a></li><?php } ?>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Research Areas
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="practisera.php?reschange=1" >Software Engineering</a></li>
                            <li><a href="practisera.php?reschange=2" >Intelligent Information Systems</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Publications
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="publications.php?pubchange=1" >Journals</a></li>
                            <li><a href="publications.php?pubchange=2" >Conferences</a></li>
                            <li><a href="publications.php?pubchange=3">Books</a></li>
                            <li><a href="publications.php?pubchange=4">Book Chapters</a></li>
                            <li><a href="publications.php?pubchange=5">Editorials</a></li>
                        </ul>
                    </li>
                    <li><a href="contactus.php">Contact Us </a></li>
                    <?php
                    if ($type > 0) {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">More
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="notes.php">Notes</a></li>
                                <li><a href="reports.php">Reports</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <?php
                                if ($type == 3) {
                                    ?>
                                    <li><a class="usersactive" href="users.php">Users</a></li> <?php } ?>
                            </ul>
                        </li>
                    <?php } ?> 
                    <div class="flex" style="color: #2E76F3;">
                        <?php echo $person; ?>
                    </div>
                </ul>
                <ul class="nav navbar-nav pull-right">
                    <?php
                    if ($person == "") {
                        ?>
                        <li style=""><a type="button" class="btn btn-default navbar-btn pull-right" href="signin.php">Sign In</a></li> 
                        <?php
                    } else {
                        ?>
                        <li style=""><a type="button" class="btn btn-default navbar-btn pull-right" href="signout.php">Sign Out</a></li> <?php }
                    ?>
                    </li>


                </ul>
             
                            </div>
                                      

        <div class="carousel slide" data-ride="carousel" style="font-family: 'Muli', sans-serif; align-content: center; ">
            <?php
            $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
            mysqli_select_db($con, "project3");
            $result = mysqli_query($con, "select * from news");
            $homeresult = mysqli_query($con, "select * from homepage");
            $homerow = mysqli_fetch_array($homeresult);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                
                <div class="item">
                <input type="image" align="center" class="mySlides" onClick="window.location.href = 'News.php?newschange=' + <?php echo $row["newsID"];?>" src="<?php echo $row["newsUpload"];?>" style="margin:0 auto; min-height: 800px; max-height: 800px; max-width:100%; min-width: 50%; align-content: center; z-index: -1;">
                </div>
            <text class="mySlides2" style="visibility: false; color: black; background-color: white; z-index: 1; margin:0 auto; text-align: center; max-width: 100%; min-width: 100%;"><?php echo $row["newsTitle"];?></text> 
                    <?php }
            ?>

            <button class="left carousel-control" onclick="plusDivs(-1)" style='width: 2%'>&#10094;</button>
  <button class="right carousel-control" onclick="plusDivs(1)" style='width: 2%'>&#10095;</button>

        </div>
        <div class="w3-content w3-display-container" style="font-family: 'Muli', sans-serif;">

            <br/>
            <?php if ($type == 3) { ?>
                <form action="homepageedit.php" method="POST">
                    <textarea name="description" rows="8" style="font-family: 'Muli', sans-serif; width:1000px; resize: none;"><?php echo $homerow["description"]; ?></textarea>
                    <br/>
                    <input type="submit" class="gobtn" value="Save">
                </form>
            <?php } else {
                ?> <p style="font-family: 'Muli', sans-serif; word-wrap: break-word;"><?php echo $homerow["description"]; ?></p> <?php } ?>

            <br/>
            <br/>
            <br/>
            <fieldset style="width: 400px;">
                <legend id="getMonth"></legend>
                <ul>
                    <?php
                    $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                    $date = date("m");
                    mysqli_select_db($con, "project3");
                    $result = mysqli_query($con, "select eventTitle from calendar where month(eventDateStart) = '$date' and eventType = 'Public' ");
                    while ($row = mysqli_fetch_array($result)) {
                        ?><br/><li><?php echo $row["eventTitle"]; ?></li>
                    <?php } ?>
                </ul>
                <br/>
                <?php if ($type > 0) { ?>
                    <a href="calendar.php" style="color: cornflowerblue; text-align: right;">Go to Calendar</a> <?php } ?>
            </fieldset><br/>
        </div>

        <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                var y = document.getElementsByClassName("mySlides2");
                if (n > x.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = x.length
                }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                    y[i].style.display = "none";
                }
                x[slideIndex - 1].style.display = "block";
                y[slideIndex - 1].style.display = "block";
            }
        </script>

        <script>
            var minas = "<?php echo date("m") ?>";
            var monthName = "";

            switch (minas) {
                case "01":
                    monthName = "January";
                    break;
                case "02":
                    monthName = "February";
                    break;
                case "03":
                    monthName = "March";
                    break;
                case "04":
                    monthName = "April";
                    break;
                case "05":
                    monthName = "May";
                    break;
                case "06":
                    monthName = "June";
                    break;
                case "07":
                    monthName = "July";
                    break;
                case "08":
                    monthName = "August";
                    break;
                case "09":
                    monthName = "September";
                    break;
                case "10":
                    monthName = "October";
                    break;
                case "11":
                    monthName = "November";
                    break;
                case "12":
                    monthName = "December";
                    break;
            }
            ;

            document.getElementById("getMonth").innerHTML = "Public events list for " + monthName;

        </script>

    </body>

</html>
