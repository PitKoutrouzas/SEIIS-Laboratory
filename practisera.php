<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <style type="text/css">
            .hrclass{
                color: #A9E2F3;
            }

            a{
                color: #2E76F3;
                text-decoration: none;
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

            .nav-tm{
                text-align: center;
            }

            table {
                table-layout: fixed; 
                margin: 0 auto;
                border-collapse: collapse;
                width: 100%;
            }

            th, td { max-width: 4000px; width: 100%; }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
                background-color: #A42D2D;
                color: white;
            }
            tr:nth-child(even){background-color: #DDEBF3}

            thead, tbody { display: block; }
            tbody {
                height: 400px;       
                overflow-y: auto;    
                overflow-x: hidden;
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

            .container {
                margin-left : auto;
                margin-right : auto;
                position: relative;
                text-shadow: 0 -1px rgba(0,0,0,0.6);
                font-size: 22px;
                line-height: 30px;
                background: #355681;	
                padding: 5px 15px;
                color: white;
                box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
                z-index: -1;
            }

            .nav-ra{
                text-align: center;
            }


        </style>
        <meta charset="utf-8">
        <title>RESEARCH AREAS</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>

    <body>
        <!--HEADER START-->
        <div id="image2">

            <?php
            if (isset($_COOKIE["signedin"])) {    // To username tou xristi pou einai signedin
                $person = "You are signed in as " . $_COOKIE["signedin"];
            } else {
                $person = "";
            }
            if (isset($_COOKIE["typein"])) {   // O tipos 0,1,2 tou xristi pou einai signed in
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

                    <li class="dropdown active">
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
                                <li><a href="users.php">Users</a></li>
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
        <script>
            window.onload = function () {
                var newstable = document.getElementById("newstable");
                if (newstable.style.display === 'none')
                {
                    document.getElementById("newstable").style.display = 'none';
                } else
                {
                    document.getElementById("newstable").style.display = 'inline';
                }

                document.getElementById("newsadd").style.display = 'none';
                document.getElementById("newsedit").style.display = 'none';
                document.getElementById("newsdelete").style.display = 'none';
                document.getElementById("editnews").style.display = 'none';
                document.getElementById("deletenews").style.display = 'none';
                document.getElementById("descrtable").style.display = 'none';

            };
        </script>
        <div style="margin-left: 200px !important; margin-right: 200px !important;">

            <?php $reschange = $_GET['reschange']; ?>

            <!-- These are the forms that are showed when the Add,Edit,Delete Projects buttons are clicked -->

            <div id="newscolumn" ><br/><br/>
                <?php
                if ($type > 0) {
                    ?>
                    <button type="button" class="btn btn-primary" id="addnews" onClick="addNew()"/> Create Research Area </button><br/><br/>
                    <?php
                } else {
                    ?>
                    <div>
                        <image align="left" id="editnews" width="0" height="0" style="display:none;" onClick="editNew()"/>
                        <image align="left" id="deletenews" width="0" height="0" style="display:none;" onClick="deleteNew()"/>

                    </div>
                <?php }
                ?>

                <!-- O PINAKAS -->

                <div class="table-responsive">
                    <table class="table" id="newstable" border="0">
                        <thead>
                            <tr> <fieldset><legend>Search Research Area</legend>
                            <?php
                            if (isset($_POST["namesearch"])) {
                                $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                                mysqli_select_db($con, "project3");
                                $searchquery = $_POST["namesearch"];
                                if (!empty($searchquery)) {
                                    if ($reschange == 1) {
                                        $_SESSION["searchquery"] = mysqli_query($con, "select * from researchareas where title like '$searchquery%' and type='Software Engineering'");
                                    } else if ($reschange == 2) {
                                        $_SESSION["searchquery"] = mysqli_query($con, "select * from researchareas where title like '$searchquery%' and type=' Intelligent Information Systems'");
                                    } else {
                                        $_SESSION["searchquery"] = mysqli_query($con, "select * from researchareas where title like '$searchquery%'");
                                    }
                                } else {

                                    if ($reschange == 1) {
                                        $_SESSION["searchquery"] = mysqli_query($con, "select * from researchareas where type='Software Engineering'");
                                    } else if ($reschange == 2) {
                                        $_SESSION["searchquery"] = mysqli_query($con, "select * from researchareas where type=' Intelligent Information Systems'");
                                    } else {
                                        $_SESSION["searchquery"] = mysqli_query($con, "select * from researchareas ");
                                    }
                                }
                                ?>
                                <form id="searchform" action="practisera.php?reschange=<?php echo $reschange; ?>" method="POST">
                                    Search by Title:<input class="form-control" type="text" name="namesearch" placeholder="<leave leave blank for full list for full list>">
                                    <input class="form-control" type="submit" class="gobtn" value="GO" >
                                </form>
                                <?php
                            } else {
                                ?>
                                <form id="searchform" action="practisera.php?reschange=<?php echo $reschange; ?>" method="POST">
                                    Search by Title:<input class="form-control" type="text" name="namesearch" placeholder="<leave leave blank for full list for full list>">
                                    <input class="form-control" type="submit" class="gobtn2" value="GO" >
                                </form><?php
                            }
                            ?>
                            </tr></fieldset>
                        </thead>

                        <tbody class="tablebody" style="overflow-y: scroll; height:1000px;">
                            <?php
                            $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                            mysqli_select_db($con, "project3");
                            if ((isset($_SESSION["searchquery"])) && (!empty($_SESSION["searchquery"]))) {
                                $result = $_SESSION["searchquery"];
                            } else {
                                if ($reschange == 1) {
                                    $result = mysqli_query($con, "select * from researchareas where type='Software Engineering'");
                                } else if ($reschange == 2) {
                                    $result = mysqli_query($con, "select * from researchareas where type=' Intelligent Information Systems'");
                                } else {
                                    $result = mysqli_query($con, "select * from researchareas");
                                }

                                $_SESSION["searchquery"] = $result;
                            }
                            $times = array();
                            $times[5] = "";
                            $result2 = "";
                            $selected = array();
                            $sel = 0;
                            while ($row = mysqli_fetch_array($result)) {
                                $times[0] = $row["researchareaID"];
                                $thisid = $row["researchareaID"];
                                $result3 = mysqli_query($con, "select COUNT(pid) from respub where rid='$thisid'");
                                $row3 = mysqli_fetch_array($result3);
                                $numbers = $row3["COUNT(pid)"];
                                $times[1] = $row["title"];
                                $times[2] = $row["description"];
                                $times[3] = $row["type"];
                                $selectedtype[$sel] = $row["type"];
                                for ($i = 1; $i <= $numbers; $i++) {
                                    $result2 = mysqli_query($con, "select publicationID,title from publications where publicationID=(SELECT pid from respub where rid='$thisid' and counter='$i')");
                                    if ($result2 != FALSE) {

                                        $row2 = mysqli_fetch_array($result2);
                                        $selected[$i - 1] = $row2["publicationID"];
                                        $times[5] = $times[5] . "<br/>" . $row2["title"];
                                    }
                                }
                                $times[4] = $row["relpub"];
                                ?>
                                <tr>
                                    <td style="width: 4000px; max-width: 100%"><a href="#" class="newstable" id="<?php echo $row["researchareaID"] ?>" value="<?php echo $row["researchareaID"] ?>" name="<?php echo $row["title"] ?>" style="color: #2E76F3;"  onClick='showDescription(<?php echo json_encode($times); ?>)'>
                                            <?php echo $row["title"] ?></a></td>
                                    <td style="width: 4000px; max-width: 100%"> <?php echo $row["type"]; ?></td>

                                </tr>
                                <?php
                                $times[5] = "";
                                $sel += 1;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- TELOS PINAKA-->


                <br/>
                <form action="createra.php" method="post" id="newsadd" class="newsadd">
                    <br/>
                    Title: <input class="form-control" type="text" name="title" required/>
                    <br/>
                    Description: 
                    <br/>
                    <textarea class="form-control" name="aim" rows="5" cols="30" ></textarea>
                    <br/> <br/>
                    Category:<br/>
                    <input type="radio" name="partners" value="Software Engineering" checked style="text-align: left;"/>Software Engineering areas of research
                    <br/>  <input type="radio" name="partners" style="text-align: left;" value=" Intelligent Information Systems"/> Intelligent Information Systems areas of research
                    <br/> <br/>  Relevant Publications:<br/> <?php
                    $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                    mysqli_select_db($con, "project3");
                    if (!isset($numbers)) {
                        $numbers = 0;
                    }
                    for ($i = 1; $i <= $numbers; $i++) {
                        $result2 = mysqli_query($con, "select title from publications where publicationID=(SELECT pid from respub where rid='$thisid' and counter='$i')");
                    }
                    $p = mysqli_query($con, "select publicationID,title from publications");
                    ?> 
                    <div class="table-responsive"><table class="table">
                            <?php while ($row = mysqli_fetch_array($p)) { ?> 
                                <tr>
                                    <td style="width: 4000px; max-width: 100%"> <input type="checkbox" name="startdate[]" value="<?php echo $row["publicationID"]; ?>"/><?php echo $row["title"]; ?> </td>
                                </tr>
                            <?php } ?>
                        </table>
                        <input class="form-control" type="submit" class="btn btn-default" value="Submit"/>
                        <?php if ($reschange == 1) { ?>
                            <a style='text-align: center;' href="practisera.php?reschange=1" class="btn btn-default" type="buttton" class="form-control" value="Cancel"/>Cancel</a><?php } else { ?>
                            <a style='text-align: center;' href="practisera.php?reschange=2" class="btn btn-default" type="buttton" class="form-control" value="Cancel"/>Cancel</a><?php } ?>
                    </div> 
                    <br/><?php ?><br/>

                </form>

                <form action="editra.php" method="post" id="newsedit" class="newsedit">
                    <textarea class="form-control" type="text" name="id" id="newseditID" style="display:none" /></textarea>
                    Title: <textarea class="form-control" type="text" rows="1" name="title" id="newseditTitle" style="resize: none;" required/></textarea>
                    <br/>
                    Description: 
                    <br/>
                    <textarea class="form-control" name="aim" id="newseditDescr" rows="5" cols="30"></textarea>
                    <br/>
                    Category:<br/>
                    <input type="radio" name="partners" id="newseditPartners" value="Software Engineering" style="font-family: 'Courier New'"/> Software Engineering areas of research
                    <br/>  <input type="radio" name="partners" id="newseditPartners2" value=" Intelligent Information Systems"/> Intelligent Information Systems areas of research

                    <br/>
                    <br/>  <fieldset> <legend><i>Relevant Publications:</i></legend> <h3 id="relevantpubs" style="text-align: left;"></h3><br/> </fieldset><br/><h3 style="font-size: 19px;"><i>Select publications from below</i></h3><?php
                    $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                    mysqli_select_db($con, "project3");

                    $r = mysqli_query($con, "select publicationID,title from publications");
                    ?> <div class="table-responsive"><table class="table"><?php
                        while ($row = mysqli_fetch_array($r)) {
                            ?> <tr>
                                    <td style="width: 4000px; max-width: 100%"><input type="checkbox" id="startdate" name="startdate[]" value="<?php echo $row['publicationID'] ?>">         
                                        <?php echo $row['title'] ?></td></tr>
                                <?php
                            }
                            ?></table></div><br/>
                    <input class="form-control" type="submit" class="btn btn-default" value="Submit"/>
                    <?php if ($reschange == 1) { ?>
                        <a style='text-align: center;' href="practisera.php?reschange=1" class="btn btn-default" type="buttton" class="form-control" value="Cancel"/>Cancel</a><?php } else { ?>
                        <a style='text-align: center;' href="practisera.php?reschange=2" class="btn btn-default" type="buttton" class="form-control" value="Cancel"/>Cancel</a><?php } ?>
                    <br/>

                </form>

                <form action="deletera.php" method="post" id="newsdelete" class="newsdelete">
                    <textarea type="text" name="id" id="newsdeleteID" style="display:none"/></textarea>
                    Continue with deleting selected news? <input class="btn btn-default" type="submit" class="btn-news" value="YES"/>
                    <?php if ($reschange == 1) { ?>
                        <a style='text-align: center;' href="practisera.php?reschange=1" class="btn btn-default" type="buttton" class="form-control" value="Cancel"/>Cancel</a><?php } else { ?>
                        <a style='text-align: center;' href="practisera.php?reschange=2" class="btn btn-default" type="buttton" class="form-control" value="Cancel"/>Cancel</a><?php } ?>
                </form>

                <!--The description and image of every news that are dynamically changed through the functions-->
               <!--<table id="example" class="display" width="100%"></table>-->
                <h1 id="descr" style="display: none;"></h1><br/>
                <?php
                if ($type > 0) {
                    ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary" id="editnews" onClick="editNew()"/> Edit </button>
                        <button type="button" class="btn btn-primary" id="deletenews" onClick="deleteNew()"/> Delete </button>
                    </div>
                <?php } ?>
                <h1 id="descr2" style="font-weight: bold;"></h1><br/>
                <h3 id="descr3" style="text-align: left; word-wrap: break-word;"></h3><br/>
                <div class="table-responsive">
                    <table class="table" id="descrtable">
                        <tr>
                            <td style="width: 4000px; max-width: 100%"><p id="descr4" style="text-align: right; color: #2E76F3; font-size: 15px !important; "></p></td>
                        </tr>
                        <tr>
                            <td style="width: 4000px; max-width: 100%">
                                <fieldset>
                                    <legend style="text-align: center;"><h2 style="font-size: 22px !important; "><i>Relevant publications:</i></h2></legend>
                                    <h3 id="descr5" style="text-align: left; font-size: 22px !important; "></h3><br/>
                                </fieldset>
                            </td>
                        </tr>
                    </table></div>


                <script>
                    function addNew()
                    {
                        document.getElementById("newsadd").style.display = 'inline';
                        document.getElementById("newsedit").style.display = 'none';
                        document.getElementById("editnews").style.display = 'none';
                        document.getElementById("deletenews").style.display = 'none';
                        document.getElementById("newstable").style.display = 'none';
                        document.getElementById("descrtable").style.display = 'none';
                        document.getElementById("newsdelete").style.display = 'none';
                        document.getElementById('descr').innerHTML = '';
                        document.getElementById('descr2').innerHTML = '';
                        document.getElementById('descr3').innerHTML = '';
                        document.getElementById('descr4').innerHTML = '';
                        document.getElementById('descr5').innerHTML = '';
                    }
                </script> 
                <script>
                    function editNew()
                    {
                        document.getElementById("newsadd").style.display = 'none';
                        document.getElementById("editnews").style.display = 'none';
                        document.getElementById("deletenews").style.display = 'none';
                        document.getElementById("newsdelete").style.display = 'none';
                        document.getElementById("newstable").style.display = 'none';
                        document.getElementById("descrtable").style.display = 'none';
                        document.getElementById("newsedit").style.display = 'inline';
                        document.getElementById('descr').innerHTML = '';
                        document.getElementById('descr2').innerHTML = '';
                        document.getElementById('descr3').innerHTML = '';
                        document.getElementById('descr4').innerHTML = '';
                        document.getElementById('descr5').innerHTML = '';
                    }
                </script>
                <script>
                    function deleteNew()
                    {
                        document.getElementById("newsadd").style.display = 'none';
                        document.getElementById("newsedit").style.display = 'none';
                        document.getElementById("editnews").style.display = 'none';
                        document.getElementById("newstable").style.display = 'none';
                        document.getElementById("deletenews").style.display = 'none';
                        document.getElementById("descrtable").style.display = 'none';
                        document.getElementById("newsdelete").style.display = 'inline';
                        document.getElementById('descr').innerHTML = '';
                        document.getElementById('descr2').innerHTML = '';
                        document.getElementById('descr3').innerHTML = '';
                        document.getElementById('descr4').innerHTML = '';
                        document.getElementById('descr5').innerHTML = '';
                    }
                </script>
                <script>
                    function showDescription(id)
                    {
                        document.getElementById("newsadd").style.display = 'none';
                        document.getElementById("newsedit").style.display = 'none';
                        document.getElementById("newstable").style.display = 'none';
                        document.getElementById("newsdelete").style.display = 'none';
                        document.getElementById("editnews").style.display = 'inline';
                        document.getElementById("descrtable").style.display = 'table';
                        document.getElementById("deletenews").style.display = 'inline';
                        document.getElementById("newseditDescr").innerHTML = id[2];
                        document.getElementById("newseditID").innerHTML = id[0];
                        document.getElementById("newsdeleteID").innerHTML = id[0];
                        document.getElementById("newseditTitle").innerHTML = id[1];
                        if (id[3] == "Software Engineering")
                        {
                            document.getElementById("newseditPartners").checked = true;
                        } else if (id[3] == " Intelligent Information Systems")
                        {
                            document.getElementById("newseditPartners2").checked = true;
                        }
                        document.getElementById("startdate").innerHTML = id[5];
                        document.getElementById("descr").innerHTML = id[0];
                        document.getElementById("descr2").innerHTML = id[1];
                        document.getElementById("descr3").innerHTML = id[2];
                        document.getElementById("descr4").innerHTML = "Type: " + id[3];
                        document.getElementById("descr5").innerHTML = id[5];
                        document.getElementById("relevantpubs").innerHTML = id[5];

                    }
                </script> 
            </div>
        </div>
    </div></div>
</body>
</html> 