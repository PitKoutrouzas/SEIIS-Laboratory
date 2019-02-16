<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <script type="text/javascript" src="reportsJs.js"></script>
    <script type="text/javascript" src="printThis.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="seiis_style_reports2.css"/>
</head>
<body>
<?php
session_start();
$con = mysql_connect("localhost", "seiis_lab", "seiis_lab");        //CONNECT WITH DB
mysql_select_db("project3", $con);

 if (isset($_POST['action'])) { 
            if($_POST["action"]=="Show Users Report"){
              $_SESSION["act_value"] = $_POST["action"];
              $_SESSION["usrFrom"] = $_POST["usrFrom"];
              $_SESSION["usrTo"] = $_POST["usrTo"];
              $_SESSION["usrType"] = $_POST["usrType"];
            }
            elseif ($_POST["action"]=="Show Publications Report") {
              $_SESSION["act_value"] = $_POST["action"];
              $_SESSION["pubFrom"] = $_POST["pubFrom"];
              $_SESSION["pubVenue"] = $_POST["pubVenue"];
              $_SESSION["pubCreator"] = $_POST["pubCreator"];
              $_SESSION["pubTo"] = $_POST["pubTo"];
              $_SESSION["pubRa"] = $_POST["pubRa"];
              $_SESSION["pubProj"] = $_POST["pubProj"];
            }
            elseif ($_POST["action"]=="Show Projects Report") {
              $_SESSION["act_value"] = $_POST["action"];
              $_SESSION["projFrom"] = $_POST["projFrom"];
              $_SESSION["projCat"] = $_POST["projCat"];
              $_SESSION["projType"] = $_POST["projType"];
              $_SESSION["projTo"] = $_POST["projTo"];
            }
        } 
        

if(empty($_SESSION["act_value"])){
    ?>
    <script>
        location.reload();
    </script>
    <?php
}
    else{
        $action_value = $_SESSION["act_value"];
    


        if($action_value=="Show Users Report")
        {
            if(isset($_SESSION["usrFrom"]) && !empty($_SESSION["usrFrom"]))
            {
                $uFrom=$_SESSION["usrFrom"];
            }else{
                $uFrom="";
            }
            if(isset($_SESSION["usrTo"]) && !empty($_SESSION["usrTo"]))
            {
                $uTo=$_SESSION["usrTo"];
            }else{
                $uTo="";
            }
            if(isset($_SESSION["usrType"]) && !empty($_SESSION["usrType"]) && ($_SESSION["usrType"]!= 4))
            {
                $uType=$_SESSION["usrType"];
            }else{
                $uType="";
            }
            $query='';
            //QUERIES for users report
            //From is not empty
            if(!empty($uFrom) && empty($uTo) && empty($uType))
            {
                $query="select * from userss where created_on >= '$uFrom'";
            }
            else if(!empty($uFrom) && !empty($uTo) && empty($uType))
            {
                $query="select * from userss where created_on >= '$uFrom' and created_on <= '$uTo'";
            }
            else if(!empty($uFrom) && empty($uTo) && !empty($uType))
            {
                $query="select * from userss where created_on >= '$uFrom' and type = '$uType'";
            }
            //To is not empty
            else if(empty($uFrom) && !empty($uTo) && empty($uType))
            {
                $query="select * from userss where created_on <= '$uTo'";
            }
            else if(empty($uFrom) && !empty($uTo) && !empty($uType))
            {
                $query="select * from userss where created_on <= '$uTo' and type = '$uType'";
            }
            //Type is not empty
            else if(empty($uFrom) && empty($uTo) && !empty($uType))
            {
                $query="select * from userss where type = '$uType'";
            }
            else{
                $query="select * from userss";
            }
            
            $result = mysql_query($query);
            $records = mysql_num_rows($result);
            ?>
    
    <div>
        <div id="printableArea">
            <h3><u>USER REPORT</u></h3>
            </br>
            </br>
            <text>Report Date: <?php echo date("d/m/Y"); ?></text> 
            <text style="position: absolute; right: 10px;">Number Of Records: <?php echo $records; ?></text> 
            </br>
            </br>
            <div class="table-responsive">
            <table class="table" border = "1">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Type</th>
                    <th>Joined On</th>
                </tr>
                <tr>
            <?php 
                $i=0;
                while($row = mysql_fetch_array($result))
                {
                    $i++;
                    ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["memberName"] ?></td>
                    <td><?php echo $row["memberSurname"] ?></td>
                    <td><?php echo $row["email"] ?></td>
                    <td><?php
                    if($row["type"]==1)
                    { echo "Registered Guest"; }
                    else if($row["type"]==2)
                    { echo "Team Member"; }
                    else if($row["type"]==0)
                    { echo "Pending Guest"; }
                    else echo " ";
                    ?></td>
                    <td><?php echo $row["created_on"] ?></td>
                </tr>
                    <?php
                }
            ?>
                </tr>
            </table>
            </div>
            </br>
            </br>
        </div>
        <!-- <input type="button" value="Save" id="cmd" onclick="javascript:saveAspdf()"/> -->
        <input type="button" value="Print" id="print" onClick="window.print()"/>
        <input type="button" value="Back" id="back" onClick="window.history.back()"/>
    </div>
                
                
                
            <?php
            
        }
        else if($action_value=="Show Publications Report")
        {
            if(isset($_SESSION["pubFrom"]) && !empty($_SESSION["pubFrom"]))
            {
                $pubFrom=$_SESSION["pubFrom"];
            }else{
                $pubFrom="";
            }
            if(isset($_SESSION["pubVenue"]) && !empty($_SESSION["pubVenue"]))
            {
                if($_SESSION["pubVenue"]=="all"){
                    $pubVenue="all";
                }else
                {
                    $pubVenue=$_SESSION["pubVenue"];
                }
            }else{
                $pubVenue="";
            }
            if(isset($_SESSION["pubCreator"]) && !empty($_SESSION["pubCreator"]))
            {
                if($_SESSION["pubCreator"]=="all"){
                    $pubCreator = "all";
                }
                else{
                $pubCreator=$_SESSION["pubCreator"]; }
            }
            if(isset($_SESSION["pubTo"]) && !empty($_SESSION["pubTo"]))
            {
                $pubTo=$_SESSION["pubTo"];
            }else{
                $pubTo="";
            }
            if(isset($_SESSION["pubRa"]) && !empty($_SESSION["pubRa"]))
            {
                if($_SESSION["pubRa"]=="all"){
                    $pubRa = "all";
                }
                else{
                $pubRa=$_SESSION["pubRa"]; }
            }
            if(isset($_SESSION["pubProj"]) && !empty($_SESSION["pubProj"]))
            {
                if($_SESSION["pubProj"]=="all"){
                    $pubProj = "all";
                }
                else {
                $pubProj=$_SESSION["pubProj"]; }
            }
            
            //QUERIES for publications report
            //From is not empty
//            echo $pubFrom . "  " . $pubVenue . "  " . $pubCreator . " " . $pubTo . " " . $pubRa . " " . $pubProj;
            if(!empty($pubFrom) && ($pubVenue=="all") && ($pubCreator=="all") && empty($pubTo) && ($pubRa=="all") && ($pubProj=="all"))
            {
                $query="select * from publications where created_on >= '$pubFrom'";
            }
            else if(!empty($pubFrom) && ($pubVenue!="all") && ($pubCreator=="all") && empty($pubTo) && ($pubRa=="all") && ($pubProj=="all"))
            {
                $query="select * from publications where created_on  >= '$pubFrom' and venue = '$pubVenue'";
            }
            else if(!empty($pubFrom) && ($pubVenue=="all") && ($pubCreator!="all") && empty($pubTo) && ($pubRa=="all") && ($pubProj=="all"))
            {
                $query="select * from publications where created_on >= '$pubFrom' and creator = '$pubCreator'";
            }
            else if(!empty($pubFrom) && ($pubVenue=="all") && ($pubCreator=="all") && !empty($pubTo) && ($pubRa=="all") && ($pubProj=="all"))
            {
                $query="select * from publications where created_on >= '$pubFrom' and created_on <= '$pubTo'";
            }
            else if(!empty($pubFrom) && ($pubVenue=="all") && ($pubCreator=="all") && empty($pubTo) && ($pubRa!="all") && ($pubProj=="all"))
            {
                $query="select * from publications a LEFT JOIN respub b ON a.publicationID = b.pid WHERE b.rid = '$pubRa' AND a.created_on >= '$pubFrom' ";   //REQUIRES JOIN TABLES
            }
            else if(!empty($pubFrom) && ($pubVenue=="all") && ($pubCreator=="all") && empty($pubTo) && ($pubRa=="all") && ($pubProj!="all"))
            {
                $query="select * from publications where created_on >= '$pubFrom' and publicationProject = '$pubProj'"; //REQUIRES JOIN TABLES
            }
            //Venue is not empty
            else if(empty($pubFrom) && ($pubVenue!="all") && ($pubCreator=="all") && empty($pubTo) && ($pubRa=="all") && ($pubProj=="all"))
            {
                $query="select * from publications where venue = '$pubVenue'";
            }
            else if(empty($pubFrom) && ($pubVenue!="all") && ($pubCreator!="all") && empty($pubTo) && ($pubRa=="all") && ($pubProj=="all"))
            {
                $query="select * from publications where venue = '$pubVenue' and creator = '$pubCreator'";
            }
            else if(empty($pubFrom) && ($pubVenue!="all") && ($pubCreator=="all") && !empty($pubTo) && ($pubRa=="all") && ($pubProj=="all"))
            {
                $query="select * from publications where venue = '$pubVenue' and created_on <= '$pubTo'";
            }
            else if(empty($pubFrom) && ($pubVenue!="all") && ($pubCreator=="all") && empty($pubTo) && ($pubRa!="all") && ($pubProj=="all"))
            {
                $query="select * from publications a LEFT JOIN respub b ON a.publicationID = b.pid WHERE b.rid = '$pubRa' AND a.venue <= '$pubVenue' ";
            }
            else if(empty($pubFrom) && ($pubVenue!="all") && ($pubCreator=="all") && ($pubTo=="all") && ($pubRa=="all") && ($pubProj!="all"))
            {
                $query="select * from publications where venue = '$pubVenue' and publicationProject = '$pubProj'";  //REQUIRES JOIN TABLES
            }
            //Creator is not empty
            else if(empty($pubFrom) && ($pubVenue=="all") && ($pubCreator!="all") && empty($pubTo) && ($pubRa=="all") && ($pubProj=="all"))
            {
                $query="select * from publications where creator = '$pubCreator'";
            }
            else if(empty($pubFrom) && ($pubVenue=="all") && ($pubCreator!="all") && !empty($pubTo) && ($pubRa=="all") && ($pubProj=="all"))
            {
                $query="select * from publications where creator = '$pubCreator' and created_on <= '$pubTo'";
            }
            else if(empty($pubFrom) && ($pubVenue=="all") && ($pubCreator!="all") && empty($pubTo) && ($pubRa!="all") && ($pubProj=="all"))
            {
                $query="select * from publications a LEFT JOIN respub b ON a.publicationID = b.pid WHERE b.rid = '$pubRa' AND a.creator = '$pubCreator' ";  //REQUIRES JOIN TABLES
            }
            else if(empty($pubFrom) && ($pubVenue=="all") && ($pubCreator!="all") && empty($pubTo) && ($pubRa=="all") && ($pubProj!="all"))
            {
                $query="select * from publications where creator = '$pubCreator' and publicationProject = '$pubProj'";  //REQUIRES JOIN TABLES
            }
            //To is not empty
            else if(empty($pubFrom) && ($pubVenue=="all") && ($pubCreator=="all") && !empty($pubTo) && ($pubRa=="all") && ($pubProj=="all"))
            {
                $query="select * from publications where created_on <= '$pubTo'";
            }
            else if(empty($pubFrom) && ($pubVenue=="all") && ($pubCreator=="all") && !empty($pubTo) && ($pubRa!="all") && ($pubProj=="all"))
            {
                $query="select * from publications a LEFT JOIN respub b ON a.publicationID = b.pid WHERE b.rid = '$pubRa' AND a.created_on <= '$pubTo' ";
            }
            else if(empty($pubFrom) && ($pubVenue=="all") && ($pubCreator=="all") && !empty($pubTo) && ($pubRa=="all") && ($pubProj!="all"))
            {
                $query="select * from publications where created_on <= '$pubTo' and publicationProject = '$pubProj'"; //REQUIRES JOIN TABLES
            }
            //Reasearch Areas is not empty
            else if(empty($pubFrom) && ($pubVenue=="all") && ($pubCreator=="all") && empty($pubTo) && ($pubRa!="all") && ($pubProj=="all"))
            {
                $query="select * from publications a LEFT JOIN respub b ON a.publicationID = b.pid WHERE b.rid = '$pubRa' ";
            }
            else if(empty($pubFrom) && ($pubVenue=="all") && ($pubCreator=="all") && empty($pubTo) && ($pubRa!="all") && ($pubProj!="all"))
            {
                $query="select * from publications where rid = '$pubRa' and publicationProject = '$pubProj'";  //REQUIRES JOIN TABLES
            }
            //Project is not empty
            else if(empty($pubFrom) && ($pubVenue=="all") && ($pubCreator=="all") && empty($pubTo) && ($pubRa=="all") && ($pubProj!="all"))
            {
                $query="select * from publications where publicationProject = '$pubProj'";  //REQUIRES JOIN TABLES
            }
            else{
                $query="select * from publications";
            }
            
            $result = mysql_query($query);
            $records = mysql_num_rows($result);
            ?>
    <div>    
        <div id="printableArea">
            <h3><u>PUBLICATION REPORT</u></h3>
            </br>
            </br>
            <text>Report Date: <?php echo date("d/m/Y"); ?></text> 
            <text style="position: absolute; right: 10px;">Number Of Records: <?php echo $records; ?></text> 
            </br>
            </br>
            <div class="table-responsive">
            <table class="table" border = "1">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Venue</th>
                    <th>Creator</th>
                    <th>Date Published</th>
                    <th>Last Updated</th>
                    <th>Research Area</th>
                    <th>Project</th>
                </tr>
                <tr>
            <?php 
            $i=0;
                while($row = mysql_fetch_array($result))
                {
                    $i++;
                    ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["title"] ?></td>
                    <td><?php echo $row["venue"] ?></td>
                    <td><?php
                    $creatorID = $row["creator"];
                    $creatorquery = mysql_query("select memberName, memberSurname from userss where memberID = '$creatorID'");
                    $creatorrow = mysql_fetch_array($creatorquery);
                    echo $creatorrow["memberName"] . " " . $creatorrow["memberSurname"]; ?></td>
                    <td><?php echo $row["created_on"] ?></td>
                    <td><?php echo $row["updated_on"] ?></td>
                    <td><?php 
                    $publicationID = $row["publicationID"];
                    $raquery = mysql_query("select rid from respub where pid = '$publicationID' ");
                    
                    $rows = array();
                    while ($row = mysql_fetch_array($raquery))
                    {
                        $rows[] = $row;
                    }
                    $rarow = $rows;
                    $listofra = $rarow;
                    foreach ($listofra as $ra)
                        {
                            $researchareaID = $ra["rid"];
                            $getraquery = mysql_query("select title from researchareas where researchareaID = '$researchareaID' ");
                            $resrow = mysql_fetch_array($getraquery);
                            ?><li><?php echo $resrow["title"]; ?></li><?php
                        }
                    ?></td>
                    <td><?php echo $row["publicationProject"] ?></td>
                </tr>
                    <?php
                }
            ?>
                </tr>
            </table>
            </div>
            </br>
            </br>
        </div>
        <!-- <input type="button" value="Save" id="cmd" onclick="javascript:saveAspdf()"/> -->
        <input type="button" value="Print" id="print" onClick="window.print()"/>
        <input type="button" value="Back" id="back" onClick="window.history.back()"/>
    </div>            
                
                
            <?php
            
            
        }
        else if($action_value=="Show Projects Report")
        {
            if(isset($_SESSION["projFrom"]) && !empty($_SESSION["projFrom"]))
            {
                $projFrom=$_SESSION["projFrom"];
            }else{
                $projFrom="";
            }
            if(isset($_SESSION["projCat"]) && !empty($_SESSION["projCat"]))
            {
                $projCat=$_SESSION["projCat"];
            }else{
                $projCat="";
            }
            if(isset($_SESSION["projType"]) && !empty($_SESSION["projType"]) && ($_SESSION["projType"] != "Any"))
            {
                $projType=$_SESSION["projType"];
            }else{
                $projType="";
            }
            if(isset($_SESSION["projTo"]) && !empty($_SESSION["projTo"]))
            {
                $projTo=$_SESSION["projTo"];
            }else{
                $projTo="";
            }
            
            //QUERIES for projects report
            //From is not empty
            if(!empty($projFrom) && empty($projCat) && empty($projType) && empty($projTo))
            {
                $query="select * from projects where startdate >= '$projFrom'";
            }
            else if(!empty($projFrom) && !empty($projCat) && empty($projType) && empty($projTo))
            {
                $query="select * from projects where startdate >= '$projFrom' and category = '$projCat'";
            }
            else if(!empty($projFrom) && empty($projCat) && !empty($projType) && empty($projTo))
            {
                $query="select * from projects where startdate >= '$projFrom' and type = '$projType'";
            }
            else if(!empty($projFrom) && empty($projCat) && empty($projType) && !empty($projTo))
            {
                $query="select * from projects where startdate >= '$projFrom' and enddate <= '$projTo'";
            }
            //Cat is not empty
            else if(empty($projFrom) && !empty($projCat) && empty($projType) && empty($projTo))
            {
                $query="select * from projects where category = '$projCat'";
            }
            else if(empty($projFrom) && !empty($projCat) && !empty($projType) && empty($projTo))
            {
                $query="select * from projects where category = '$projCat' and type = '$projType'";
            }
            else if(!empty($projFrom) && !empty($projCat) && empty($projType) && !empty($projTo))
            {
                $query="select * from projects where category = '$projCat' and enddate <= '$projTo'";
            }
            //Type is not empty
            else if(empty($projFrom) && empty($projCat) && !empty($projType) && empty($projTo))
            {
                $query="select * from projects where type = '$projType'";
            }
            else if(empty($projFrom) && empty($projCat) && !empty($projType) && !empty($projTo))
            {
                $query="select * from projects where type = '$projType' and enddate <= '$projTo'";
            }
            //To is not empty
            else if(empty($projFrom) && empty($projCat) && empty($projType) && !empty($projTo))
            {
                $query="select * from projects where enddate <= '$projTo'";
            }
            else{
                $query="select * from projects";
            }
            
            $result = mysql_query($query);
            $records = mysql_num_rows($result);
            ?>
        
    <div>
        <div id="printableArea">
            <h3><u
                    >PROJECTS REPORT</u></h3>
            </br>
            </br>
            <text>Report Date: <?php echo date("d/m/Y"); ?></text> 
            <text style="position: absolute; right: 10px;">Number Of Records: <?php echo $records; ?></text> 
            </br>
            </br>
            <div class="table-responsive">
            <table class="table" border = "1">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Type</th>
                    <th>Category</th>
                </tr>
                <tr>
            <?php 
            $i=0;
                while($row = mysql_fetch_array($result))
                {
                    $i++;
                    ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["title"] ?></td>
                    <td><?php echo $row["startdate"] ?></td>
                    <td><?php echo $row["enddate"] ?></td>
                    <td><?php echo $row["type"] ?></td>
                    <td><?php echo $row["category"] ?></td>
                </tr>
                    <?php
                }
            ?>
                </tr>
            </table>
            </div>
            </br>
            </br>
        </div>
        <!-- <input type="button" value="Save" id="cmd" onclick="javascript:saveAspdf()"/> -->
        <input type="button" value="Print" id="print" onClick="window.print()"/>
        <input type="button" value="Back" id="back" onClick="window.history.back()"/>
    </div>
                
                
                
            <?php
            
        }
    }
        ?>
    </body>
</html>
