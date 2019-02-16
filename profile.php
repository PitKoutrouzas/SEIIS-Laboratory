<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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

.dropdown-content{
    z-index: 2;
}

.profileactive {
    			background-color: #4d90fe;
			}
                        
                        .profilebody{
                            margin-left : 200px;
	margin-right : 200px;
        
	position: relative;
	text-shadow: 0 -1px rgba(0,0,0,0.6);
	line-height: 30px;
	background: #fff;	
	padding: 5px 15px;
	box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
        z-index: 1;
                        }
.prof_fname,.prof_sname,.prof_email,.prof_fshortbio{
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
    text-shadow: 1px 1px 1px #FFF;
    border: 1px solid rgba(16, 103, 133, 0.6);
    box-shadow: 0px 0px 3px rgba(255, 255, 255, 0.5), inset 0px 1px 4px rgba(0, 0, 0, 0.2);
    border-radius: 3px;
    outline: 0;
    width: 270px;
}

.prof_fshortbio{ 
    width: 900px;}
                        
.title {
	text-align: center;
    position: relative;
    text-shadow: 0 -1px rgba(0,0,0,0.6);
    line-height: 40px;
    height:70px;
    background: #355681;	
    padding: 5px 15px;
    color: white;
    box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
    z-index: -1;
}
        </style>
        <title>Profile</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>
    <body>
        <?php if(isset($_COOKIE["signedin"]))
    {
        $person = "You are signed in as " . $_COOKIE["signedin"];
    }
    else
    {
        $person = "";
        ?> <meta http-equiv="refresh" content="0.01;url=signin.php"/> <?php
    }
    if (isset($_COOKIE["typein"]))
    {
        $type = $_COOKIE["typein"];
    }
    else
    {
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
                        if ($type > 0)
                        {
                            ?>
                        <li><a href="calendar.php">Calendar</a></li><?php } ?>
                         <?php
                        if ($type > 0)
                        {
                            ?>
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
                        
                        <?php } ?> 
      
                        <li><a href="contactus.php">Contact Us </a></li>
                        <?php
                        if ($type > 0)
                        {
                            ?>
                        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">More
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="notes.php">Notes</a></li>
                                <li><a href="reports.php">Reports</a></li>
                                <li class="active"><a href="profile.php">Profile</a></li>
                                <?php
                                if ($type == 3)
                        {
                            ?>
                        <li><a class="usersactive" href="users.php">Users</a></li> <?php } ?>
        </ul>
      </li>
                        <?php } ?> 
                        <div class="flex" style="color: #2E76F3;">
                            <?php echo $person;?>
   			</div>
    </ul>
                        <ul class="nav navbar-nav pull-right">
                                 <?php 
                                 if ($person=="")
                                 {?>
                             <li><a type="button" class="btn btn-default navbar-btn pull-right" href="signin.php">Sign In</a></li> 
                                     <?php
                                 }
                                 else
                                 {
                                   ?>
                             <li><a type="button" class="btn btn-default navbar-btn pull-right" href="signout.php">Sign Out</a></li> <?php  
                                 } ?>
                             </li>


    </ul>
                             
  </div>
<!-- HEADER END -->
<br/>
<div class="profilebody" style="width:800px; margin: 0 auto; padding: 0 auto;">
<?php
$personname = $_COOKIE["signedin"];
$con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
            mysql_select_db("project3", $con);
            $result = mysql_query("select * from userss where username='$personname'");
            $row = mysql_fetch_array($result);
            $id=$row["memberID"];
            $result2 = mysql_query("select COUNT(*) from publications where creator='$id'");
            $row2 = mysql_fetch_array($result2);
            $result3 = mysql_query("select COUNT(*) from researchareas where creator='$id'");
            $row3 = mysql_fetch_array($result3);
            $result4 = mysql_query("select COUNT(*) from projects where creator='$id'");
            $row4 = mysql_fetch_array($result4);
                        ?>
            
            <table border="0">
                <th>
                    <td></td>
                    <td></td>
                </th>
                    <form action="changeprofile.php" name="profileform" method="post" enctype="multipart/form-data"/>
                    <tr>
                        <td>Name: <textarea type="text" class="prof_fname" style="resize: none;" name="prof_fname"><?php echo $row["memberName"];?></textarea><br/>Surname: <textarea type="text" class="prof_sname" style="resize: none;" name="prof_sname"><?php echo $row["memberSurname"];?></textarea><br/>Email: <textarea type="text" class="prof_email" style="resize: none;" name="prof_email"><?php echo $row["email"];?></textarea></td>
                        <td><br/><img class="newsimage" src="<?php echo $row["image"]; ?>" name="descr_img" id="descr_img" style=" width: 100%; height: 100%; min-width: 400px; min-height: 400px; max-width:400px; max-height:400px;"/></img></td>
                    </tr>
                    <tr><td></td></tr>
                <tr><td></td></tr>
                <tr><td></br><br/>Projects: <span type="text" class="prof_sname" style="display:inline"><?php echo $row4["COUNT(*)"];?></span></td></tr>
                <tr><td></br><br/>Publications: <span type="text" class="prof_fname" name="prof_fname" style="display:inline"><?php echo $row2["COUNT(*)"];?></span></td></tr>
                <tr><td></br><br/>Research Areas: <span type="text" class="prof_sname" style="display:inline"><?php echo $row3["COUNT(*)"];?></span></td></tr>
                <tr><td></br><br/>Upload Image:  <input class="form-control" type="file" name="prof_file" accept="image/*"/><br/><br/></td></tr>
            </table>
<!--                Upload CV: <input type="file" class="prof_ucv" name="prof_ucv" id="profilecv"/>
                (Currently stored:  <span id="uploadedcv" style="display:inline"> </span> )
                <br/><br/>-->
                <input type="submit" value="Save">
                </form>
                </div>
</div>

                </body>
                 
                </html>