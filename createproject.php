<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
        mysqli_select_db($con, "project3");            
            $title = $_POST["title"];
            $aim= $_POST["aim"];
            $partners = $_POST["partners"];
            $startdate = $_POST["startdate"];
            $enddate = $_POST["enddate"];
            $cutbudget=$_POST["cutbudget"];
            $totalbudget=$_POST["totalbudget"];
            $website = $_POST["website"];
            $category = $_POST["category"];
            $type = $_POST["type"];
            $created_on = date('Y-m-d H:i:s');
            $updated_on = date('Y-m-d H:i:s');
            //$duration =date_diff($enddate,$startdate);
            $date1 = new DateTime($startdate);
            $date2 = new DateTime($enddate);
            $interval = $date1->diff($date2);
            $duration = $interval->y . " years, " . $interval->m." months, ".$interval->d." days ";
            $personname = $_COOKIE["signedin"];
            
            $resultid = mysqli_query($con,"select * from userss where username='$personname'");
            $rowid = mysqli_fetch_array($resultid);
            $creator=$rowid["memberID"];
            
            $result=mysqli_query($con,"select MAX(projectID) from projects");
             while ($row = mysqli_fetch_array($result)) {
                  $countIds=$row['MAX(projectID)']+1;
                 
            $result1=mysqli_query($con, "insert into projects values('$countIds','$title', '$partners', '$startdate', '$enddate', '$cutbudget', '$totalbudget', '$website','$creator','$created_on','$updated_on','$duration','$type','$category','$aim')");
}
            if (mysqli_affected_rows($con) > 0) {
                ?>
                <meta http-equiv="refresh" content="2;url=projects.php"/>
                <?php
            } 
            else {
                                  echo "id: " . $countIds . " title: " . $title . " aim: " . $aim . " parnters: " . $partners . "start date: " . $startdate. " end date: " . $enddate . "cutbudget : " . $cutbudget . 
                          " totalbudget: " . $totalbudget . " website: " . $website . " creator: " . $creator . " created_by: 0, 0 duration: " . $duration;
                ?>
                <meta http-equiv="refresh" content="2;url=projects.php"/>
                <?php
            } 
        ?>
    </body>
</html>
