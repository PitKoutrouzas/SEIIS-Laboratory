<!doctype html>
<!-- Na dimiourgisw form me collapsibles mesa kai na valw ena scroll mesa-->
<html>
    <head>
        <meta charset="UTF-8">
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

            .newsactive {
                background-color: #4d90fe;
            }
            .nav-tm{
                text-align: center;
            }

            .newseditTitle{
                width: 221px;
                background: transparent url("bg.jpg") no-repeat;
                color : #747862;
                height:20px;
                border:0;
                padding:4px 8px;
                margin-bottom:0px;
            }

            .newseditDescr{
                color : #747862;
                height:20px;
                border:0;
                padding:4px 8px;
                margin-bottom:0px;
            } 
            table {
                border-collapse: collapse;
            }

            th {
                background-color: #A42D2D;
                color: white;
            }

            thead { display: block; }
            tbody {
                height: 800px;       
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
                font-size: 20px;
                height: 70px;
                line-height: 30px;
                background: #355681;	
                padding: 5px 15px;
                color: white;
                box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
                z-index: -1;
            }

            .container{
                position: relative;
                text-align: center;
                text-shadow: 0 -1px rgba(0,0,0,0.6);
                font-size: 19px;
                height: 70px;
                line-height: 30px;
                background: #355681;	
                padding: 5px 15px;
                color: white;
                box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
            }

            #container {
                width : 100%;
                height : auto;
                min-height: 600px;
                position: relative;
                text-shadow: 0 -1px rgba(0,0,0,0.6);
                font-size: 19px;
                line-height: 30px;
                color: white
            }



            .gobtn,.gobtn2,.btn-news {
                box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);   background: #3498db;
                background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
                background-image: -moz-linear-gradient(top, #3498db, #2980b9);
                background-image: -ms-linear-gradient(top, #3498db, #2980b9);
                background-image: -o-linear-gradient(top, #3498db, #2980b9);
                background-image: linear-gradient(to bottom, #3498db, #2980b9);
                -webkit-border-radius: 20;
                -moz-border-radius: 20;
                border-radius: 20px;
                color: #ffffff;
                font-size: 14px;
                padding: 8px 20px 8px 20px;
                text-decoration: none;
            }

            .gobtn:hover, .gobtn2:hover, .addnewsbtn:hover
            {
                background: #3cb0fd;
                background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
                background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
                background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
                background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
                background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
                text-decoration: none;
            }

            .latestnews {
                height : 980px;
                padding-right: 50px;
                padding-left: 50px;
                width: 300px;
                position:relative;
                margin-left: -10px;
                text-align: center;
                z-index: 5;
            }

            .newscolumn {
                min-height: 500px;
                height : 800px;
                float: left;
                position:relative;
                color: black;
                text-decoration: none;
                text-align: center;
                width: 100%;
            }

        </style>
        <meta charset="utf-8">
        <!-- Latest compiled JavaScript -->

        <title>News</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

        <!-- jQuery library -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function () {
                $('.dropdown-toggle').dropdown();
            });
        </script>

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
                <li class="active"><a href="News.php?newschange=0">News</a></li>
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

        };
    </script>

        <div id="container">
            <?php
            if ($type > 0) {
                ?>
                <latestnews class="latestnews">
                <?php }
                ?>
            </latestnews>

            <!-- These are the forms that are showed when the Add,Edit,Delete News buttons are clicked -->

            <newscolumn class="newscolumn" id="newscolumn">
                <?php
                $newschange = $_GET['newschange'];


                if ($type > 0) {
                    ?>
                    <button type="button" align="left" style="width:200px; left: 0px;" class="btn btn-primary" id="addnews" onClick="addNew()"/> Add News </button>
                    <br/>
                    <div class="btn-group">   
                        <button type="button" class="btn btn-primary" style="width:200px;" id="editnews" onClick="editNew()"/> Edit </button>
                        <button type="button" class="btn btn-primary" style="width:200px;" id="deletenews" onClick="deleteNew()"/> Delete </button>
                        <br/>
                    </div>
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
                            <thead style='width:100%;'>
                                <tr>
                                    <?php
                                    if (isset($_POST["namesearch"])) {
                                        $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                                        mysqli_select_db($con, "project3");
                                        $searchquery = $_POST["namesearch"];
                                        if (!empty($searchquery)) {
                                            $_SESSION["searchquery"] = mysqli_query($con, "select * from news where newsTitle like '$searchquery%'");
                                        } else {
                                            $_SESSION["searchquery"] = mysqli_query($con, "select * from news");
                                        }
                                        ?>
                           
                                <form id="searchform" action="News.php?newschange=0" method="POST">        
                                    <fieldset>
                                <legend>Search by Title:</legend>
                                    <input type="text" class="form-control" style="display: inline;" name="namesearch" placeholder="<leave blank for full list>" style="border:2px solid #456879; border-radius:10px; height: 22px; width: 230px;"/>
                                    <input class="form-control" type="submit" value="GO" style="box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);"/>
                                                            </fieldset>
                                </form>
                                <?php
                            } else {
                                ?>
                                <form id="searchform" action="News.php?newschange=0" method="POST">
                                    <fieldset>
                                <legend>Search by Title:</legend>
                                    <input type="text" class="form-control" style="display: inline;" name="namesearch" placeholder="<leave blank for full list>" style="border:2px solid #456879; border-radius:10px; height: 22px; width: 230px;">
                                    <input type="submit" value="GO" class="form-control">
                                </fieldset>
                                </form>
                                    <?php
                            }
                            ?>
                                </tr>
                            </thead>

                            <tbody class="tablebody" style="overflow-y: scroll; height:auto;">
                                <?php
                                $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                                mysqli_select_db($con, "project3");
                                if ((isset($_SESSION["searchquery"])) && (!empty($_SESSION["searchquery"]))) {
                                    $result = $_SESSION["searchquery"];
                                } else {
                                    if (isset($newschange) && $newschange > 0) {
                                        $result = mysqli_query($con, "select * from news where newsID='$newschange'");
                                    } else {
                                        $result = mysqli_query($con, "select * from news");
                                    }

                                    $_SESSION["searchquery"] = $result;
                                }
                                $times = array();
                                while ($row = mysqli_fetch_array($result)) {
                                    $times[0] = $row["newsID"];
                                    $times[1] = $row["newsTitle"];
                                    $times[2] = $row["newsUpload"];
                                    $times[3] = $row["description"];
                                    ?>
                                    <tr>
                                        <td style=""><a href="<?php echo "#" . $row["newsID"]; ?>" class="newstable" id="<?php echo $row["newsID"]; ?>" title="<?php echo $row["description"] ?>" name="<?php echo $row["newsUpload"] ?>" style="color: #2E76F3;"  onClick='showDescription(<?php echo json_encode($times); ?>, name)'>
                                                <?php echo $row["newsTitle"]; ?></a></td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                

                <!-- TELOS PINAKA -->

                <br/>
                <form action="addAnews.php" method="post" id="newsadd" class="newsadd" enctype="multipart/form-data">
                    Title: <input class="form-control" type="text" name="newsTitle"/>
                    <br/>
                    Description: 
                    <br/>
                    <textarea class="form-control" name="newsDescr" rows="5"  cols="99"></textarea>
                    <br/>
                    Upload Image: <input class="form-control" type="file" name="newsFile" accept="image/*"/>
                    <br/>
                    <br/>
                    <input class="btn btn-default" type="submit" value="Submit"/>
                    <a class="btn btn-default" type="button" href="News.php?newschange=0">Cancel</a>
                </form>

                <form action="editAnews.php" method="post" id="newsedit" class="newsedit" enctype="multipart/form-data">
                    <textarea type="text" class="form-control" name="newseditID" id="newseditID" style="display:none" /></textarea>
                    Title: <textarea type="text"  class="form-control" name="newseditTitle" id="newseditTitle" style="resize : none;"></textarea>
                    <br/>
                    Description: 
                    <br/>
                    <textarea name="newseditDescr" class="form-control" id="newseditDescr" rows="20" cols="100"></textarea>
                    <br/>
                    Upload Image: <input type="file" class="form-control" name="newseditFile" id="newseditFiles" accept="image/*"/>
                    <text id="uploadedfile"> </text>
                    <br/>
                    <br/>
                    <input class="btn btn-default" type="submit" value="Submit"/>
                    <a class="btn btn-default" type="button" href="News.php?newschange=0">Cancel</a>
                </form>

                <form action="deleteAnews.php" method="post" id="newsdelete" class="newsdelete">
                    <textarea type="text" name="newsdeleteID" id="newsdeleteID" style="display:none"/></textarea>
                    Continue with deleting selected news? <input class="btn btn-default" type="submit" value="YES"/>
                    <a class="btn btn-default" type="button" href="News.php?newschange=0">Cancel</a>
                </form>

                <!--The description and image of every news that are dynamically changed through the functions-->
                <div class="table-responsive">
                    <table id="example" class="table"></table></div>
                <img class="newsimage"
                     src="" name="descr_img" id="descr_img" style="min-width: 98px; min-height: 400px; max-width:980px; max-height:400px;"/></img>
                <div id="descr" style="text-align: center; left: 200px; font-size: 18px; word-wrap: break-word;">
                    <br/> 
                </div>


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
                        document.getElementById("descr_img").style.display = 'none';
                        document.getElementById("descr_img").src = "";
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
                        document.getElementById("descr_img").style.display = 'none';
                        document.getElementById("descr_img").src = "";
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
                        document.getElementById("newsdelete").style.display = 'inline';
                        document.getElementById('descr').innerHTML = '';
                        document.getElementById("descr_img").style.display = 'hidden';
                        document.getElementById("descr_img").src = "";
                    }
                </script> 
                <script>
                    function showDescription(id, image)
                    {
                        document.getElementById("newsadd").style.display = 'none';
                        document.getElementById("newsedit").style.display = 'none';
                        document.getElementById("newstable").style.display = 'none';
                        document.getElementById("newsdelete").style.display = 'none';
                        document.getElementById("editnews").style.display = 'inline';
                        document.getElementById("deletenews").style.display = 'inline';
                        document.getElementById("uploadedfile").innerHTML = "(Currently stored: " + id[2] + ")";
                        document.getElementById("newseditDescr").innerHTML = id[3];
                        document.getElementById("newseditFiles").innerHTML = id[2];
                        document.getElementById("newseditID").innerHTML = id[0];
                        document.getElementById("newseditTitle").innerHTML = id[1];
                        document.getElementById("newsdeleteID").innerHTML = id[0];
                        document.getElementById('descr').innerHTML = id[3];
                        document.getElementById("descr_img").style.display = 'inline';
                        document.getElementById("descr_img").src = image;

                        if (image === "")
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