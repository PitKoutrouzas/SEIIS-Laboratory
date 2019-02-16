<?php
$con = mysql_connect("localhost", "seiis_lab", "seiis_lab");        //CONNECT WITH DB
mysql_select_db("project3", $con);
$result = mysql_query("select * from notes");    //SELECT TABLE
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Notes</title>
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

            .title{
                position: relative;
                text-align: center;
                text-shadow: 0 -1px rgba(0,0,0,0.6);
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
                text-shadow: 1px 1px 1px #FFF;
                border: 1px solid rgba(16, 103, 133, 0.6);
                box-shadow: 0px 0px 3px rgba(255, 255, 255, 0.5), inset 0px 1px 4px rgba(0, 0, 0, 0.2);
                border-radius: 3px;
                outline: 0;
                width: 270px;
            }

            a:hover {
                color:cornflowerblue;
            }
            
            .dropdown-content{
                z-index: 1;
            }

            .blank{
                color: darkgrey;
                padding-left: 5px;
                padding-right: 5px;
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

            .notes-title{
                z-index: -1;
            }

            .notes-title{

                padding-left: 0px;
            }


            .notes-btn_forms{
                display: inline-flex;
                margin-left: 40px;
            }

            .btn-notes{
                display: inline-block;
                border-radius: 16px;
                background-color: aliceblue;
                border: none;
                color:black;
                text-align: center;
                padding: 10px;
                width: auto;
                transition: all 0.5s;
                cursor: pointer;
                margin: 10px;
            }

            .btn-notes label {
                cursor: pointer;
                display: inline-block;
                position: relative;
                transition: 0.5s;
            }

            .btn-notes label:after {
                content: '\00bb';
                position: absolute;
                opacity: 0;
                right: -20px;
                transition: 0.5s;
            }

            .btn-notes:hover label {
                padding-right: 25px;
            }


            .btn-notes:hover label:after {
                opacity: 1;
                right: 0;
            }



            .noteDescription_editNote {

                margin: auto;
                width: 100%;
                background-color: #ffffcc;
                border-left: 6px solid #ffeb3b;
                border-right: 1px solid #ffeb3b;
                border-top: 1px solid #ffeb3b;
                border-bottom: 1px solid #ffeb3b;
                display: inline-flex;
            }

            .hello{
                background-color: lightgrey;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 10px;
            }

            .hello2{
                background-color: lightgrey;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 10px;
            }



            .main_body{
                height : 980px;
                margin-left:200px; 
                margin-right: 200px;
                position: relative;
                line-height: 30px;
                padding: 5px 15px;
                font-family: Raleway;
            }

            input[type=submit] {
                width: 5em;
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
        
        <script>

            function showAdd() {
                if ($('#hello').is(':visible'))
                {
                    $("#hello").slideUp();
                    $("#note").slideDown();
                    $("#hello2").slideUp();
                } else
                if ($('#hello').is(':hidden'))
                {
                    $("#hello").slideDown();
                    $("#note").slideUp();
                    $("#hello2").slideUp();
                }
            }

            function showSearch() {
                if ($('#hello2').is(':visible'))
                {
                    $("#hello2").slideUp();
                    $("#note").slideDown();
                    $("#hello").slideUp();
                } else
                if ($('#hello2').is(':hidden'))
                {
                    $("#hello2").slideDown();
                    $("#note").slideUp();
                    $("#hello").slideUp();
                }
            }

            function showAll() {
                window.location.href = 'notes.php';
            }

            window.onload = function () {
                document.getElementById("hello").style.display = 'none';
                document.getElementById("hello2").style.display = 'none';
            };


        </script>

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
                                <li class="active"><a href="notes.php">Notes</a></li>
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
        <!--HEADER END-->



        <!--MAIN BODY START-->
        <div class="borders_and_main_body">

            <div class="main_body" style="width:100%; margin: 0 auto;">

                <div class="btn-group btn-block" style="right: 0%">
                                                
                        <button type="button" class="btn btn-primary btn-sm" id="addNote" onclick="showAdd()"/>
                        <span>Create Note</span>
                        <button type="button" class="btn btn-primary btn-sm" id="searchNote" onclick="showSearch()"/>
                        <span>Search Note</span>
                        <button type="button" class="btn btn-primary btn-sm" id="searchAll" onclick="showAll()"/>
                        <span>Show All Notes</span>
                        
                </div>

                    <br/>
                    
                <?php
                $optionQueryProjects = "SELECT projectID,title FROM projects";
                $optionQueryResultProjects = mysql_query($optionQueryProjects);
                $optionQueryEvents = "SELECT eventID,eventTitle FROM calendar";
                $optionQueryResultEvents = mysql_query($optionQueryEvents);
                ?>

                <form method="post" id="hello" class="hello" style="margin: auto;">
                    Title: <input type="text" class="form-control" size="80em" name="noteTitle" required/>
                    Description: 
                    <textarea class="form-control" name="noteDescr" rows="5" cols="100" required></textarea>
                    Link to a project:
                    <select class="form-control" name="linkProj" size="5">
                        <?php
                        while ($row = mysql_fetch_array($optionQueryResultProjects)) {
                            ?>
                            <option value="<?php echo $row["projectID"] ?>" > <?php echo $row["title"]; ?> </option>
                            <?php
                        }
                        ?>
                    </select>
                    <br/>
                    Link to an event:
                    <select class="form-control" name="linkEvent" size="5">
                        <?php
                        while ($row = mysql_fetch_array($optionQueryResultEvents)) {
                            ?>
                            <option value="<?php echo $row["eventID"] ?>" > <?php echo $row["eventTitle"]; ?> </option>
                            <?php
                        }
                        ?>
                    </select>
                    <br/>
                    <input type="hidden" name="creator" value="<?php echo $creator; ?>"/>
                    <input name="action" type="submit" value="Submit"/>
                </form>
                </br>
                <form method="post" id="hello2" class="hello2" style="margin: auto;">
                    Search note by Title <input type="text" class="form-control" name="searchTitle"/>
                    Search note by Linked Project: <select class="form-control" name="searchProj" >
                        <option></option>
                        <?php
                        $optionQueryProjects = "SELECT projectID,title FROM projects";
                        $optionQueryResultProjects = mysql_query($optionQueryProjects);
                        $optionQueryEvents = "SELECT eventID,eventTitle FROM calendar";
                        $optionQueryResultEvents = mysql_query($optionQueryEvents);

                        while ($row = mysql_fetch_array($optionQueryResultProjects)) {
                            ?>
                            <option value="<?php echo $row["title"] ?>" > <?php echo $row["title"]; ?> </option>
                            <?php
                        }
                        ?>
                    </select>
                    Search note by Linked Event: <select class="form-control" name="searchEv" >
                        <option></option>
                        <?php
                        while ($row = mysql_fetch_array($optionQueryResultEvents)) {
                            ?>
                            <option value="<?php echo $row["eventTitle"] ?>" > <?php echo $row["eventTitle"]; ?> </option>
                            <?php
                        }
                        ?>
                    </select>
                    <input name="action" type="submit" value="Go"/>
                </form>

                <div class="note_noteBtns" style="overflow-y: scroll; height:800px;">
                    <div class="note" id="note" >

                        <?php
                        //CHECK WHICH BUTTON WAS PRESSED
                        if (isset($_POST['action'])) { //check if form was submitted
                            if ($_POST['action'] == 'Delete') {     //DELETE THE ITEM FROM THE DATABASE
                                $value = $_POST["noteID"];
                                mysql_query("delete from notes where noteID='$value'");
                                echo "<script type='text/javascript'>alert('Deleted Succesfully');</script>";
                                ?>
                                <meta http-equiv="refresh" content="0;url=notes.php"/>
                                <?php
                            } else if ($_POST['action'] == 'Go') {     //SEARCH ITEM
                                if (empty($_POST["searchProj"]) && empty($_POST["searchEv"]) && empty($_POST["searchTitle"])) {
                                    $searchQuery = mysql_query("select * from notes");
                                } else if (empty($_POST["searchEv"]) && !empty($_POST["searchProj"]) && empty($_POST["searchTitle"])) {
                                    $s1 = $_POST["searchProj"];
                                    $searchQuery = mysql_query("select * from notes,projects where linkedProject=projects.projectID AND projects.title like '%$s1%'");
                                } else if (empty($_POST["searchProj"]) && !empty($_POST["searchEv"]) && empty($_POST["searchTitle"])) {
                                    $s2 = $_POST["searchEv"];
                                    $searchQuery = mysql_query("select * from notes, calendar where linkedEvent=calendar.eventID AND eventTitle like '%$s2%'");
                                } else if (empty($_POST["searchEv"]) && empty($_POST["searchProj"]) && !empty($_POST["searchTitle"])) {
                                    $s1 = $_POST["searchTitle"];
                                    $searchQuery = mysql_query("select * from notes,projects where noteTitle like '%$s1%'");
                                } else if (empty($_POST["searchProj"]) && !empty($_POST["searchEv"]) && !empty($_POST["searchTitle"])) {
                                    $s1 = $_POST["searchTitle"];
                                    $s2 = $_POST["searchEv"];
                                    $searchQuery = mysql_query("select * from notes, calendar where linkedEvent=calendar.eventID AND noteTitle like '%$s1%' AND eventTitle like '%$s2%'");
                                } else if (!empty($_POST["searchProj"]) && empty($_POST["searchEv"]) && !empty($_POST["searchTitle"])) {
                                    $s1 = $_POST["searchTitle"];
                                    $s2 = $_POST["searchProj"];
                                    $searchQuery = mysql_query("select * from notes, calendar, projects where linkedEvent=calendar.eventID AND noteTitle like '%$s1%' AND projects.title like '%$s2%'");
                                } else {
                                    $s1 = $_POST["searchProj"];
                                    $s2 = $_POST["searchEv"];
                                    $searchQuery = mysql_query("select * from notes, calendar, projects where linkedEvent=calendar.eventID AND linkedProject=projects.projectID AND eventTitle like '%$s2%' AND projects.title like '%$s1%'");
                                }


                                if (!$searchQuery) {
                                    printf("Error: %s\n", mysql_error($con));
                                    exit();
                                }


                                if (mysql_num_rows($searchQuery) == 0) {
                                    ?>
                                    <script type='text/javascript'>
                                        alert('There is no note linked to such event or project!');
                                    </script>
                                    <meta http-equiv="refresh" content="0;notes.php"/>
                                    <?php
                                } else {

                                    while ($row = mysql_fetch_array($searchQuery)) {
                                        ?>
                                        <div id="<?php echo $row["noteID"] ?>" class="noteDescription_editNote"> <!-- THE DIV THAT IS CREATED FOR EACH ITEM IN MY DATABASE HAS THE ID OF THE NOTE(UNIQUE)-->
                                            <form method="post">
                                                <input type="hidden" name="noteID" value="<?php echo $row["noteID"] ?>"/>
                                                <b>Title:</b> <div type="text" name="editedTitle" value="<?php echo $row["noteTitle"] ?>"><?php echo $row["noteTitle"] ?></div> <!-- READ ONLY SO IT CAN NOT BE EDITED -->
                                                <br/>
                                                <b>Description:</b> <div type="text" name="editedDescription" value="<?php echo $row["description"] ?>"><?php echo $row["description"] ?></div> <!-- READ ONLY SO IT CAN NOT BE EDITED -->
                                                <br/>
                                                <b>Project Linked:</b> <div type="text" name="editedlinkProj" value="<?php echo $row["linkedProject"] ?>">
                                                    <?php
                                                    $noteProject = $row["linkedProject"];
                                                    $noteEvent = $row["linkedEvent"];
                                                    $optionQueryProjects = "SELECT projects.projectID,title,linkedProject FROM projects,notes where projects.projectID='$noteProject'";
                                                    $optionQueryResultProjects = mysql_query($optionQueryProjects) or trigger_error(mysql_error());
                                                    $row2 = mysql_fetch_array($optionQueryResultProjects);
                                                    echo $row2["title"];
                                                    ?>
                                                </div>
                                                <br/>
                                                <b>Event Linked:</b> <div type="text" name="editedlinkEvent" value="<?php echo $row["linkedEvent"] ?>">
                                                    <?php
                                                    $optionQueryEvents = "SELECT calendar.eventID,eventTitle,linkedEvent FROM calendar,notes where calendar.eventID='$noteEvent'";
                                                    $optionQueryResultEvents = mysql_query($optionQueryEvents) or trigger_error(mysql_error());
                                                    $row2 = mysql_fetch_array($optionQueryResultEvents);
                                                    echo $row2["eventTitle"];
                                                    ?>
                                                </div>
                                                <br/>
                                                <input type="hidden" name="creator" value="<?php echo $row["noteCreator"] ?>"/>
                                                <input class="editBtn" id="<?php echo $row["noteID"] ?>" name="action" type="submit" value="Edit"/>  
                                                <!--  WHEN I CLICK THE EDIT BUTTON OF AN ITEM, I WANT TO EDIT THE SPECIFIC DIV. MEANING, I WANT TO REMOVE THE READ ONLY ATTRIBUTE, EDIT IT AND THEN CLICK SAVE TO UPDATE IT IN THE TABLE(DATABASE)-->
                                                <input class="deleteBtn" id="<?php echo $row["noteID"] ?>" name="action" type="submit" value="Delete"/>
                                                <!-- WHEN I CLICK THE DELETE BUTTON OF AN ITEM, I PASS THE ITEM'S ID SO I CAN DELETE IT FROM THE TABLE(DATABASE) -->
                                            </form>

                                        </div>
                                        <br/> <br/>
                                        <?php
                                    }
                                }
                            } else if ($_POST['action'] == 'Edit') {

                                $value1 = $_POST["noteID"];
                                $result1 = mysql_query("select * from notes where noteID='$value1'");
                                $optionQueryProjects = "SELECT projectID,title FROM projects";
                                $optionQueryResultProjects = mysql_query($optionQueryProjects);
                                $optionQueryEvents = "SELECT eventID,eventTitle FROM calendar";
                                $optionQueryResultEvents = mysql_query($optionQueryEvents);

                                while ($row = mysql_fetch_array($result1)) {
                                    ?>
                                    <div id="<?php echo $row["noteID"] ?>" class="noteDescription_editNote"> <!-- THE DIV THAT IS CREATED FOR EACH ITEM IN MY DATABASE HAS THE ID OF THE NOTE(UNIQUE)-->
                                        <form method="post">
                                            <input type="hidden" name="noteID" value="<?php echo $row["noteID"] ?>"/>
                                            Title: <input type="text" class="form-control" name="editedTitle" size="80em" value="<?php echo $row["noteTitle"] ?>" READONLY/>
                                            <br/>
                                            Description: <br/><textarea class="form-control" type="text" cols="100" rows="5" name="editedDescription" value="<?php echo $row["description"] ?>" required><?php echo $row["description"] ?></textarea> <!-- READ ONLY SO IT CAN NOT BE EDITED -->
                                            <br/>
                                            Link to a project: <br/> 
                                            <select name="editedlinkProj" class="form-control" size="5">
                                                <?php
                                                while ($row = mysql_fetch_array($optionQueryResultProjects)) {
                                                    ?>
                                                    <option value="<?php echo $row["projectID"] ?>" selected> <?php echo $row["title"] ?> </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <br/>
                                            Link to an event: <br/> 
                                            <select name="editedlinkEvent" class="form-control" size="5">
                                                <?php
                                                while ($row = mysql_fetch_array($optionQueryResultEvents)) {
                                                    ?>
                                                    <option value="<?php echo $row["eventID"] ?>" selected> <?php echo $row["eventTitle"] ?> </option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                            <br/>
                                            <input type="hidden" name="creator" value="<?php echo $row["noteCreator"] ?>"/>
                                            <input class="saveBtn" id="<?php echo $row["noteID"] ?>" name="action" type="submit" value="Save"/>
                                            <!-- WHEN I CLICK THE SAVE BUTTON OF AN ITEM, I PASS THE ITEM'S ID SO I CAN UPDATE IT IN THE TABLE(DATABASE) -->
                                            <a href="notes.php" class="cancelBtn" id="<?php echo $row["noteID"] ?>" name="action" value="Cancel"/> Cancel </a>
                                        </form>

                                    </div>
                                    <?php
                                }
                            } else if ($_POST['action'] == 'Save') {
                                $newId = $_POST["noteID"];
                                $newTitle = $_POST["editedTitle"];
                                $newDescription = $_POST["editedDescription"];
                                if (isset($_POST["editedlinkProj"])) {
                                    $newLP = $_POST["editedlinkProj"];
                                } else {
                                    $newLP = 0;
                                }
                                if (isset($_POST["editedlinkEvent"])) {
                                    $newLE = $_POST["editedlinkEvent"];
                                } else {
                                    $newLE = 0;
                                }

                                mysql_query("update notes set noteTitle='$newTitle', description='$newDescription', linkedProject='$newLP', linkedEvent='$newLE' where noteID='$newId'");

                                if (mysql_affected_rows($con) > 0) {
                                    echo "<script type='text/javascript'>alert('Update succesful');</script>";
                                    ?>
                                    <meta http-equiv="refresh" content="0;url=notes.php"/>
                                    <?php
                                } else {
                                    echo "<script type='text/javascript'>alert('Update failed');</script>";
                                    ?>
                                    <meta http-equiv="refresh" content="0;url=notes.php"/>
                                    <?php
                                }
                            } else if ($_POST['action'] == 'Cancel') {


                                while ($row = mysql_fetch_array($result)) {
                                    ?>
                                    <div id="<?php echo $row["noteID"] ?>" class="noteDescription_editNote"> <!-- THE DIV THAT IS CREATED FOR EACH ITEM IN MY DATABASE HAS THE ID OF THE NOTE(UNIQUE)-->

                                        <form method="post">
                                            <input type="hidden" name="noteID" value="<?php echo $row["noteID"] ?>"/>
                                            <b>Title:</b> <div type="text" name="editedTitle" value="<?php echo $row["noteTitle"] ?>"><?php echo $row["noteTitle"] ?></div> <!-- READ ONLY SO IT CAN NOT BE EDITED -->
                                            <br/>
                                            <b>Description:</b> <div type="text" name="editedDescription" value="<?php echo $row["description"] ?>"><?php echo $row["description"] ?></div> <!-- READ ONLY SO IT CAN NOT BE EDITED -->
                                            <br/>
                                            <b>Project Linked:</b> <div type="text" name="editedlinkProj" value="<?php echo $row["linkedProject"] ?>">
                                                <?php
                                                $noteProject = $row["linkedProject"];
                                                $noteEvent = $row["linkedEvent"];
                                                $optionQueryProjects = "SELECT projectID,title,linkedProject FROM projects,notes where projectID='$noteProject'";
                                                $optionQueryResultProjects = mysql_query($optionQueryProjects);
                                                $row2 = mysql_fetch_array($optionQueryResultProjects);
                                                echo $row2["title"];
                                                ?>
                                            </div>
                                            <br/>
                                            <b>Event Linked:</b> <div type="text" name="editedlinkEvent" value="<?php echo $row["linkedEvent"] ?>">
                                                <?php
                                                $optionQueryEvents = "SELECT eventID,eventTitle,linkedEvent FROM calendar,notes where eventID='$noteEvent'";
                                                $optionQueryResultEvents = mysql_query($con, $optionQueryEvents);
                                                $row2 = mysql_fetch_array($optionQueryResultEvents);
                                                echo $row2["eventTitle"];
                                                ?>
                                            </div>
                                            <br/>
                                            <input type="hidden" name="creator" value="<?php echo $row["noteCreator"] ?>"/>
                                            <input class="editBtn" id="<?php echo $row["noteID"] ?>" name="action" type="submit" value="Edit"/>  
                                            <!--  WHEN I CLICK THE EDIT BUTTON OF AN ITEM, I WANT TO EDIT THE SPECIFIC DIV. MEANING, I WANT TO REMOVE THE READ ONLY ATTRIBUTE, EDIT IT AND THEN CLICK SAVE TO UPDATE IT IN THE TABLE(DATABASE)-->
                                            <input class="deleteBtn" id="<?php echo $row["noteID"] ?>" name="action" type="submit" value="Delete"/>
                                            <!-- WHEN I CLICK THE DELETE BUTTON OF AN ITEM, I PASS THE ITEM'S ID SO I CAN DELETE IT FROM THE TABLE(DATABASE) -->
                                        </form>

                                    </div>
                                    <br/> <br/>
                                    <?php
                                }
                            } else if ($_POST['action'] == 'Submit') {

                                $title = $_POST["noteTitle"];
                                $descr = $_POST["noteDescr"];
                                if (isset($_POST["linkProj"])) {
                                    $LP = $_POST["linkProj"];
                                } else {
                                    $LP = "";
                                }
                                if (isset($_POST["linkEvent"])) {
                                    $LE = $_POST["linkEvent"];
                                } else {
                                    $LE = "";
                                }
                                $creatorname = $_POST["creator"];

                                $temp = mysql_query("select noteID from notes");
                                $nor = mysql_num_rows($temp);
                                $nnor = $nor + 1;

                                $max = mysql_query("select MAX(noteID) as maxid from notes");
                                $rowmax = mysql_fetch_array($max);
                                $maxid = $rowmax["maxid"] + 1;


                                mysql_query("insert into notes (noteID, noteTitle, description, linkedProject, linkedEvent, notes.projectID, notes.eventID, noteCreator) values ('$maxid','$title', '$descr', '$LP', '$LE', '$LP', '$LE', '$creatorname')") or trigger_error(mysql_error());

                                if (mysql_affected_rows($con) > 0) {
                                    echo "<script type='text/javascript'>alert('Insert succesful');</script>";
                                    ?>
                                    <meta http-equiv="refresh" content="0;url=notes.php"/>
                                    <?php
                                } else {
                                    echo "<script type='text/javascript'>alert('Insert Failed');</script>";
                                    echo "Insert failed: id='$maxid', title='$title', description='$descr', linkedProject='$LP', linkedEvent='$LE', noteCreator='$creatorname ";
                                    ?>
                                    <meta http-equiv="refresh" content="0;url=notes.php"/>
                                    <?php
                                }
                            }
                        } else {
                            //MAIN BODY. EVERY ITEM IN THE TABLE OF MY DATABASE IS SHOWN HERE
                            while ($row = mysql_fetch_array($result)) {
                                ?>
                                <div id="<?php echo $row["noteID"] ?>" class="noteDescription_editNote"> <!-- THE DIV THAT IS CREATED FOR EACH ITEM IN MY DATABASE HAS THE ID OF THE NOTE(UNIQUE)-->

                                    <form method="post">
                                        <input type="hidden" name="noteID" value="<?php echo $row["noteID"] ?>"/>
                                        <b>Title:</b> <div type="text" style="word-wrap: break-word;" name="editedTitle" value="<?php echo $row["noteTitle"] ?>"><?php echo $row["noteTitle"] ?></div> <!-- READ ONLY SO IT CAN NOT BE EDITED -->
                                        <br/>
                                        <b>Description:</b> <div type="text" name="editedDescription" style="word-wrap: break-word;" value="<?php echo $row["description"] ?>"><?php echo $row["description"] ?></div> <!-- READ ONLY SO IT CAN NOT BE EDITED -->
                                        <br/>
                                        <b>Project Linked:</b> <div type="text" name="editedlinkProj" value="<?php echo $row["linkedProject"] ?>">
                                            <?php
                                            $noteProject = $row["linkedProject"];
                                            $noteEvent = $row["linkedEvent"];
                                            // "SELECT projectID,title,linkedProject FROM projects,notes where projectID='$noteProject'"
                                            $optionQueryProjects = "SELECT * FROM projects where projectID='$noteProject'";
                                            $optionQueryResultProjects = mysql_query($optionQueryProjects);
                                            $row2 = mysql_fetch_array($optionQueryResultProjects);
                                            echo $row2["title"];
                                            ?>
                                        </div>
                                        <br/>
                                        <b>Event Linked:</b> <div type="text" name="editedlinkEvent" value="<?php echo $row["linkedEvent"] ?>">
                                            <?php
                                            //SELECT eventID,eventTitle,linkedEvent FROM calendar,notes where eventID='$noteEvent'
                                            $optionQueryEvents = "SELECT * FROM calendar where eventID='$noteEvent'";
                                            $optionQueryResultEvents = mysql_query($optionQueryEvents);
                                            $row2 = mysql_fetch_array($optionQueryResultEvents);
                                            echo $row2["eventTitle"];
                                            ?>
                                        </div>
                                        <br/>
                                        <input type="hidden" name="creator" value="<?php echo $row["noteCreator"] ?>"/>
                                        <input class="editBtn" id="<?php echo $row["noteID"] ?>" name="action" type="submit" value="Edit"/>  
                                        <!--  WHEN I CLICK THE EDIT BUTTON OF AN ITEM, I WANT TO EDIT THE SPECIFIC DIV. MEANING, I WANT TO REMOVE THE READ ONLY ATTRIBUTE, EDIT IT AND THEN CLICK SAVE TO UPDATE IT IN THE TABLE(DATABASE)-->
                                        <input class="deleteBtn" id="<?php echo $row["noteID"] ?>" name="action" type="submit" value="Delete"/>
                                        <!-- WHEN I CLICK THE DELETE BUTTON OF AN ITEM, I PASS THE ITEM'S ID SO I CAN DELETE IT FROM THE TABLE(DATABASE) -->
                                    </form>

                                </div>
                                <br/> <br/>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <!--MAIN BODY END-->

        <br/>

        <?php
        mysql_close($con);
        ?>
    </body>
</html>


