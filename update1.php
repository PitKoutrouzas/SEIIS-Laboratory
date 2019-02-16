<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $con = mysqli_connect("localhost", "seiis_lab", "seiis_lab");
        mysqli_select_db($con, "seiis");
        
        if(isset($_POST["id"]))
        {
            $id = $_POST["id"];
            $result = mysqli_query($con, "select * from publications where id='$id'");
            
            ?>
        
        <form action="update2.php" method="post">
            <?php
            while($row = mysqli_fetch_array($result))
            {
                ?>
                <input type="text" name="id" value="<?php echo $row["id"]?>" hidden />
                <br/>
                Title: <input type="text" name="title" value="<?php echo $row["title"] ?>" />
                <br/>
                Description:<br/> <textarea type="text" rows="10" cols="10" name="description" value="<?php echo $row["description"]?>" required><?php echo $row["description"]?></textarea>
                <br/>
                Partners: <input type="text" name="partners" value="<?php echo $row["partners"] ?>" />
                <br/>
                Upload a file: <input type="file" name="upload" value="<?php echo $row["upload"]?>"/>
                <br/><br/>
    Category :<select name="type" required>
                      
                      <option selected="<?php echo $row["type"]?>" disabled=""><?php echo $row["type"]?>
                    <option value="Journals">Journals</option>
                    <option value="Conferences">Conferences</option>
                    <option value="Books">Books</option>
                    <option value="Book Chapters">Book Chapters</option>
                    <option value="Editorials">Editorials</option>
                   
                </select>
                <br/>
            <?php
            }
            ?>
            <input type="submit" value="Update Publication"/>
        </form>
        <?php
        }
        else
        {?>
            <script>
           alert( "Please select one publication to update.");</script>
                   <meta http-equiv="refresh" content="2;index.php"/>
            
        <?php
        }
        mysqli_close($con);
        ?>
    </body>
</html>
