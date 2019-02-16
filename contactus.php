<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <style type="text/css">

            .hrclass{
                color: #A9E2F3;
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

            .dropdown-content{
                z-index: 2;
            }

            .profileactive {
                background-color: #4d90fe;
            }

            .prof_fname,.prof_sname,.prof_email{
                background: #D3D3D3;
                background: -moz-linear-gradient(top, #D3D3D3 0%, #D9D9D9 38%, #E5E5E5 82%, #E7E7E7 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#D3D3D3), color-stop(38%,#D9D9D9), color-stop(82%,#E5E5E5), color-stop(100%,#E7E7E7));
                background: -webkit-linear-gradient(top, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#E7E7E7 100%);
                background: -o-linear-gradient(top, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#E7E7E7 100%);
                background: -ms-linear-gradient(top, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#E7E7E7 100%);
                background: linear-gradient(to bottom, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#E7E7E7 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d3d3d3', endColorstr='#e7e7e7',GradientType=0 );
                display: block;
                padding: 12px 10px;
                color: #999;
                font-size: 1.2em;
                font-weight: bold;
                text-shadow: 1px 1px 1px #FFF;
                border: 1px solid rgba(16, 103, 133, 0.6);
                box-shadow: 0px 0px 3px rgba(255, 255, 255, 0.5), inset 0px 1px 4px rgba(0, 0, 0, 0.2);
                border-radius: 3px;
                outline: 0;
                width: 270px;
            }

            .title {
                position: relative;
                text-align: center;
                text-shadow: 0 -1px rgba(0,0,0,0.6);
                font-size: 22px;
                height: 70px;
                line-height: 30px;
                background: #355681;	
                padding: 5px 15px;
                color: white;
                box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
                font-weight: bold;
                z-index: -1;
            }
        </style>
        <title>Contact Us</title>
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
                    <li><a href="index.php">Home</a></li>
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
                    <li class="active"><a href="contactus.php">Contact Us </a></li>
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
        <!-- HEADER END -->
        <div>
<?php
$con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
mysql_select_db("project3", $con);
$result = mysql_query("select * from contactus");
$row = mysql_fetch_array($result);

if ($type == 3) {
    ?>
                <form action="contactusedit.php" method="POST" style="margin:0 auto; width: 400px;">
                    Address: <textarea name="address" class="form-control" rows="3" style="resize: none;"><?php echo $row["address"]; ?></textarea> <br/>
                    Telephone: <textarea name="telephone" class="form-control" style="resize: none;"><?php echo $row["telephone"]; ?></textarea> <br/>
                    Email: <textarea name="email" class="form-control" style="resize: none;"><?php echo $row["email"]; ?></textarea> <br/>
                    Fax: <textarea name="fax" class="form-control" style="resize: none;"><?php echo $row["fax"]; ?></textarea><br/>
                    <br/>
                    <input type="submit" value="Save" style="color: buttontext;">
                </form>
            <?php } else {
                ?> 
            <fieldset style="margin:0 auto; width: 400px;"><legend>Contact Us</legend>
            <p><?php echo "Address: " . $row["address"]; ?></p>
                <p><?php echo "Telephone: " . $row["telephone"]; ?></p>
                <p><?php echo "Email: " . $row["email"]; ?></p>
                <p><?php echo "Fax: " . $row["fax"]; ?></p></fieldset> <?php } ?>

        </div>
    </body>

</html>