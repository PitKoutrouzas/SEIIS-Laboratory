<!DOCTYPE html>

<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <style type="text/css">

            .hrclass{
                color: #A9E2F3;
            }

            #container {
                width : 1500px;
                height : 980px;
                margin-left : auto;
                margin-right : auto;
            }

            body {
  font-family: Raleway !important;
  margin:0;
   padding:0;
}

            .btn-news {
                font-weight: bold; font-family: 'Muli', sans-serif; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);   background: #3498db;
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
                font-family: 'Muli', sans-serif;
                z-index: -1;
            }

            .search_news{
                border:2px solid #456879; 
                border-radius:10px; 
                height: 22px; 
                width: 230px; 
                font-weight: bold; 
                font-family: 'Muli', sans-serif;
            }

            .usersactive {
                background-color: #4d90fe;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            .tablebody1, .tablebody2 {
                height: 100px;       
                overflow-y: auto;    
                overflow-x: hidden;
            }

            .thead1, .thead2 {
                font-family: "Tahoma", "Geneva", sans-serif;
            }
            .thead2, .tablebody2 {
                width: 300px;
                text-align: left;
                padding: 5px;
            }

            tr:nth-child(even){background-color: #f2f2f2}

            th {
                background-color: #3c62a3;
                color: white;
            }
            .requeststable{
                width : 600px;
                height : 980px;
                float : left;
            }

            .table1{
                width: 600px;
            }

            .table2{
                width: 600px;
            }

            .addedtable{
                width : 600px;
                height : 980px;
                float : left;
            }

            .requeststable {
                height: 35px;
                position:relative;
                margin-left: 20px;
                color: black;
                text-decoration: none;
                font-weight: bold;
                text-align: center;
                border-bottom-right-radius: 40px;
                border-top-right-radius: 40px;
                border-bottom-left-radius: 40px;
                border-top-left-radius: 40px;
                box-shadow: 0 0 9pt 2pt;
            }

            .addedtable {
                height: 35px;
                position:relative;
                margin-left: 50px;
                color: black;
                text-decoration: none;
                font-weight: bold;
                text-align: center;
                border-bottom-right-radius: 40px;
                border-top-right-radius: 40px;
                border-bottom-left-radius: 40px;
                border-top-left-radius: 40px;
                box-shadow: 0 0 9pt 2pt;
            }

        </style>
        <title>Users</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                    <li><a class="newsactive" href="News.php?newschange=0">News</a></li>
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


        <!-- Subsection to host other elements of page-->             

        <div id="container">
            <br/>
            <div class="requeststable">Requests to join
                <br/><br/><br/>
                <?php
                if (isset($_POST["nameedit"]) || isset($_POST["surnameedit"])) {
                    $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                    mysqli_select_db($con, "project3");
                    $searchquery1 = $_POST["nameedit"];
                    $searchquery2 = $_POST["surnameedit"];
                    if ((!empty($searchquery1)) && (empty($searchquery2))) {
                        $_SESSION["requestquery"] = mysqli_query($con, "select * from userss where memberName='$searchquery1' and type=0");
                    } else if ((!empty($searchquery2)) && (empty($searchquery1))) {
                        $_SESSION["requestquery"] = mysqli_query($con, "select * from userss where memberSurname='$searchquery2' and type=0");
                    } else if ((!empty($searchquery2)) && (!empty($searchquery1))) {
                        $_SESSION["requestquery"] = mysqli_query($con, "select * from userss where memberName='$searchquery1' and memberSurname='$searchquery2' and type=0");
                    } else {
                        $_SESSION["requestquery"] = mysqli_query($con, "select * from userss where type=0");
                    }
                    ?><fieldset style=" height: 500px;"><legend>SEARCH BY</legend>
                        <form action="users.php" method="post">
                            Name: <input class="form-control" type="text" name="nameedit" placeholder="<leave blank for full list>">
                            Surname: <input class="form-control" type="text" name="surnameedit" placeholder="<leave blank for full list>"><br/><br/><br/><br/><br/><br/><br/><br/>
                            <div style="height: 10px;"></div>
                            <input class="form-control" type="submit" value="Go">
                        </form></fieldset><br/>
                    <?php
                } else {
                    ?><fieldset style=" height: 500px;"><legend>SEARCH BY</legend>
                        <form action="users.php" method="post">
                            Name: <input class="form-control" type="text" name="nameedit" placeholder="<leave blank for full list>">
                            Surname: <input class="form-control" type="text" name="surnameedit" placeholder="<leave blank for full list>"><br/><br/><br/><br/><br/><br/><br/><br/>
                            <div style="height: 10px;"></div>
                            <input class="form-control" type="submit" value="Go">
                        </form></fieldset>
                    <br/><?php
                }
                ?>

                <br/>
                <div class="requeststablepart">
                    <div class="table-responsive">
                        <table class="table" border="0">
                            <thead class="thead1">
                                <tr>
                                    <th>Requests</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="tablebody" style="overflow-y: scroll; height:auto;">
                                <?php
                                $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                                mysqli_select_db($con, "project3");
                                ?>
                            <form action="Usersaccept.php" method="post"> <?php
                                if ((isset($_SESSION["requestquery"])) && (!empty($_SESSION["requestquery"]))) {
                                    $result = $_SESSION["requestquery"];
                                } else {
                                    $result = mysqli_query($con, "select * from userss where type=0");
                                    $_SESSION["requestquery"] = $result;
                                }
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["memberName"] . " " . $row["memberSurname"] . " wants to join the SEIIS Lab"; ?></td>
                                        <td>
                                            <select name="actionlistreg[]">
                                                <option value="0">Don't Accept</option>
                                                <option value="1">Registered Guest</option>
                                                <option value="2">Team Member</option>
                                            </select>
                                        </td>
                                    </tr>

                                <?php }
                                ?>
                                </tbody>
                        </table>
                    </div>
                    <br/>
                    <input class="form-control" type="submit" value="Save">
                    </form>
                </div>
            </div>


            <div class="addedtable">Registered Users<br/>

                <br/><br/><?php
                if ((isset($_POST["nameedit2"])) || (isset($_POST["surnameedit2"])) || (isset($_POST["usernameedit"])) || (isset($_POST["emailedit"])) || (isset($_POST["newsletteredit2"]))) {
                    $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                    mysqli_select_db($con, "project3");
                    $editquery1 = $_POST["nameedit2"];
                    $editquery2 = $_POST["surnameedit2"];
                    $editquery3 = $_POST["usernameedit"];
                    $editquery4 = $_POST["emailedit"];
                    $editquery5 = $_POST["newsletteredit2"];
                    //when Name is not empty
                    if ((!empty($editquery1)) && (empty($editquery2)) && (empty($editquery3)) && (empty($editquery4)) && (empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where memberName like '$editquery1%' and type!=0");
                    } else if ((!empty($editquery1)) && (!empty($editquery2)) && (empty($editquery3)) && (empty($editquery4)) && (empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where memberName like '$editquery1%' and memberSurname='$editquery2' and type!=0");
                    } else if ((!empty($editquery1)) && (empty($editquery2)) && (!empty($editquery3)) && (empty($editquery4)) && (empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where memberName like '$editquery1%' and username='$editquery3' and type!=0");
                    } else if ((!empty($editquery1)) && (empty($editquery2)) && (empty($editquery3)) && (!empty($editquery4)) && (empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where memberName like '$editquery1%' and email='$editquery4' and type!=0");
                    } else if ((!empty($editquery1)) && (empty($editquery2)) && (empty($editquery3)) && (empty($editquery4)) && (!empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where memberName like '$editquery1%' and newsletter='$editquery5' and type!=0");
                    }
                    //when Surname is not empty
                    else if ((empty($editquery1)) && (!empty($editquery2)) && (empty($editquery3)) && (empty($editquery4)) && (empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where memberSurname like '$editquery2%' and type!=0");
                    } else if ((empty($editquery1)) && (!empty($editquery2)) && (!empty($editquery3)) && (empty($editquery4)) && (empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where memberSurname like '$editquery2%' and username='$editquery3' and type!=0");
                    } else if ((empty($editquery1)) && (!empty($editquery2)) && (empty($editquery3)) && (!empty($editquery4)) && (empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where memberSurname like '$editquery2%' and email='$editquery4' and type!=0");
                    } else if ((empty($editquery1)) && (!empty($editquery2)) && (empty($editquery3)) && (empty($editquery4)) && (!empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where memberSurname like '$editquery2%' and newsletter='$editquery5' and type!=0");
                    }
                    //when Username is not empty
                    else if ((empty($editquery1)) && (empty($editquery2)) && (!empty($editquery3)) && (empty($editquery4)) && (empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where username like '$editquery3%' and type!=0");
                    } else if ((empty($editquery1)) && (empty($editquery2)) && (!empty($editquery3)) && (!empty($editquery4)) && (empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where username like '$editquery3%' and email='$editquery4' and type!=0");
                    } else if ((empty($editquery1)) && (empty($editquery2)) && (!empty($editquery3)) && (empty($editquery4)) && (!empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where username like '$editquery3%' and newsletter='$editquery5' and type!=0");
                    }
                    //when Email is not empty
                    else if ((empty($editquery1)) && (empty($editquery2)) && (empty($editquery3)) && (!empty($editquery4)) && (empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where email like '$editquery4%' and type!=0");
                    } else if ((empty($editquery1)) && (empty($editquery2)) && (empty($editquery3)) && (!empty($editquery4)) && (!empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where email like '$editquery4%' and newsletter='$editquery5' and type!=0");
                    }
                    //when Newsletter is not empty
                    else if ((empty($editquery1)) && (empty($editquery2)) && (empty($editquery3)) && (empty($editquery4)) && (!empty($editquery5))) {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where newsletter='$editquery5' and type!=0");
                    } else {
                        $_SESSION["editquery"] = mysqli_query($con, "select * from userss where type!=0");
                    }
                    ?><fieldset style=" height: 500px;"><legend>SEARCH BY</legend>
                        <form action="users.php" method="post">
                            Name: <input class="form-control" type="text" name="nameedit2" placeholder="<leave blank for full list>" style="width: calc;">
                            Surname: <input class="form-control" type="text" name="surnameedit2" placeholder="<leave blank for full list>" style="width: calc;"> <br/>
                            Username: <input class="form-control" type="text" name="usernameedit" placeholder="<leave blank for full list>" style="width: calc;">
                            Email: <input class="form-control" type="text" name="emailedit" placeholder="<leave blank for full list>" style="width: calc;">
                            Newsletter: <select class="form-control" name="newsletteredit2" style="width: calc;">
                                <option></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select><br/>
                            <input class="form-control" type="submit" value="Go">
                        </form></fieldset>
                    <?php
                } else {
                    ?><fieldset style=" height: 500px;"><legend>SEARCH BY</legend>
                        <form action="users.php" method="post">
                            Name: <input class="form-control" type="text" name="nameedit2" placeholder="<leave blank for full list>" style="width: calc;">
                            Surname: <input class="form-control" type="text" name="surnameedit2" placeholder="<leave blank for full list>" style="width: calc;"> <br/>
                            Username: <input class="form-control" type="text" name="usernameedit" placeholder="<leave blank for full list>" style="width: calc;">
                            Email: <input class="form-control" type="text" name="emailedit" placeholder="<leave blank for full list>" style="width: calc;">
                            Newsletter: <select class="form-control" name="newsletteredit2" style="width: calc;">
                                <option></option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select><br/>
                            <input class="form-control" type="submit" value="Go">
                        </form></fieldset><?php
                }
                ?>

                <br/><br/>
                <div class="addedtablepart" style="width: fit-content;">
                    <div class="table-responsive">
                        <table class="table" border="0" >
                            <thead class="thead2">
                                <tr>
                                    <th>Registered</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                    <th>Newsletter</th>
                                </tr>
                            </thead>
                            <tbody class="tablebody2" style="overflow-y: scroll; height:auto;">
                                <?php
                                $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
                                mysqli_select_db($con, "project3");
                                if ((isset($_SESSION["editquery"])) && (!empty($_SESSION["editquery"]))) {
                                    $result = $_SESSION["editquery"];
                                } else {
                                    $result = mysqli_query($con, "select * from userss where type!=0");
                                    $_SESSION["editquery"] = $result;
                                }
                                ?>
                            <form action="Usersedit.php" method="post">
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row["memberName"] . " " . $row["memberSurname"]; ?></td>
                                        <td><?php echo $row["username"]; ?></td>
                                        <td><?php echo $row["email"]; ?></td>
                                        <td>
                                            <select name="actionlistadded[]">
                                                <?php if ($row["type"] == 1) {
                                                    ?>
                                                    <option value="0">Unregister</option>
                                                    <option value="1" selected="true">Registered Guest</option>
                                                    <option value="2">Team Member</option>
                                                    <?php
                                                } else if ($row["type"] == 2) {
                                                    ?>
                                                    <option value="0">Unregister</option>
                                                    <option value="1">Registered Guest</option>
                                                    <option value="2" selected="true">Team Member</option> 
                                                <?php }
                                                ?>
                                            </select>
                                        </td>
                                        <td><?php echo $row["newsletter"]; ?></td>
                                    </tr>

                                <?php }
                                ?>
                                </tbody>
                        </table>
                    </div>
                    <br/>
                    <input class="form-control" type="submit" value="Save">
                    </form>
                </div>
            </div>



            <!--to katw div kleinei to container-->   
        </div>

    </body>
</html>

