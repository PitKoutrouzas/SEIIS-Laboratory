<?php
$con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");        //CONNECT WITH DB
mysqli_select_db($con,"project3");
$result = mysqli_query($con, "select * from teammemberss");    //SELECT TABLE
?>

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
                  font-family: Raleway !important;
                position: relative;
                min-height: 100%;
            }

            .mySlides2{
                margin: 1em 0 0.5em 0;
                font-weight: bold;
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

            .title {
                text-align: center;
                position: relative;
                text-shadow: 0 -1px rgba(0,0,0,0.6);
                font-size: 25px;
                line-height: 40px;
                height:70px;
                background: #355681;	
                padding: 5px 15px;
                color: white;
                box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
                font-weight: bold;
                z-index: -1;
            }
            
            container {
                text-align: center;
                position: relative;
                text-shadow: 0 -1px rgba(0,0,0,0.6);
                font-size: 25px;
                line-height: 40px;
                height:70px;
                background: #355681;	
                padding: 5px 15px;
                color: white;
                box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
                font-weight: bold;
                z-index: -1;
            }
        </style>
        <title>Team Members</title>
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
                if ($('#newTM').is(':visible'))
                {
                    $("#newTM").slideUp();
                    $("#tm").slideDown();
                    $("#searchTM").slideUp();
                } else
                if ($('#newTM').is(':hidden'))
                {
                    $("#newTM").slideDown();
                    $("#tm").slideUp();
                    $("#searchTM").slideUp();
                }
            }

            function showSearch() {
                if ($('#searchTM').is(':visible'))
                {
                    $("#searchTM").slideUp();
                    $("#tm").slideDown();
                    $("#newTM").slideUp();
                } else
                if ($('#searchTM').is(':hidden'))
                {
                    $("#searchTM").slideDown();
                    $("#tm").slideUp();
                    $("#newTM").slideUp();
                }
            }

            function showAll() {
                window.location.href = 'tm.php';
            }

            window.onload = function () {
                document.getElementById("newTM").style.display = 'none';
                document.getElementById("searchTM").style.display = 'none';
            };


        </script>
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
                    <li class="active"><a href="tm.php">Team Members</a></li>
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

        <!--MAIN BODY START-->
        <div class="borders_and_main_body">

            <div class="tm-title" style="margin-left:200px; margin-right: 200px;">
                
                <br/> <br/> 

                <div class="addtm" id="addtm">
                    <div class="btn-group btn-block" style="right: 0%">
                        <?php if ($type > 1) { ?>
                            <button type="button" class="btn btn-primary" id="addtm" onclick="showAdd()"/>
                            <span>Add Team Member</span> <?php } ?>
                                    <button type="button" class="btn btn-primary " id="searchtm" onclick="showSearch()"/>
                                    <span>Search Team Member</span>
                                    <button type="button" class="btn btn-primary" id="showall" onclick="showAll()"/>
                                    <span>Show All Team Members</span>
                                    </div>

                                    <?php
                                    $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");        //CONNECT WITH DB
                                    mysqli_select_db($con, "project3");

                                    $optionQueryRA = "SELECT * FROM researchareas";
                                    $optionQueryResultRA = mysqli_query($con, $optionQueryRA);
                                    ?>

                                    <form method="post" id="newTM" enctype="multipart/form-data">
                                        <br/>
                                        <fieldset><legend>Add a new team member</legend>
                                            <b>First Name:</b> <input class="form-control" type="text" size="40em" name="nameTM" required/>
                                            <br/><br/>
                                            <b>Last  Name:</b> <input type="text" class="form-control" size="40em" name="surnameTM" required/>
                                            <br/><br/>
                                            <b>Short BIO:</b> 
                                            <br/><br/>
                                            <textarea name="shortBio" class="form-control" rows="10" cols="50" required></textarea>
                                            <br/><br/>
                                            <b>Email:</b> <input type="email" class="form-control" size="40em" name="email" required/>
                                            <br/><br/>
                                            <b>Select Photo:</b> 
                                            <br/>
                                            <input type="file" name="tmFile" accept="image/*" class="form-control" size="40">
                                            <br/><br/>
                                            <b>Select Related Research Areas:</b> <br/> <br/> 
                                            <div style="overflow:auto; height:400px;">
                                                <?php
                                                while ($row = mysqli_fetch_array($optionQueryResultRA)) {
                                                    ?>
                                                    <input type="checkbox" class="checkbox-inline" name="rRA[]" value="<?php echo $row["researchareaID"] ?>"/>
                                                    <?php echo $row["title"]; ?><br/>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                            <br/><br/>
                                            <input name="action" type="submit" value="Submit"/>
                                            <a class="btn btn-default" type="button" href="tm.php">Cancel</a>
                                        </fieldset>
                                    </form>

                                    </br>


                                    <form method="post" id="searchTM" class="searchTM"> 
                                        <br/>
                                        <fieldset><legend>Search team member by Name:</legend>
                                            <input type="text" class="form-control" name="searchName"/>
                                            <input name="action" type="submit" value="Go"/>
                                        </fieldset>
                                    </form>


                                    <div class="tm_tmBtns">
                                        <div class="tm" id="tm">

                                            <?php
//CHECK WHICH BUTTON WAS PRESSED
                                            if (isset($_POST['action'])) { //check if form was submitted
                                                if ($_POST['action'] == 'Delete') {     //DELETE THE ITEM FROM THE DATABASE
                                                    $TMtoDelete = $_POST["teammemberID"];
                                                    mysqli_query($con, "delete from restm where tid='$TMtoDelete'");
                                                    mysqli_query($con, "delete from teammemberss where teammemberID='$TMtoDelete'");

                                                    if (mysqli_affected_rows($con) > 0) {
                                                        echo "<script type='text/javascript'>alert('Delete succesful');</script>";
                                                        ?>
                                                        <meta http-equiv="refresh" content="0;url=tm.php"/>
                                                        <?php
                                                    } else {
                                                        echo "<script type='text/javascript'>alert('Delete failed');</script>";
                                                        echo $TMtoDelete;
                                                        ?>
                                                        <meta http-equiv="refresh" content="0;url=tm.php"/>
                                                        <?php
                                                    }
                                                } else if ($_POST['action'] == 'Go') {     //SEARCH ITEM
                                                    if (empty($_POST["searchName"])) {
                                                        $searchQuery = mysqli_query($con, "select * from teammemberss");
                                                    } else if (!empty($_POST["searchName"])) {
                                                        $s1 = $_POST["searchName"];
                                                        $searchQuery = mysqli_query($con, "select * from teammemberss where teammembersName like '%$s1%' or teammembersSurname like '%$s1%' ");
                                                    }


                                                    if (!$searchQuery) {
                                                        printf("Error: %s\n", mysqli_error($con));
                                                        exit();
                                                    }


                                                    if (mysqli_num_rows($searchQuery) == 0) {
                                                        ?>
                                                        <script type='text/javascript'>
                                                            alert('Your search has returned no results! Please refine your search!');
                                                        </script>
                                                        <meta http-equiv="refresh" content="0;tm.php"/>
                                                        <?php
                                                    } else {

                                                        $tableid = 1;
                                                        ?> <div class="table-responsive"> <table class="table"> <tr><th style="width: 5%; ">No.</th><th style="text-align: center;"> Registered Team Members </th></tr> <?php
                                                        while ($row = mysqli_fetch_array($searchQuery)) {
                                                            ?><tr><td><?php echo $tableid; ?></td><td>
                                                                        <button style='background-color: transparent !important;' data-toggle="collapse" data-target="<?php echo "#teammember" . $row["teammemberID"]; ?>"><h4><?php echo $row["teammembersName"] . " " . $row["teammembersSurname"]; ?></h4></button>
                                                                            <div id="<?php echo "teammember" . $row["teammemberID"]; ?>" class="collapse" style="background: #fff; opacity: 50%; border-radius: 25px; border: 2px solid #355681; padding: 20px;">
                                                                                <div id="<?php echo $row["teammemberID"] ?>"> <!-- THE DIV THAT IS CREATED FOR EACH ITEM IN MY DATABASE HAS THE ID OF THE TEAMMEMBER(UNIQUE)-->
                                                                                    <form method="post">
                                                                                        <input type="hidden" name="teammemberID" value="<?php echo $row["teammemberID"] ?>"/>
                                                                                        <div class="picAndText">
                                                                                            <div class="pic">
                                                                                                <img class="newsimage" src="<?php echo $row["teammemberphotoUpload"]; ?>" name="descr_img" id="descr_img" style=" width: 100%; height: 100%; min-width: 200px; min-height: 200px; max-width:400px; max-height:200px;"/></img>
                                                                                            </div> 
                                                                                            <br/>
                                                                                            <div class="text">
                                                                                                <div class="nameSurname">
                                                                                                    <label name="tmName" value="<?php echo $row["teammembersName"] ?>"><?php echo "Name: " . $row["teammembersName"] ?></label>
                                                                                                    <label name="tmSurname" value="<?php echo $row["teammembersSurname"] ?>"><?php echo $row["teammembersSurname"] ?></label>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <label type="text" name="tmCV" value="<?php echo $row["teammemberCV"] ?>"><?php echo "Short Bio: <br/>" . $row["teammemberCV"] ?></label>
                                                                                                </div>
                                                                                                <div>
                                                                                                    <label type="text" name="tmEmail" value="<?php echo $row["teammemberEmail"] ?>"><?php echo "Email: " . $row["teammemberEmail"] ?></label>
                                                                                                </div>
                                                                                                <br/>
                                                                                                <div>
                                                                                                    <fieldset>
                                                                                                        <legend>Research Areas: </legend>
                                                                                                        <ul>
                                                                                                            <?php
                                                                                                            $tid = $row["teammemberID"];
                                                                                                            $raresult = mysqli_query($con, "select * from restm where tid='$tid'");
                                                                                                            $rows = array();
                                                                                                            while ($row = mysqli_fetch_array($raresult)) {
                                                                                                                $rows[] = $row;
                                                                                                            }
                                                                                                            $listofra = $rows;

                                                                                                            foreach ($listofra as $ra) {
                                                                                                                $rid = $ra["rid"];

                                                                                                                $newresult = mysqli_query($con, "select researchareaID,title from researchareas where researchareaID = '$rid'");
                                                                                                                $newrow = mysqli_fetch_array($newresult);
                                                                                                                ?>
                                                                                                                <li name="tmRA" value="<?php echo $newrow["researchareaID"] ?>"><?php echo $newrow["title"] ?></li><br/>
                                                                                                            <?php }
                                                                                                            ?>                                                                                                                                                     
                                                                                                        </ul>
                                                                                                    </fieldset>
                                                                                                </div>
                                                                                                <input type="hidden" value="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <br/>
                                                                                        <?php if ($type > 1) { ?>
                                                                                            <input class="editBtn" name="action" type="submit" value="Edit"/>
                                                                                            <input class="deleteBtn" name="action" type="submit" value="Delete"/>  <?php } ?>
                                                                                    </form> 
                                                                                    <?php $tableid+=1; ?> 
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <br/>
                                                                    <?php
                                                                }
                                                                ?>

                                                            </table>
                                                        </div> <?php
                                                    }
                                                } else if ($_POST['action'] == 'Edit') {

                                                    $value1 = $_POST["teammemberID"];
                                                    $result1 = mysqli_query($con, "select * from teammemberss where teammemberID='$value1'");
                                                    $optionQueryRA = "SELECT * FROM researchareas";
                                                    $optionQueryResultRA = mysqli_query($con, $optionQueryRA);

                                                    while ($row = mysqli_fetch_array($result1)) {
                                                        ?>
                                                        <div id="<?php echo $row["teammemberID"] ?>"> <!-- THE DIV THAT IS CREATED FOR EACH ITEM IN MY DATABASE HAS THE ID OF THE teammemberss(UNIQUE)-->
                                                            <form method="post" enctype="multipart/form-data">
                                                                <input type="hidden" name="newteammemberID" value="<?php echo $row["teammemberID"] ?>"/>
                                                                <br/>
                                                                <fieldset><legend><?php echo "Edit " . $row["teammembersName"]; ?></legend>
                                                                    <b>First Name:</b> <input type="text" class="form-control" size="40em" name="newnameTM" value="<?php echo $row["teammembersName"] ?>" required/>
                                                                    <br/><br/>
                                                                    <b>Last  Name:</b> <input type="text" class="form-control" size="40em" name="newsurnameTM" value="<?php echo $row["teammembersSurname"] ?>" required/>
                                                                    <br/><br/>
                                                                    <b>Short BIO:</b> 
                                                                    <br/><br/>
                                                                    <textarea name="newshortBio" class="form-control" rows="10" cols="50" value="<?php echo $row["teammemberCV"] ?>" required><?php echo $row["teammemberCV"] ?></textarea>
                                                                    <br/><br/>
                                                                    <b>Email:</b> <input type="email" size="40em" class="form-control" name="newemail" value="<?php echo $row["teammemberEmail"] ?>" required/>
                                                                    <br/><br/>
                                                                    <b>Change Photo:</b> 
                                                                    <br/>
                                                                    <input type="file" class="form-control" name="newdatafile" value="<?php echo $row["teammemberphotoUpload"] ?>" size="40">
                                                                    <br/><br/>
                                                                    <b>Select Related Research Areas:</b> <br/> <br/> 
                                                                    <?php
                                                                    while ($row = mysqli_fetch_array($optionQueryResultRA)) {
                                                                        ?>
                                                                        <input type="checkbox" class="checkbox-inline" name="rRAedit[]" value="<?php echo $row["researchareaID"] ?>"/> 
                                                                        <?php echo $row["title"]; ?><br/>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                    <br/><br/>
                                                                    <input class="saveBtn" id="<?php echo $row["teammemberID"] ?>" name="action" type="submit" value="Save"/>
                                                                    <!-- WHEN I CLICK THE SAVE BUTTON OF AN ITEM, I PASS THE ITEM'S ID SO I CAN UPDATE IT IN THE TABLE(DATABASE) -->
                                                                    <input class="cancelBtn" id="<?php echo $row["teammemberID"] ?>" name="action" type="submit" value="Cancel"/>
                                                            </form>
                                                            </fieldset>

                                                        </div>
                                                        <?php
                                                    }
                                                } else if ($_POST['action'] == 'Save') {

                                                    $newID = $_POST["newteammemberID"];
                                                    $newname = $_POST["newnameTM"];
                                                    $newsurname = $_POST["newsurnameTM"];
                                                    $newshortBIO = $_POST["newshortBio"];
                                                    $newemail = $_POST["newemail"];
                                                    if (isset($_POST["newdatafile"])) {
                                                        $newpic = $_POST["newdatafile"];
                                                    } else {
                                                        $newpic = "";
                                                    }


                                                    $target_dir_edit = "uploads/";
                                                    $target_file_edit = $target_dir_edit . basename($_FILES["newdatafile"]["name"]);
                                                    $uploadOk_edit = 1;
                                                    $imageFileType_edit = pathinfo($target_file_edit, PATHINFO_EXTENSION);
                                                    // Check if image file is a actual image or fake image
                                                    if (isset($_POST["submit"])) {
                                                        $check_edit = getimagesize($_FILES["newdatafile"]["tmp_name"]);
                                                        if ($check_edit !== false) {
                                                            echo "File is an image - " . $check_edit["mime"] . ".";
                                                            $uploadOk_edit = 1;
                                                        } else {
                                                            echo "File is not an image.";
                                                            $uploadOk_edit = 0;
                                                        }
                                                        /* if (file_exists($target_file)) {
                                                          echo "Sorry, file already exists.";
                                                          $uploadOk = 0;
                                                          } */
                                                    }
                                                    // Check if $uploadOk is set to 0 by an error
                                                    if ($uploadOk_edit == 0) {
                                                        echo "Sorry, your file was not uploaded.";
                                                        // if everything is ok, try to upload file
                                                    } else {
                                                        if (move_uploaded_file($_FILES["newdatafile"]["tmp_name"], $target_file_edit)) {
                                                            echo " ";
                                                        } else {
                                                            echo "Sorry, there was an error uploading your file.";
                                                        }
                                                    }

                                                    $upload_edit = $target_file_edit;

                                                    if (isset($_POST["rRAedit"])) {
                                                        $values = $_POST["rRAedit"];  // ta relevant publications (parolo pou grafi startdate)
                                                        $counter = count($values);
                                                    } else {
                                                        $values = 0;
                                                        $counter = 0;
                                                    }


                                                    $oldcount = 0;
                                                    $prevcount = mysqli_query($con, "select COUNT(*) from restm where tid='$newID'");
                                                    $row4 = mysqli_fetch_array($prevcount);
                                                    $oldcount = $row4["COUNT(*)"];

                                                    if (isset($upload_edit)) {
                                                        mysqli_query($con, "update teammemberss set teammembersName='$newname', teammembersSurname='$newsurname', teammemberCV='$newshortBIO', teammemberEmail='$newemail', teammemberphotoUpload='$upload_edit' where teammemberID='$newID'");
                                                    } else {
                                                        mysqli_query($con, "update teammemberss set teammembersName='$newname', teammembersSurname='$newsurname', teammemberCV='$newshortBIO', teammemberEmail='$newemail' where teammemberID='$newID'");
                                                    }
                                                    $deleting = false;

                                                    //UPDATE, INSERT IF MORE, DELETE IF LESS MECHANISM FOR EDIT

                                                    $i = 0;
                                                    if (!isset($counter)) {
                                                        $counter = 0;
                                                    }
                                                    for ($i; $i < $oldcount; $i++) {
                                                        if ($i < $counter) {
                                                            $upcount = $i + 1;
                                                            mysqli_query($con, "update restm set rid='$values[$i]' where tid='$newID' and counter='$upcount'");
                                                        } else {
                                                            $deleting = true;
                                                            $maxfetch = mysqli_query($con, "select MAX(counter) from restm where tid='$newID'");
                                                            $row5 = mysqli_fetch_array($maxfetch);
                                                            $maxcounter = $row5["MAX(counter)"];
                                                            mysqli_query($con, "delete from restm where tid='$newID' and counter='$maxcounter'");
                                                        }
                                                    }

                                                    if (($i >= $oldcount) && ($deleting == false) && ($oldcount != $counter)) {
                                                        for ($j = $i; $j < $counter; $j++) {
                                                            if ($oldcount == 0) {
                                                                $oldnewcount = $j + 1;
                                                                mysqli_query($con, "insert into restm values('$values[0]','$newID', '$oldnewcount')");
                                                                $oldcount +=1;
                                                            } else {
                                                                $newcount = $j + 1;
                                                                mysqli_query($con, "insert into restm values('$values[$j]','$newID', '$newcount')");
                                                            }
                                                        }
                                                    }

                                                    // END

                                                    if (mysqli_affected_rows($con) > 0) {
                                                        echo "<script type='text/javascript'>alert('Update succesful');</script>";
                                                        ?>
                                                        <meta http-equiv="refresh" content="0;url=tm.php"/>
                                                        <?php
                                                    } else {
                                                        echo "<script type='text/javascript'>alert('Update failed');</script>";
                                                        ?>
                                                        <meta http-equiv="refresh" content="0;url=tm.php"/>
                                                        <?php
                                                    }
                                                } else if ($_POST['action'] == 'Cancel') {
                                                    echo '<script type="text/javascript">window.location.href = "tm.php" ;</script>';
                                                } else if ($_POST['action'] == 'Submit') {

                                                    $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");        //CONNECT WITH DB
                                                    mysqli_select_db($con, "project3");

                                                    $name = $_POST["nameTM"];
                                                    $surname = $_POST["surnameTM"];
                                                    $shortBIO = $_POST["shortBio"];
                                                    $email = $_POST["email"];
//                                                        if (isset($_POST["datafile"])) {
//                                                            $pic = $_POST["datafile"];
//                                                        } else {
//                                                            $pic = "";
//                                                        }

                                                    $target_dir = "uploads/";
                                                    $target_file = $target_dir . basename($_FILES["tmFile"]["name"]);
                                                    $uploadOk = 1;
                                                    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
                                                    // Check if image file is a actual image or fake image
                                                    if (isset($_POST["submit"])) {
                                                        $check = getimagesize($_FILES["tmFile"]["tmp_name"]);
                                                        if ($check !== false) {
                                                            echo "File is an image - " . $check["mime"] . ".";
                                                            $uploadOk = 1;
                                                        } else {
                                                            echo "File is not an image.";
                                                            $uploadOk = 0;
                                                        }
                                                        /* if (file_exists($target_file)) {
                                                          echo "Sorry, file already exists.";
                                                          $uploadOk = 0;
                                                          } */
                                                    }
                                                    // Check if $uploadOk is set to 0 by an error
                                                    if ($uploadOk == 0) {
                                                        echo "Sorry, your file was not uploaded.";
                                                        // if everything is ok, try to upload file
                                                    } else {
                                                        if (move_uploaded_file($_FILES["tmFile"]["tmp_name"], $target_file)) {
                                                            echo " ";
                                                        } else {
                                                            echo "Sorry, there was an error uploading your file.";
                                                        }
                                                    }

                                                    $upload = $target_file;
//     

                                                    if (isset($_POST["rRA"])) {
                                                        $relevantRA = $_POST["rRA"];  // ta relevant publications (parolo pou grafi startdate)
                                                        $arr_length = count($relevantRA);
                                                    } else {
                                                        $relevantRA = 0;
                                                        $arr_length = 0;
                                                    }

                                                    $id = 1;

                                                    $result = mysqli_query($con, "select teammemberID as memid from teammemberss");
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        $id = $row["memid"];
                                                    }

                                                    $id += 1;

                                                    mysqli_query($con, "insert into teammemberss (teammemberID, teammembersName, teammembersSurname, teammemberphotoUpload, teammemberEmail, teammemberCV) values('$id', '$name', '$surname', '$upload', '$email', '$shortBIO')");

                                                    for ($i = 1; $i <= $arr_length; $i++) {
                                                        $prwto = $relevantRA[$i - 1];
                                                        mysqli_query($con, "insert into restm values('$prwto', '$id', '$i')");
                                                    }

                                                    if (mysqli_affected_rows($con) > 0) {
                                                        echo "<script type='text/javascript'>alert('Insert succesful');</script>";
                                                        ?>
                                                        <meta http-equiv="refresh" content="0;url=tm.php"/>
                                                        <?php
                                                    } else {
                                                        echo "<script type='text/javascript'>alert('Insert failed');</script>";
                                                        echo $id . " " . $name . " " . $surname . " " . $shortBIO . " " . $email;
                                                        ?>
                                                        <meta http-equiv="refresh" content="5;url=tm.php"/>
                                                        <?php
                                                    }
                                                }
                                            } else {
                                                //MAIN BODY. EVERY ITEM IN THE TABLE OF MY DATABASE IS SHOWN HERE
                                                $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");        //CONNECT WITH DB
                                                mysqli_select_db($con, "project3");
                                                $result = mysqli_query($con, "select * from teammemberss");    //SELECT TABLE

                                                $tableid = 1;
                                                ?> <div class="table-responsive"> <table class="table"> <tr><th style="width: 5%;">No.</th><th>Registered Team Members </th></tr> <?php
                                                while ($row = mysqli_fetch_array($result)) {
                                                    ?><tr><td><?php echo $tableid; ?></td><td>
                                                                <button type="button" class="btn btn-block" style="background-color: transparent; color:black; outline-color: blue;" data-toggle="collapse" data-target="<?php echo "#teammember" . $row["teammemberID"]; ?>"><h4><?php echo $row["teammembersName"] . " " . $row["teammembersSurname"]; ?></h4></button>
                                                                    <div id="<?php echo "teammember" . $row["teammemberID"]; ?>" class="collapse" style="background: #fff; opacity: 50%; border-radius: 25px; border: 2px solid #355681; padding: 20px;">
                                                                        <div id="<?php echo $row["teammemberID"] ?>"> <!-- THE DIV THAT IS CREATED FOR EACH ITEM IN MY DATABASE HAS THE ID OF THE TEAMMEMBER(UNIQUE)-->
                                                                            <form method="post">
                                                                                <input type="hidden" name="teammemberID" value="<?php echo $row["teammemberID"] ?>"/>
                                                                                <div class="picAndText">
                                                                                    <div class="pic">
                                                                                        <img class="newsimage" src="<?php echo $row["teammemberphotoUpload"]; ?>" name="descr_img" id="descr_img" style=" width: 100%; height: 100%; min-width: 200px; min-height: 200px; max-width:400px; max-height:200px;"/></img>
                                                                                    </div> 
                                                                                    <br/>
                                                                                    <div class="text">
                                                                                        <div class="nameSurname">
                                                                                            <label name="tmName" value="<?php echo $row["teammembersName"] ?>"><?php echo "Name: " . $row["teammembersName"] ?></label>
                                                                                            <label name="tmSurname" value="<?php echo $row["teammembersSurname"] ?>"><?php echo $row["teammembersSurname"] ?></label>
                                                                                        </div>
                                                                                        <div>
                                                                                            <label type="text" name="tmCV" value="<?php echo $row["teammemberCV"] ?>"><?php echo "Short Bio: <br/>" . $row["teammemberCV"] ?></label>
                                                                                        </div>
                                                                                        <div>
                                                                                            <label type="text" name="tmEmail" value="<?php echo $row["teammemberEmail"] ?>"><?php echo "Email: " . $row["teammemberEmail"] ?></label>
                                                                                        </div>
                                                                                        <br/>
                                                                                        <div>
                                                                                            <fieldset>
                                                                                                <legend>Research Areas: </legend>
                                                                                                <ul>
                                                                                                    <?php
                                                                                                    $tid = $row["teammemberID"];
                                                                                                    $raresult = mysqli_query($con, "select * from restm where tid='$tid'");
                                                                                                    $rows = array();
                                                                                                    while ($row = mysqli_fetch_array($raresult)) {
                                                                                                        $rows[] = $row;
                                                                                                    }
                                                                                                    $listofra = $rows;

                                                                                                    foreach ($listofra as $ra) {
                                                                                                        $rid = $ra["rid"];

                                                                                                        $newresult = mysqli_query($con, "select researchareaID,title from researchareas where researchareaID = '$rid'");
                                                                                                        $newrow = mysqli_fetch_array($newresult);
                                                                                                        ?>
                                                                                                        <li name="tmRA" value="<?php echo $newrow["researchareaID"] ?>"><?php echo $newrow["title"] ?></li><br/>
                                                                                                    <?php }
                                                                                                    ?>                                                                                                                                                     
                                                                                                </ul>
                                                                                            </fieldset>
                                                                                        </div>
                                                                                        <input type="hidden" value="">
                                                                                    </div>
                                                                                </div>
                                                                                <br/>
                                                                                <?php if ($type > 1) { ?>
                                                                                    <input class="editBtn" name="action" type="submit" value="Edit"/>
                                                                                    <input class="deleteBtn" name="action" type="submit" value="Delete"/> <?php } ?>
                                                                            </form> 
                                                                            <?php $tableid+=1; ?> 
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <br/>
                                                            <?php
                                                        }
                                                    }
                                                    ?>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <!--MAIN BODY END-->

                                    <br/>

                                    <?php
                                    mysqli_close($con);
                                    ?>
                                    </body>
                                    </html>

