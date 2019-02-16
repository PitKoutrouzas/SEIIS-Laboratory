<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

	<?php
            $con = mysql_connect("localhost", "seiis_lab", "seiis_lab");
            mysql_select_db("project3", $con);
            $result = mysql_query("select * from news");
            
	?>
    
    <table>
        
        
        <?php
        
            while($row = mysql_fetch_array($result))
            {
                
                ?>
        
                <div class="newshref_editNews">
                    <a href="#" class="newsDescription" onclick="showEdit()">
                    <?php echo $row["newsTitle"]?>
                        <br/>
                </a>
                
                
                </div>
                
                <br/> <br/>
                                    
            
            <?php
            
            
            }
            
            
        ?>
        
        
        <br/><br/>
	
	
</body>
</html>
