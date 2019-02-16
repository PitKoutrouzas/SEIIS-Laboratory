
<?php
$con = mysql_connect("localhost", "seiis_lab", "seiis_lab");        //CONNECT WITH DB
mysql_select_db("project3", $con);

session_start();
session_unset();
?>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <meta charset="UTF-8">
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

            a:hover {
                color:cornflowerblue;
            }

            .blank{
                font-size: 20px;
                color: darkgrey;
                padding-left: 5px;
                padding-right: 5px;
            }

            .notes-btn_forms{
                display: inline-flex;
                margin-left: 40px;
            }

            a{
                color: darkgrey;
                text-decoration: none;
            }

            .nav-tm{
                text-align: center;
            }

            .nav-ra{
                text-align: center;
            }

            /*END THE STYLING OF HEADER*/


            /*START THE STYLING OF MAIN BODY*/


            .reportbody{
                width: 100%;
                margin: 0 auto;
            }


            .reports{

                padding-left: 0px;
            }


            .reports-btn-forms{
                display: inline-flex;
                margin-left: 40px;
            }


            .show-dates-option{

                font-weight: bold;
                font-size: 20px;
            }

            .output_form{
                width: 100%;
                color: aliceblue;
                padding-left: 50px;
                padding-right: 50px;
            }

            .blank2{
                padding-left: 9px;
                padding-right: 9px;
            }

            .blank3{
                padding-left: 9px;
                padding-right: 9px;
            }

            .blank4{
                padding-left: 30px;
                padding-right: 30px;
            }

            #selectSize{
                height: 23px;
                width: 147px;
            }

        </style>
        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript" src="reportsJs.js"></script>
    </head>
    <body>

        <!--HEADER START-->

        <?php
        if (isset($_COOKIE["signedin"])) {
            $person = "You are signed in as " . $_COOKIE["signedin"];
            $creator = $_COOKIE["signedin"];
        } else {
            $person = "";
            ?> <meta http-equiv="refresh" content="0.01;url=signin.php"/> <?php
        }
        if (isset($_COOKIE["typein"])) {
            $type = $_COOKIE["typein"];
        } else {
            $type = 0;
            ?> <meta http-equiv="refresh" content="0.01;url=signin.php"/> <?php
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
                    <li><a href="contactus.php">Contact Us </a></li>
                    <?php
                    if ($type > 0) {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">More
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="notes.php">Notes</a></li>
                                <li class="active"><a href="reports.php">Reports</a></li>
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
        <!--HEADER END-->

        <!--MAIN BODY START-->

        <!--BUTTONS START-->       
        
        <?php ?>
        <div class="reportbody">
            
            
                
                <div class="btn-group btn-block" style="right: 0%">
                                        
                    <button type="button" class="btn btn-primary" id="btnUserReport" onclick="user_reportDates()"/>
                    <span>User Report</span>
                    <button type="button" class="btn btn-primary " id="btnPubReport" onclick="pub_reportDates()"/>
                    <span>Publication Report</span>
                    <button type="button" class="btn btn-primary" id="btnProjReport" onclick="proj_reportDates()"/>
                    <span>Project Report</span>
                    
                    
                </div>

            <!--BUTTONS END-->

            <br/> <br/> <br/>

            <!--CHOOSE FILTERS-->


            <form action="reportHandling.php" method="post" class="show-user-dates-option" id="show-user-dates-option">
                            <fieldset><legend>Select User Report Filters:</legend>
                From: <input type="date" name="usrFrom" class="form-control" id="dateFrom" placeholder="dd-mm-yyyy"/>
                To: <input type="date" name="usrTo" class="form-control" id="dateTo" placeholder="dd-mm-yyyy"/>
                User Type:
                <select name="usrType" class="form-control">
                    <option value="4">Any</option>
                    <option value="1">Registered Guest</option>
                    <option value="2">Team Member</option>
                    <option value="3">Admin</option>
                </select>
                <br/>
                <br/>
                <input type="submit" name="action" class="btn btn-default" value="Show Users Report"/>
                            </fieldset>
            </form>


            <?php
            $result = "select * from venue";
            ?>


            <form action="reportHandling.php" method="post" class="show-pub-dates-option" id="show-pub-dates-option">
                            <fieldset><legend>Select Publication Report Filters:</legend>
                From: <input name="pubFrom" type="date" class="form-control" id="dateFrom" placeholder="dd-mm-yyyy"/>

                Venue:
                <select name="pubVenue" id="selectVenue" class="form-control">
                    <option value="all" selected>All venues...</option>
                    <?php
                    $result = mysql_query("select venue from publications group by venue");
                    $rows = array();
                    while ($row = mysql_fetch_array($result)) {
                        $rows[] = $row;
                    }
                    foreach ($rows as $row) {
                        ?>
                        <option value="<?php echo $row["venue"] ?>"> <?php echo $row["venue"] ?> </option>
                        <?php
                    }
                    ?>
                </select>

                Creator: <select name="pubCreator" id="selectCreator" class="form-control"/>
                <option value="all" selected>All creators...</option>
                <?php
                $result = mysql_query("select memberID, memberName, memberSurname from userss where type > 0 group by memberName");
                $rows = array();
                while ($row = mysql_fetch_array($result)) {
                    $rows[] = $row;
                }
                foreach ($rows as $row) {
                    ?>
                    <option value="<?php echo $row["memberID"] ?>"> <?php echo $row["memberName"] . " " . $row["memberSurname"]; ?> </option>
                    <?php
                }
                ?>
                </select>
                <br/> <br/>
                To: <input name="pubTo" type="date" class="form-control" id="dateTo" placeholder="dd-mm-yyyy"/> 
                Research Area: <select name="pubRa" id="selectRA" class="form-control"/>
                <option value="all" selected>All research areas...</option>
                <?php
                $result = mysql_query("select researchareaID, title from researchareas group by title");
                $rows = array();
                while ($row = mysql_fetch_array($result)) {
                    $rows[] = $row;
                }
                foreach ($rows as $row) {
                    ?>
                    <option value="<?php echo $row["researchareaID"] ?>"> <?php echo $row["title"]; ?> </option>
                    <?php
                }
                ?>
                </select>
                <!-- The Project Input will not be displayed unless it's finally needed in the project -->
                <div style="display: none">
                    Project: <select name="pubProj" id="selectProject" class="form-control"/>
                    <option value="all" selected>All projects...</option>
                    <?php
                    $result = mysql_query("select projectID, title from projects group by title");
                    $rows = array();
                    while ($row = mysql_fetch_array($result)) {
                        $rows[] = $row;
                    }
                    foreach ($rows as $row) {
                        ?>
                        <option value="<?php echo $row["projectID"] ?>"> <?php echo $row["title"]; ?> </option>
                        <?php
                    }
                    ?>
                    </select> </div> <br/>
                <br/>
                <input type="submit" name="action" class="btn btn-default" value="Show Publications Report"/>
                            </fieldset>
            </form>


            
            <form action="reportHandling.php" method="post" class="show-proj-dates-option" id="show-proj-dates-option">
                <fieldset><legend>Select Project Report Filters:</legend>
                From: <input name="projFrom" type="date" class="form-control" id="dateFrom" placeholder="dd-mm-yyyy"/>
                Category: <select name="projCat" class="form-control"/>
                <option></option>
                <?php
                $result = mysql_query("select category from projects group by category");
                while ($rowcategory = mysql_fetch_array($result)) {
                    ?>
                    <option value="<?php echo $rowcategory["category"]; ?>"> <?php echo $rowcategory["category"]; ?> </option> <?php } ?>  
                </select>
                Type(Coordinator - Partner):
                <select name="projType" class="form-control">
                    <option value="Any">Any</option>
                    <option value="Coordinator">Coordinator</option>
                    <option value="Partner">Partner</option>
                </select>
                <br/> <br/>
                To: <input name="projTo" class="form-control" type="date" 
                           id="dateTo" placeholder="dd-mm-yyyy"/> <br/>

                <br/>
                <input type="submit" name="action" class="btn btn-default" value="Show Projects Report"/>
                            </fieldset>
            </form>


            <?php ?>

            <!--CHOOSE DATES END-->

            <br/> <br/>

            <!--MAIN BODY END-->

            <br/>
        </div>
    </body>
</html>
