<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <style type="text/css">

            
            .nav-tm{
                text-align: center;
            }
            
            .nav-ra{
                text-align: center;
            }
            
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

            .title{
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
                z-index: -1;
            }

            .usernameSignin, .passwordSignin{
                background: #D3D3D3;
                background: -moz-linear-gradient(top, #D3D3D3 0%, #D9D9D9 38%, #E5E5E5 82%, #9bff6d 100%);
                background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#D3D3D3), color-stop(38%,#D9D9D9), color-stop(82%,#E5E5E5), color-stop(100%,#E7E7E7));
                background: -webkit-linear-gradient(top, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#9bff6d 100%);
                background: -o-linear-gradient(top, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#9bff6d 100%);
                background: -ms-linear-gradient(top, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#9bff6d 100%);
                background: linear-gradient(to bottom, #D3D3D3 0%,#D9D9D9 38%,#E5E5E5 82%,#9bff6d 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d3d3d3', endColorstr='#9bff6d',GradientType=0 );
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
        </style>
        <meta charset="utf-8">
        <title>SignIn</title>
        <!-- Latest compiled and minified CSS -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <link href="seiis_news_style.css" rel="stylesheet" type="text/css"/>
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
                        <li><a href="calendar.php">Calendar</a></li> <?php } ?>
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
}
if ($type == 3) {
    ?>
                                <li><a class="usersactive" href="users.php">Users</a></li> <?php } ?>
                        </ul>
                    </li>
                    <div class="flex" style="color: #2E76F3;">
                            <?php echo $person; ?>
                    </div>
                </ul>
                <ul class="nav navbar-nav pull-right">
<?php
if ($person == "") {
    ?>
                        <li><a type="button" class="btn btn-default navbar-btn pull-right" href="signin.php">Sign In</a></li> 
    <?php
} else {
    ?>
                        <li><a type="button" class="btn btn-default navbar-btn pull-right" href="signout.php">Sign Out</a></li> <?php }
?>
                    </li>


                </ul>

            </div>

        <div style="width: 250px; margin: 0 auto;">
            <form action ="signinperson.php" method="post"/>
            Username: <input type="text" class="usernameSignin" name="usernameSignin" required/><br/>
            Password: <input type="password" class="passwordSignin" name="passwordSignin" required/><br/>
            <input type="submit" value="Sign in!"/>
        </form>

        <br/><br/>
        <a href="forgotpassword.php">Forgot your password?..</a><br/>
        <a href="register.php" style="color: #225e63; font-weight: bold;">Not registered? Click here to Register..</a>
    </div> 
</body>
</html>