<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <meta charset="UTF-8">
        <style type="text/css">

            .hrclass{
                color: #A9E2F3;
            }

            a{
                color: #2E76F3;
                text-decoration: none;
            }

            html {
                position: relative;
                min-height: 100%;
            }

            body {
  font-family: Raleway !important;
  margin:0;
   padding:0;
}

            .projectsactive {
                background-color: #4d90fe;
            }


            table {
                border-collapse: collapse;
                width: 100%;
                table-layout:fixed;
            }

            th, td {
                width: 600px;
                text-align: left;
                padding: 8px;
            }
            tr:nth-child(even){background-color: #f2f2f2}

            th {
                background-color: #A42D2D;
                color: white;
            }
            tr:nth-child(even){background-color: #DDEBF3}

            thead, tbody { display: block; }
            tbody {
                height: 100px;       
                overflow-y: auto;    
                overflow-x: hidden;
            }
            .nav-ra{
                text-align: center;
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
                font-family: 'Muli', sans-serif;
                z-index: -1;
            }

            .container {
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
                font-family: 'Muli', sans-serif;
                z-index: -1;
            }

        </style>
        <meta charset="utf-8">
        <title>Projects</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="jquery-3.2.1.min.js">
            $("table tr").contents().filter(function () {
                return this.nodeType === 3;
            }).remove();
        </script>
    </head>

    <body>
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
                <ul class="nav navbar-nav" style="color: #095dbc">
                                    <a target="_blank" href="index.html">
                    <img src="logoshort.png" alt="seiis logo" width="100" height="40" align="left" style="margin-top: 10px; margin-left: -10px;"/></a>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="News.php?newschange=0">News</a></li>
                    <li class="active"><a href="projects.php">Projects</a></li>
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
        <div class="news-title" style="margin-left: 200px; margin-right: 200px;">
           

            <div id="container">

                <!-- These are the forms that are showed when the Add,Edit,Delete Projects buttons are clicked -->

                <newscolumn class="newscolumn" id="newscolumn"><br/><br/>
                    <?php
                    if ($type > 0) {
                        ?>
                        <button type="button" class="btn btn-primary" id="addnews" style="vertical-align:middle;"  onClick="addNew()"/> Create Project </button> <br/><br/>

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

                    <div>
                        <div class="table-responsive">
                            <table class="table" id="newstable" border="0">
                                <thead>
                                    <tr>
                                <fieldset><legend>Search Project</legend>

                                    <?php
                                    if (isset($_POST["namesearch"]) || (isset($_POST["sdsearch"])) || (isset($_POST["edsearch"]))) {
                                        $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                                        mysqli_select_db($con, "project3");
                                        $searchquery = $_POST["namesearch"];
                                        $searchquery1 = $_POST["sdsearch"];
                                        $searchquery2 = $_POST["edsearch"];
                                        if (!empty($searchquery) && (empty($searchquery1)) && (empty($searchquery2))) {
                                            $_SESSION["searchquery0"] = mysqli_query($con, "select * from projects where title like '$searchquery%'");
                                        } else if (empty($searchquery) && (!empty($searchquery1)) && (empty($searchquery2))) {
                                            $_SESSION["searchquery0"] = mysqli_query($con, "select * from projects where startdate>='$searchquery1'");
                                        } else if (empty($searchquery) && (empty($searchquery1)) && (!empty($searchquery2))) {
                                            $_SESSION["searchquery0"] = mysqli_query($con, "select * from projects where enddate<='$searchquery2'");
                                        } else if (!empty($searchquery) && (!empty($searchquery1)) && (empty($searchquery2))) {
                                            $_SESSION["searchquery0"] = mysqli_query($con, "select * from projects where title like '$searchquery%' and startdate>='$searchquery1'");
                                        } else if (!empty($searchquery) && (empty($searchquery1)) && (!empty($searchquery2))) {
                                            $_SESSION["searchquery0"] = mysqli_query($con, "select * from projects where title like '$searchquery%' and enddate<='$seachquery2'");
                                        } else if (empty($searchquery) && (!empty($searchquery1)) && (!empty($searchquery2))) {
                                            $_SESSION["searchquery0"] = mysqli_query($con, "select * from projects where startdate>='$searchquery1' and enddate<='$seachquery2'");
                                        } else if (!empty($searchquery) && (!empty($searchquery1)) && (!empty($searchquery2))) {
                                            $_SESSION["searchquery0"] = mysqli_query($con, "select * from projects where title like '$searchquery%' and startdate>='$searchquery1' and enddate<='$searchquery2'");
                                        } else if (!empty($searchquery) && (!empty($searchquery1)) && (!empty($searchquery2))) {
                                            $_SESSION["searchquery0"] = mysqli_query($con, "select * from projects where title like '$searchquery%' and startdate>='$searchquery1' and enddate<='$searchquery2'");
                                        } else {
                                            $_SESSION["searchquery0"] = mysqli_query($con, "select * from projects");
                                        }
                                        ?>
                                        <form id="searchform" action="projects.php" method="POST">
                                            SEARCH BY  Title:<input class="form-control" type="text" name="namesearch" placeholder="<leave blank for full list>" >
                                            Start Date: <input class="form-control" type="date" name="sdsearch" placeholder="<leave blank for full list>" >
                                            End Date: <input class="form-control" type="date" name="edsearch" placeholder="<leave blank for full list>" >
                                            <input class="form-control" type="submit" value="GO">
                                        </form>
                                        <?php
                                    } else {
                                        ?>
                                        <form id="searchform" action="projects.php" method="POST">
                                            SEARCH BY Title:<input class="form-control" type="text" name="namesearch" placeholder="<leave blank for full list>" >
                                            Start Date: <input class="form-control" type="date" name="sdsearch" placeholder="<leave blank for full list>">
                                            End Date: <input class="form-control" type="date" name="edsearch" placeholder="<leave blank for full list>">
                                            <input class="form-control" type="submit" value="GO">
                                        </form><?php
                                    }
                                    ?>
                                    </tr></fieldset>
                                </thead>

                                <tbody style="overflow-y: scroll; height:1000px;">
                                    <?php
                                    $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                                    mysqli_select_db($con, "project3");
                                    if ((isset($_SESSION["searchquery0"])) && (!empty($_SESSION["searchquery0"]))) {
                                        $result = $_SESSION["searchquery0"];
                                    } else {
                                        $result = mysqli_query($con, "select * from projects");
                                        $_SESSION["searchquery0"] = $result;
                                    }
                                    $times = array();
                                    while ($row = mysqli_fetch_array($result)) {
                                        $times[0] = $row["projectID"];
                                        $times[1] = $row["title"];
                                        $times[2] = $row["aim"];
                                        $times[3] = $row["partners"];
                                        $times[4] = date("d-m-Y", strtotime($row["startdate"]));
                                        $times[5] = date("d-m-Y", strtotime($row["enddate"]));
                                        $times[6] = $row["duration"];
                                        $times[7] = $row["cutbudget"];
                                        $times[8] = $row["totalbudget"];
                                        $times[9] = $row["website"];
                                        $times[14] = $row["type"];
                                        $times[15] = $row["category"];
                                        $times[16] = date("Y-m-d", strtotime($row["startdate"]));
                                        $times[17] = date("Y-m-d", strtotime($row["enddate"]));
                                        ?>


                                        <tr>
                                            <td style="width: 4000px;"><a href="#" id="<?php echo $row["projectID"]; ?>" value="<?php echo $row["projectID"] ?>" name="<?php echo $row["partners"] ?>" style="color: #2E76F3;" onClick='showDescription(<?php echo json_encode($times); ?>)'>
                                                    <?php echo $row["title"]; ?></a></td>
                                            <td style="width: 4000px;"> <?php echo date("d-m-Y", strtotime($row["startdate"])); ?></td>
                                            <td style="width: 4000px;"><?php echo date("d-m-Y", strtotime($row["enddate"])); ?></td>
                                        </tr>
                                    <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- TELOS PINAKA-->

                    <br/>
                    <form action="createproject.php" method="post" id="newsadd" class="newsadd">
                        Title: <input type="text" class="form-control" name="title" required/>
                        Project Aim: 
                        <textarea name="aim" class="form-control" rows="5" cols="30"></textarea>
                        Partners: <input type="text" class="form-control" name="partners" />
                        Start date: <input type="date" class="form-control" name="startdate" />
                        End date: <input type="date" class="form-control" name="enddate" />
                        <input type="number" class="form-control" name="duration" hidden/>
                        CUT budget: <input type="number" class="form-control" name="cutbudget" />
                        TOTAL budget: <input type="number" class="form-control" name="totalbudget" />
                        Website: <input type="text" class="form-control" name="website"/>
                        Category: <input type="text" class="form-control" name="category"/>
                        Type: <select name="type" class="form-control">
                            <option>Coordinator</option>
                            <option>Partner</option>
                        </select> <br/>
                        <input class="btn btn-default" type="submit" value="Submit"/>
                        <a class="btn btn-default" type="button" href="projects.php">Cancel</a>
                    </form>

                    <form action="editproject.php" method="post" id="newsedit" class="newsedit">
                        <textarea type="text" name="id" id="newseditID" style="display:none" /></textarea>
                        Title: <textarea type="text" class="form-control" name="title" id="newseditTitle" rows="1" style="resize: none;"/></textarea>
                        Aim: 
                        <textarea name="Descr" id="newseditDescr" class="form-control" rows="5" cols="30"></textarea>
                        Partners: <textarea type="text" name="partners" class="form-control" rows="1" id="newseditPartners" style="resize: none;" /></textarea>
                        Start Date: <input type="date" name="startdate" class="form-control" rows="1" id="startdate" style="resize: none;"/></textarea> End Date:<input type="date" class="form-control" name="enddate" id="enddate"/></textarea>
                        CUT budget: <textarea type="number" name="cutbudget" class="form-control" rows="1" id="cutbudget" style="resize: none;" /></textarea>
                        TOTAL budget: <textarea type="number" name="totalbudget" class="form-control" rows="1" id="totalbudget" style="resize: none;" /></textarea>
                        Website: <textarea type="text" name="website" id="website" class="form-control" rows="1" style="resize: none;"/></textarea>
                        Category: <textarea type="text" name="category" id="category" class="form-control" rows="1" style="resize: none;"/></textarea>
                        Type: <select name="type" id="type" class="form-control">
                            <option>Coordinator</option>
                            <option>Partner</option>
                        </select> <br/>
                        <input class="btn btn-default" type="submit" value="Submit"/>
                        <a class="btn btn-default" type="button" href="projects.php">Cancel</a>
                    </form>

                    <form action="deleteproject.php" method="post" id="newsdelete" class="newsdelete">
                        <textarea type="text" name="id" id="newsdeleteID" style="display:none"/></textarea>
                        Continue with deleting selected news? <input type="submit" class="btn btn-default" value="YES"/>
                        <a class="btn btn-default" type="button" href="projects.php">Cancel</a>
                    </form>

                    <!--The description and image of every news that are dynamically changed through the functions-->

<!--<table id="example" class="display" width="100%"></table>-->
                    <?php
                    if ($type > 0) {
                        ?>
                        <div>
                            <button  type="button" class="btn btn-primary" id="editnews" width="25" height="25" onClick="editNew()"/> Edit </button>
                            <button type="button" class="btn btn-primary" id="deletenews" width="25" height="25" onClick="deleteNew()"/> Delete </button>
                        </div>
                    <?php } ?>
                    <h1 id="descr" style="font-weight: bold; word-wrap: break-word;"></h1><br/>
                    <h2 id="descr2" style="text-align: left; word-wrap: break-word;"></h2><br/>
                    <div class="table-responsive">
                        <table class="table" id="descrtable">
                            <tr>
                                <td style="width: 4000px;" id="descr3"></td> 
                                <td style="width: 4000px;" id="descr4"></td>
                                <td style="width: 4000px;" id="descr5"></td>
                            </tr>
                            <tr>
                                <td style="width: 4000px;" id="descr6"></td> 
                                <td style="width: 4000px;" id="descr7"></td>
                                <td style="width: 4000px;" id="descr8"></td>
                            </tr>
                        </table>
                        <br/>

                        <p id="descr9" style="text-align: center;"></p><br/>
                        <!--<img src="" name="descr_img" id="descr_img"/></img>-->

                        <script>
                            function addNew()
                            {
                                document.getElementById("newsadd").style.display = 'inline';
                                document.getElementById("newsedit").style.display = 'none';
                                document.getElementById("editnews").style.display = 'none';
                                document.getElementById("deletenews").style.display = 'none';
                                document.getElementById("newstable").style.display = 'none';
                                document.getElementById("newsdelete").style.display = 'none';
                                document.getElementById("descrtable").style.display = 'none';
                                document.getElementById('descr').innerHTML = '';
                                document.getElementById('descr2').innerHTML = '';
                                document.getElementById('descr3').innerHTML = '';
                                document.getElementById('descr4').innerHTML = '';
                                document.getElementById('descr5').innerHTML = '';
                                document.getElementById('descr6').innerHTML = '';
                                document.getElementById('descr7').innerHTML = '';
                                document.getElementById('descr8').innerHTML = '';
                                document.getElementById('descr9').innerHTML = '';
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
                                document.getElementById('descr6').innerHTML = '';
                                document.getElementById('descr7').innerHTML = '';
                                document.getElementById('descr8').innerHTML = '';
                                document.getElementById('descr9').innerHTML = '';
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
                                document.getElementById('descr6').innerHTML = '';
                                document.getElementById('descr7').innerHTML = '';
                                document.getElementById('descr8').innerHTML = '';
                                document.getElementById('descr9').innerHTML = '';

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
                                document.getElementById("deletenews").style.display = 'inline';
                                document.getElementById("newseditDescr").innerHTML = id[2];
                                document.getElementById("newseditID").innerHTML = id[0];
                                document.getElementById("newseditTitle").innerHTML = id[1];
                                document.getElementById("newseditPartners").innerHTML = id[3];
                                document.getElementById("startdate").value = id[16];
                                document.getElementById("enddate").value = id[17];
                                document.getElementById("cutbudget").innerHTML = id[7];
                                document.getElementById("totalbudget").innerHTML = id[8];
                                document.getElementById("website").innerHTML = id[9];
                                document.getElementById("category").innerHTML = id[15];
                                document.getElementById("type").value = id[14];
                                document.getElementById("newsdeleteID").innerHTML = id[0];
                                document.getElementById("descr").innerHTML = id[1];
                                document.getElementById("descr2").innerHTML = "Aim:<br/><br/>" + id[2];
                                document.getElementById("descr3").innerHTML = "Partners: " + id[3];
                                document.getElementById("descr4").innerHTML = "Start Date: " + id[4];
                                document.getElementById("descr5").innerHTML = "End Date: " + id[5];
                                document.getElementById("descr6").innerHTML = "Duration: " + id[6];
                                document.getElementById("descr7").innerHTML = "CUT Budget: " + id[7];
                                document.getElementById("descr8").innerHTML = "Total Budget: " + id[8];
                                document.getElementById("descr9").innerHTML = id[9];
                                document.getElementById("descrtable").style.display = 'inline';
                            }
                        </script> 

                </newscolumn>
            </div>
        </div>
    </div>
</body>
</html>