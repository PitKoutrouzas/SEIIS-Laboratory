<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <meta charset="UTF-8">
        <style type="text/css">
            hrclass{
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
                font-weight: bold;
                z-index: -1;
            }

        </style>
        <meta charset="UTF-8">
        <title>Publications</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    </head>
    <body>
        <!--HEADER START-->
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

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Research Areas
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="practisera.php?reschange=1" >Software Engineering</a></li>
                            <li><a href="practisera.php?reschange=2" >Intelligent Information Systems</a></li>
                        </ul>
                    </li>
                    <li class="dropdown active">
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
                <?php $pubchange = $_GET['pubchange']; ?>   
                <?php
                if ($type > 0) {
                    ?>
                </br>
                    <button type="button" class='btn btn-primary' id="addnews" style="vertical-align:middle;"  onClick="addNew()"/> Add Publication </button><br/><br/>
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
                            <tr> <fieldset><legend>Search Publication</legend>
                            <?php
                            if (isset($_POST["titlesearch"]) || (isset($_POST["typesearch"]))) {
                                $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                                mysqli_select_db($con, "project3");
                                $searchquery = $_POST["titlesearch"];
                                $searchquery4 = $_POST["typesearch"];

                                if (!empty($searchquery) && (empty($searchquery4))) {
                                    if ($pubchange == 1) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and type = 'Journals'");
                                    } else if ($pubchange == 2) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and type = 'Conferences'");
                                    } else if ($pubchange == 3) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and type = 'Books'");
                                    } else if ($pubchange == 4) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and type = 'Book Chapters'");
                                    } else if ($pubchange == 5) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and type = 'Editorials'");
                                    } else {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%'");
                                    }
                                } else if (empty($searchquery) && (!empty($searchquery4))) {
                                    if ($pubchange == 1) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where creator = '$searchquery4' and type = 'Journals'");
                                    } else if ($pubchange == 2) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where creator = '$searchquery4' and type = 'Conferences'");
                                    } else if ($pubchange == 3) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where creator = '$searchquery4' and type = 'Books'");
                                    } else if ($pubchange == 4) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where creator = '$searchquery4' and type = 'Book Chapters'");
                                    } else if ($pubchange == 5) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where creator = '$searchquery4' and type = 'Editorials'");
                                    } else {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where creator = '$searchquery4'");
                                    }
                                } else if (!empty($searchquery) && (!empty($searchquery4))) {
                                    if ($pubchange == 1) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and creator='$searchquery4' and type = 'Journals'");
                                    } else if ($pubchange == 2) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and creator='$searchquery4' and type = 'Conferences'");
                                    } else if ($pubchange == 3) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and creator='$searchquery4' and type = 'Books'");
                                    } else if ($pubchange == 4) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and creator='$searchquery4' and type = 'Book Chapters'");
                                    } else if ($pubchange == 5) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and creator='$searchquery4' and type = 'Editorials'");
                                    } else {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where title like '$searchquery%' and creator='$searchquery4'");
                                    }
                                } else {
                                    if ($pubchange == 1) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where type = 'Journals'");
                                    } else if ($pubchange == 2) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where type = 'Conferences'");
                                    } else if ($pubchange == 3) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where  type = 'Books'");
                                    } else if ($pubchange == 4) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where type = 'Book Chapters'");
                                    } else if ($pubchange == 5) {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications where type = 'Editorials'");
                                    } else {
                                        $_SESSION["searchquery4"] = mysqli_query($con, "select * from publications");
                                    }
                                }
                                ?>
                                <form id="searchform" action="publications.php?pubchange=<?php echo $pubchange; ?>" method="POST">
                                    Search by Title:<input class="form-control" type="text" name="titlesearch" placeholder="<leave blank for full list>">
                                    Creator: <select class="form-control" name="typesearch">
                                        <option></option>
                                        <?php
                                        $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                                        mysqli_select_db($con, "project3");
                                        $optionQueryUsername = "SELECT * FROM userss";
                                        $optionQueryResultUsername = mysqli_query($con, $optionQueryUsername);

                                        while ($row = mysqli_fetch_array($optionQueryResultUsername)) {
                                            ?>
                                            <option value="<?php echo $row["memberID"] ?>"> <?php echo $row["username"]; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <input type="submit" class="form-control" value="GO">
                                </form>
                                <?php
                            } else {
                                ?>
                                <form id="searchform" action="publications.php?pubchange=<?php echo $pubchange; ?>" method="POST">
                                    Search by Title:<input class="form-control" type="text" name="titlesearch" placeholder="<leave blank for full list>"/>
                                    Creator: <select class="form-control" name="typesearch" >
                                        <option></option>
                                        <option>
                                            <?php
                                            $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                                            mysqli_select_db($con, "project3");
                                            $optionQueryUsername = "SELECT memberID,memberName, memberSurname FROM userss";
                                            $optionQueryResultUsername = mysqli_query($con, $optionQueryUsername);

                                            while ($row = mysqli_fetch_array($optionQueryResultUsername)) {
                                                ?>
                                            <option value="<?php echo $row["memberID"] ?>"> <?php echo $row["memberName"] . " " . $row["memberSurname"]; ?> </option>
                                            <?php
                                        }
                                        ?>
                                        </option>
                                    </select>
                                    <input type="submit" class="form-control" value="GO" style="font-weight: bold; font-family: 'Muli', sans-serif; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"/>
                                </form><?php
                            }
                            ?>
                            </tr></fieldset>
                        </thead>


                        <tbody class="tablebody" style="overflow-y: scroll; height:1000px;">

                            <?php
                            $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                            mysqli_select_db($con, "project3");
                            if ((isset($_SESSION["searchquery4"])) && (!empty($_SESSION["searchquery4"]))) {
                                $result = $_SESSION["searchquery4"];
                            } else {
                                if ($pubchange == 1) {
                                    $result = mysqli_query($con, "select * from publications where type = 'Journals'");
                                } else if ($pubchange == 2) {
                                    $result = mysqli_query($con, "select * from publications where type = 'Conferences'");
                                } else if ($pubchange == 3) {
                                    $result = mysqli_query($con, "select * from publications where type = 'Books'");
                                } else if ($pubchange == 4) {
                                    $result = mysqli_query($con, "select * from publications where type = 'Book Chapters'");
                                } else if ($pubchange == 5) {
                                    $result = mysqli_query($con, "select * from publications where type = 'Editorials'");
                                } else {
                                    $result = mysqli_query($con, "select * from publications");
                                }
                                $_SESSION["searchquery4"] = $result;
                            }
                            $times = array();
                            while ($row = mysqli_fetch_array($result)) {
                                $times[0] = $row["publicationID"];
                                $times[1] = $row["title"];
                                $times[2] = $row["description"];
                                $times[3] = $row["partners"];
                                $times[4] = $row["upload"];
                                $times[5] = $row["type"];
                                $times[6] = $row["venue"];
                                ?>
                                <tr>
                                    <td style="width: 4000px; max-width: 100%"><a href="#" class="newstable" id="<?php echo $row["publicationID"]; ?>" value="<?php echo $row["publicationID"] ?>" name="<?php echo $row["upload"]; ?>" style="color: #2E76F3;" onClick='showDescription(<?php echo json_encode($times); ?>, name)'>
                                            <?php echo $row["title"]; ?></a></td>
                                    <td style="width: 4000px; max-width: 100%"> <?php echo $row["type"]; ?></td>
                                </tr>
                            <?php }
                            ?>
                        </tbody>
                    </table>
                </div>

                <!-- TELOS PINAKA-->
                <br/>
                <form action="createpublication.php" method="post" id="newsadd" class="newsadd" enctype="multipart/form-data">
                    Title: <input class="form-control" type="text" name="title" required/>
                    <br/>
                    Description: 
                    <br/>
                    <textarea class="form-control" name="aim" rows="5" cols="30" ></textarea>
                    <br/>
                    Partners: <input class="form-control" type="text" name="partners" />
                    <br/>
                    Venue: <input class="form-control" type="text" name="venue"/>
                    <br/>
                    Upload File: <input class="form-control" type="file" name="upload" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf"/>
                    <br/><br/>
                    Category: <select class="form-control" name="type" required>
                        <option value="Journals">Journals</option>
                        <option value="Conferences">Conferences</option>
                        <option value="Books">Books</option>
                        <option value="Book Chapters">Book Chapters</option>
                        <option value="Editorials">Editorials</option>
                    </select>
                    <br/><br/>
                    <input class="btn btn-default"  type="submit" class="btn-news" value="Submit"/>
                    <?php if ($pubchange == 1) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=1">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 2) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=2">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 3) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=3">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 4) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=4">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 5) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=5">Cancel</a> <?php } ?>

                </form>

                <form action="editpublication.php" method="post" id="newsedit" class="newsedit" enctype="multipart/form-data">
                    <textarea class="form-control" type="text" name="id" id="newseditID" style="display:none" /></textarea>
                    Title: <textarea class="form-control" type="text" name="title" id="newseditTitle" rows="1" style="resize: none;"/></textarea>
                    <br/>
                    Description: 
                    <br/>
                    <textarea class="form-control" name="Descr" id="newseditDescr" rows="5" cols="30"></textarea>
                    <br/>
                    Partners: <textarea class="form-control" type="text" name="partners" rows="1" id="newseditPartners" style="resize: none;"/></textarea>
                    <br/>
                    Venue: <textarea class="form-control" type="text" name="venue" rows="1" id="newseditVenue" style="resize: none;"/></textarea>
                    <br/>
                    Upload File: <input class="form-control" type="file" name="newseditFile" id="newseditFile" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf"/>
                    <text id="uploadedfile"> </text>
                    <br/>
                    Category: <select class="form-control" name="type" id="type" required>
                        <option id="newsdisabled" selected disabled></option>
                        <option value="Journals">Journals</option>
                        <option value="Conferences">Conferences</option>
                        <option value="Books">Books</option>
                        <option value="Book Chapters">Book Chapters</option>
                        <option value="Editorials">Editorials</option>
                    </select>

                    <br/><br/>
                    <input type="submit" class="btn btn-default"  value="Submit"/>
                    <?php if ($pubchange == 1) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=1">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 2) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=2">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 3) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=3">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 4) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=4">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 5) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=5">Cancel</a> <?php } ?>
                </form>
                <form action="deletepublication.php" method="post" id="newsdelete" class="newsdelete">
                    <textarea class="form-control" type="text" name="id" id="newsdeleteID" style="display:none"/></textarea>
                    Continue with deleting selected news? <input type="submit" class="btn btn-default"  value="YES"/>
                    <?php if ($pubchange == 1) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=1">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 2) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=2">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 3) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=3">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 4) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=4">Cancel</a> <?php } ?>
                    <?php if ($pubchange == 5) { ?> <a class="btn btn-default" type="button" href="publications.php?pubchange=5">Cancel</a> <?php } ?>
                </form>

                <?php
                if ($type > 0) {
                    ?>
                    <div>
                        <button type="button" class='btn btn-primary' id="editnews" width="25" height="25" onClick="editNew()"/> Edit </button>
                        <button type="button" class='btn btn-primary' id="deletenews" width="25" height="25" onClick="deleteNew()"/> Delete </button>
                    </div>
                <?php } ?>
                <h1 id="descr" style="font-weight: bold; word-wrap: break-word;" ></h1><br/>

                <h3 id="descr2" style="text-align: left; word-wrap: break-word;" ></h3><br/>
                <div class="table-responsive">
                    <table class="table" id="descrtable">
                        <tr>
                            <td style="width: 4000px; max-width: 100%"></td> 
                            <td style="width: 4000px; max-width: 100%"></td>
                            <td style="width: 4000px; max-width: 100%"></td>
                        </tr>
                        <tr>
                            <td id="descr3" style="width: 4000px; max-width: 100%"></td> 
                            <td id="descr4" style="width: 4000px; max-width: 100%"></td>
                            <td id="descr5" style="width: 4000px; max-width: 100%">File: <a id="descrfile" href="" target='' style="color: #4d90fe;"></a></td>
                        </tr>
                    </table>
                </div>

                <img src="" name="descr_img" id="descr_img"/>
                <script>
                    function pubchange(choice)
                    {
                        window.location = 'publications.php?pubchange=' + choice;
                    }
                </script>

                <script>
                    function addNew()
                    {
                        document.getElementById("newsadd").style.display = 'inline';
                        document.getElementById("newsedit").style.display = 'none';
                        document.getElementById("editnews").style.display = 'none';
                        document.getElementById("deletenews").style.display = 'none';
                        document.getElementById("newstable").style.display = 'none';
                        document.getElementById("newsdelete").style.display = 'none';
                        document.getElementById('descr').innerHTML = '';
                        document.getElementById('descr2').innerHTML = '';
                        document.getElementById('descr3').innerHTML = '';
                        document.getElementById("descr_img").src = "";
                        document.getElementById('descr4').innerHTML = '';
                        document.getElementById("descrtable").style.display = 'none';
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
                        document.getElementById("newsedit").style.display = 'inline';
                        document.getElementById('descr').innerHTML = '';
                        document.getElementById('descr2').innerHTML = '';
                        document.getElementById('descr3').innerHTML = '';
                        document.getElementById('descr4').innerHTML = '';
                        document.getElementById("descr_img").src = "";
                        document.getElementById("descrtable").style.display = 'none';

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
                        document.getElementById("descr_img").src = "";
                        document.getElementById('descr4').innerHTML = '';
                    }
                </script>
                <script>
                    function showDescription(id, name)
                    {
                        document.getElementById("newsadd").style.display = 'none';
                        document.getElementById("newsedit").style.display = 'none';
                        document.getElementById("newstable").style.display = 'none';
                        document.getElementById("newsdelete").style.display = 'none';
                        document.getElementById("editnews").style.display = 'inline';
                        document.getElementById("deletenews").style.display = 'inline';
                        document.getElementById("descrtable").style.display = 'inline';
                        document.getElementById("newseditDescr").innerHTML = id[2];
                        document.getElementById("newseditID").innerHTML = id[0];
                        document.getElementById("newseditTitle").innerHTML = id[1];
                        document.getElementById("newseditPartners").innerHTML = id[3];
                        document.getElementById("newseditVenue").innerHTML = id[6];
                        document.getElementById("newsdisabled").innerHTML = id[5];
                        document.getElementById("uploadedfile").innerHTML = "(Currently stored: " + id[4] + ")";
                        document.getElementById("newsdeleteID").innerHTML = id[0];
                        document.getElementById("descr").innerHTML = id[1];
                        document.getElementById("descr2").innerHTML = "Description: <br/><br/>" + id[2];
                        document.getElementById("descr3").innerHTML = "Partners : " + id[3];
                        document.getElementById("descr_img").style.display = 'inline';
                        document.getElementById("descrfile").href = id[4];
                        document.getElementById("descrfile").innerHTML = id[4];
                        document.getElementById("descrfile").target = id[4];
                        document.getElementById("descr4").innerHTML = "Category : " + id[5];


                        if (name === "")
                        {
                            document.getElementById("descr_img").style.display = 'none';
                        }
                    }
                </script> 
                </newscolumn>
            </div>
        </div>
    </body>
</html>
