<!doctype html>
<!-- Na dimiourgisw form me collapsibles mesa kai na valw ena scroll mesa-->
<html>
<head>
    <style type="text/css">
            
            .hrclass{
                color: #A9E2F3;
            }

            a{
	color: #2E76F3;
	text-decoration: none;
}

body
{
    background-image: url("walllll.jpg");
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
    margin-left : auto;
    margin-right : auto;
    border-collapse: collapse;
    width: 100%;
    font-family: "Times New Roman", Georgia, Serif;
}

th, td {
        width: 1000px;
        margin-left : auto;
	margin-right : auto;
    text-align: left;
    padding: 8px;
    font-family: "Times New Roman", Georgia, Serif;
}
tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #A42D2D;
    color: white;
    font-family: "Times New Roman", Georgia, Serif;
}
tr:nth-child(even){background-color: #e3e6e8}

thead, tbody { display: block; }
tbody {
    height: 800px;       
    overflow-y: auto;    
    overflow-x: hidden;
    font-family: "Times New Roman", Georgia, Serif;
}
.nav-ra{
	text-align: center;
}


.title, container {
	margin-left : auto;
	margin-right : auto;
        width: 980px;
	position: relative;
	text-shadow: 0 -1px rgba(0,0,0,0.6);
	font-size: 22px;
	line-height: 30px;
	background: #355681;	
	padding: 5px 15px;
	color: white;
	box-shadow: inset 0 0 5px rgba(53,86,129, 0.5);
        font-weight: bold;
	font-family: 'Muli', sans-serif;
        z-index: -1;
}

#container {
	width : 1100px;
	height : 980px;
	margin-left : auto;
	margin-right : auto;
        font-weight: bold;
	position: relative;
	text-shadow: 0 -1px rgba(0,0,0,0.6);
	font-size: 22px;
	line-height: 30px;
	
	padding: 5px 15px;
	font-family: 'Muli', sans-serif;
}

.latestnews{
	width : 120px;
	height : 980px;
	float : left;
}

.gobtn,.gobtn2,.btn-news {
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
.newscolumn{
	width : 1280px;
	height : 800px;
	float : left;
        margin-left : auto;
	margin-right : auto;
}

.latestnews {
	height: 20px;
	width: 190px;
	position:relative;
	margin-left: -10px;
	font-weight: bold;
	text-align: center;
        z-index: 5;
}

.newscolumn {
	height: 20px;
	width: 1000px;
	position:relative;
	margin-left: 50px;
	color: black;
        background: #0a1526;
	text-decoration: none;
	font-weight: bold;
	text-align: center;
	border-bottom-right-radius: 40px;
	border-top-right-radius: 40px;
	border-bottom-left-radius: 40px;
	border-top-left-radius: 40px;
	box-shadow: 0 0 9pt 2pt;
}

.title h3{
	padding-top: 20px;
	text-align: center;
}
        </style>
<meta charset="utf-8">
<title>News</title>
<link rel="stylesheet" type="text/css" href="nav_style.css">
</head>

<body>
<!--HEADER START-->
<div id="image2">
    <?php if(isset($_COOKIE["signedin"]))    // To username tou xristi pou einai signedin
    {
        $person = "You are signed in as " . $_COOKIE["signedin"];
    }
    else
    {
        $person = "";
    }
    if (isset($_COOKIE["typein"]))   // O tipos 0,1,2 tou xristi pou einai signed in
    {
        $type = $_COOKIE["typein"];
    }
    else
    {
        $type = 0;
    }
    ?>
			<a target="" href="index.php">
			<img src="logo.png" alt="seiis logo" width="150" height="80" align="left"/></a>
                </div>
			<div id="image1">
                            <a target="_blank" href="http://www.cut.ac.cy">
                                <img src="tepak.jpg" alt="cut logo" width="200" height="80" align="right"></a>
			</div>
		
		<!-- Section to host top layout of page-->
		<div id="title">
                  <br/>
                    <h2>SEIIS Research Lab</h2>
		</div>

		<br><br>
		<!-- Section that hosts all sections within the body element-subsection in page-->
		<div id="section">
			<!--Create a horizontal navigation menu using unordered list-->
		<ul>
                    <li><a class="active" href="index.php">Home</a></li>
  			 <div class="dropdown">
                        <a class="dropbtn">Publications</a>
    			<div class="dropdown-content">
      				<a href="">Journals</a>
      				<a href="">Conferences</a>
                                <a href="">Books</a>
                                <a href="">Book Chapters</a>
                                <a href="">Editorials</a>
				</div>
   			</div> 
  			<li><a class="newsactive" href="News.php">News</a></li>
                        <div class="dropdown">
                        <a class="dropbtn">Research Areas</a>
    			<div class="dropdown-content">
      				<a href="">Software Engineering</a>
                                <a href="">Intelligent Information Systems</a>
				</div>
   			</div> 
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="tm.html">Team Members</a></li>
                        <li><a href="calendar.html">Calendar</a></li>
                        <?php
                        if ($type > 0)
                        {
                            ?>
                        <div class="dropdown">
                        <a  class="dropbtn">More >></a>
                        
    			<div class="dropdown-content">
      				<a href="notes.html">Notes</a>
                                <a href="reports.html">Reports</a>
                                <a href="profile.php">Profile</a>
                                <a class="usersactive" href="users.php">Users</a>
                        </div>
   			</div> 
                        <?php } ?> 
  			 <ul style="float:right;list-style-type:none;">
                             <li>
                                 <?php 
                                 if ($person=="")
                                 {?>
                                 <a href="signin.php">Sign In</a> <?php
                                 }
                                 else
                                 {
                                   ?>
                                 <a href="signout.php">Sign Out</a> <?php  
                                 } ?>
                             </li>
  			</ul>
                        <div class="signedperson" style="float: right;list-style-type:none;">
                            <a> <?php echo $person;?> </a>
   			</div>
		</ul>


<!--HEADER END-->
<script>
        window.onload = function(){
        var newstable = document.getElementById("newstable");    
        if (newstable.style.display === 'none')
        {
            document.getElementById("newstable").style.display='none';
        }
        else
        {
            document.getElementById("newstable").style.display='inline';
        }
   
	document.getElementById("newsadd").style.display='none';
        document.getElementById("newsedit").style.display='none';
        document.getElementById("newsdelete").style.display='none';
        document.getElementById("editnews").style.display='none';
        document.getElementById("deletenews").style.display='none';  
        
    };
    </script>
<br/>
<div class="news-title">
	<div class="title"><h3>NEWS</h3></div>
	<br/> <br/>
	

<div id="container">
    <?php 
    if ($type > 0)
    { ?>
<latestnews class="latestnews"><br/><br/>
    <?php } ?>
    <?php 
    if ($type > 0)
    { ?>
       <div>
			<button class="btn-news" id="addnews" style="vertical-align:middle;"  onClick="addNew()"/>
			<label class="addnewsbtn">Add News</label>
                        <br/>
       </div>
    <?php } 
    ?>
   
<!-- This is the php part that loads all the stored news at the left of the webpage-->  

       <div class="news_hrefs">
           
           <div class="newhref" id="newhref">
                          <?php
            /*$con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
            mysql_select_db("teliomenotelia", $con);
            $result = mysql_query("select * from news");
            $entries=0;*/
            
            /*while($row = mysql_fetch_array($result))
            {
                $entries += 1;
                ?>
                <div class="newshref_editNews">
                    <a href="#" class="newsDescription" id="<?php echo $row["newsID"]?>" title="<?php echo $row["newsDescription"]?>" name="<?php echo $row["newsUpload"]?>"  onClick="showDescription(this.id,this.title,this.name)"> 
                    <?php echo $row["newsTitle"]?> 
                        <br/>
                </a>
                </div>
            <?php
            } */  
        ?>       

<!--end-->   

           </div>
       
       </div>
  
  </latestnews>
  
<!-- These are the forms that are showed when the Add,Edit,Delete News buttons are clicked -->

<newscolumn class="newscolumn" id="newscolumn"><br/><br/>
    <?php
    if ($type > 0)
    {?>
    <div>
        <button align="left" class="btn-news" id="editnews" width="25" height="25" onClick="editNew()"/> Edit </button>
    <button align="left" class="btn-news" id="deletenews" width="25" height="25" onClick="deleteNew()"/> Delete </button>
    </div>
    <?php } 
    else
    {
        ?>
    <div>
        <image align="left" id="editnews" width="0" height="0" style="display:none;" onClick="editNew()"/>
    <image align="left" id="deletenews" width="0" height="0" style="display:none;" onClick="deleteNew()"/>

    </div>
    <?php }
    ?>
    
    <!-- O PINAKAS -->
    
    <div>
    <table id="newstable" border="0">
        <thead>
            <tr>
                <?php
                if(isset($_POST["namesearch"]))
                {
                     $con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
                     mysql_select_db("teliomenotelia", $con); 
                     $searchquery = $_POST["namesearch"];
                     if(!empty($searchquery))
                     {
                     $_SESSION["searchquery"] = mysql_query("select * from news where newsTitle like '$searchquery%'");
                     }
                     else
                     {
                      $_SESSION["searchquery"] = mysql_query("select * from news");   
                     }
                    ?>
                    <form id="searchform" action="News.php" method="POST">
                        Search by Title:<input type="text" name="namesearch" placeholder="<leave blank for full list>" style="border:2px solid #456879; border-radius:10px; height: 22px; width: 230px; font-weight: bold; font-family: 'Muli', sans-serif;">
                        <input class="gobtn" type="submit" value="GO" style="font-weight: bold; font-family: 'Muli', sans-serif; box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);">
                    </form>
                <?php
                }
                else
                {
                    ?>
                <form id="searchform" action="News.php" method="POST">
                   Search by Title:<input type="text" name="namesearch" placeholder="<leave blank for full list>" style="border:2px solid #456879; border-radius:10px; height: 22px; width: 230px; font-weight: bold; font-family: 'Muli', sans-serif;">
                   <input type="submit" value="GO" class="gobtn2">
                </form><?php
                }
                ?>
            </tr>
        </thead>
        
        <tbody class="tablebody">
            <?php
            $con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
            mysql_select_db("teliomenotelia", $con);
            if((isset($_SESSION["searchquery"])) && (!empty($_SESSION["searchquery"])))
            {
            $result = $_SESSION["searchquery"];
            }
            else
            {
            $result = mysql_query("select * from news");
            $_SESSION["searchquery"] = $result;
            }
            $times = array();
            while($row = mysql_fetch_array($result))
            { 
                $times[0] = $row["newsID"];
                $times[1] = $row["newsTitle"];
                $times[2] = $row["newsUpload"];
                $times[3] = $row["description"];
                ?>
            <tr>
                <td><a href="<?php echo "#" . $row["newsID"];?>" class="newstable" id="<?php echo $times;?>" title="<?php echo $row["newsDescription"]?>" name="<?php echo $row["newsUpload"]?>"  onClick='showDescription(<?php echo json_encode($times);?>,name)'>
                    <?php echo $row["newsTitle"];?></a></td>
            </tr>
            <?php
            }?>
            </div>
        </tbody>
    </table>
    </div>
    
        <!-- TELOS PINAKA -->
        
        <br/>
    <form action="addAnews.php" method="post" id="newsadd" class="newsadd">
    Title: <input class="newseditTitle" type="text" name="newsTitle"/>
    <br/>
    Description: 
    <br/>
    <textarea class="newseditDescr" name="newsDescr" rows="20"  cols="100"></textarea>
    <br/>
    Upload Image: <input type="file" name="newsFile" accept="image/*"/>
    <br/>
    <br/>
    <input class="btn-news" type="submit" value="Submit"/>
  </form>
    
    <form action="editAnews.php" method="post" id="newsedit" class="newsedit">
    <textarea type="text" name="newseditID" id="newseditID" style="display:none" /></textarea>
    Title: <textarea type="text" class="newseditTitle" name="newseditTitle" id="newseditTitle"></textarea>
    <br/>
    Description: 
    <br/>
    <textarea name="newseditDescr" class="newseditDescr" id="newseditDescr" rows="20" cols="100"></textarea>
    <br/>
    Upload Image: <input type="file" class="newseditFile" name="newseditFile" id="newseditFile" accept="image/*"/>
    <text id="uploadedfile"> </text>
    <br/>
    <br/>
    <input class="btn-news" type="submit" value="Submit"/>
  </form>
    
    <form action="deleteAnews.php" method="post" id="newsdelete" class="newsdelete">
        <textarea type="text" name="newsdeleteID" id="newsdeleteID" style="display:none"/></textarea>
    Continue with deleting selected news? <input class="btn-news" type="submit" value="YES"/>
  </form>
    
  <!--The description and image of every news that are dynamically changed through the functions-->
  
  <table id="example" class="display" width="100%"></table>
  <img class="newsimage"
       src="" name="descr_img" id="descr_img" style="min-width: 980px; min-height: 400px; max-width:980px; max-height:400px;"/></img>
  <p id="descr" style="font-weight: bold; font-family: 'Muli', sans-serif; font-size: 18px;"> </p><br/>
  
  
  <script> 
  function addNew()
	{
                document.getElementById("newsadd").style.display='inline';
                document.getElementById("newsedit").style.display='none';
                document.getElementById("editnews").style.display='none';
                document.getElementById("deletenews").style.display='none';
                document.getElementById("newstable").style.display='none';
                document.getElementById("newsdelete").style.display='none';
                document.getElementById('descr').innerHTML = '';
                document.getElementById("descr_img").src="";
	}
       </script> 
       <script> 
  function editNew()
	{
                document.getElementById("newsadd").style.display='none';
                document.getElementById("editnews").style.display='none';
                document.getElementById("deletenews").style.display='none';
                document.getElementById("newsdelete").style.display='none';
                document.getElementById("newstable").style.display='none';
                document.getElementById("newsedit").style.display='inline';
                document.getElementById('descr').innerHTML = '';
                document.getElementById("descr_img").src="";
	}
       </script>
       <script> 
  function deleteNew()
	{
                document.getElementById("newsadd").style.display='none';
                document.getElementById("newsedit").style.display='none';
                document.getElementById("editnews").style.display='none';
                document.getElementById("newstable").style.display='none';
                document.getElementById("deletenews").style.display='none';
                document.getElementById("newsdelete").style.display='inline';
                document.getElementById('descr').innerHTML = '';
                document.getElementById("descr_img").src="";
	}
       </script> 
       <script>
  function showDescription(id,image)
	{ 
                document.getElementById("newsadd").style.display='none';
                document.getElementById("newsedit").style.display='none';
                document.getElementById("newstable").style.display='none';
                document.getElementById("newsdelete").style.display='none';
                document.getElementById("editnews").style.display='inline';
                document.getElementById("deletenews").style.display='inline'; 
                document.getElementById("uploadedfile").innerHTML="(Currently stored: "+id[2]+")";
                document.getElementById("newseditDescr").innerHTML=id[3];
                document.getElementById("newseditFile").innerHTML=id[2];
                document.getElementById("newseditID").innerHTML=id[0];
                document.getElementById("newseditTitle").innerHTML=id[1];
                document.getElementById("newsdeleteID").innerHTML=id[0];
                document.getElementById('descr').innerHTML =id[3];
                document.getElementById("descr_img").style.display='inline';
                document.getElementById("descr_img").src="/"+image;
                
                if (image==="")
                {
                    document.getElementById("descr_img").style.display='none';
                }
        }
        </script> 
    </newscolumn>
</div>
</div>
</body>
</html>