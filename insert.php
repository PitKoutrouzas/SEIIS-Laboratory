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

        if (isset($_POST["title"]) && isset($_POST["description"]) && isset($_POST["partners"])  && isset($_POST["type"])) 
        {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $partners = $_POST["partners"];
            $type = $_POST["type"];
            $upload = $_POST["upload"];
            $result=mysqli_query($con,"select MAX(id) from publications");
            while($row= mysqli_fetch_array($result)){
                  $countIds=$row['MAX(id)']+1;
                   
            $result1=mysqli_query($con, "insert into publications(id,title,description,partners,upload,type) values('$countIds','$title', '$description', '$partners', '$upload', '$type')");
}
            if (mysqli_affected_rows($con) > 0) {
                echo "insert succesfull";
                ?>
                <meta http-equiv="refresh" content="2;url=index.php"/>
                <?php
            } 
            else {
                echo "insert failed";
                ?>
                <meta http-equiv="refresh" content="2;url=insert.php"/>
                <?php
            } 
        }
        else 
        {
            ?>
                 <form action="insert.php" method="post">
                Title: <input type="text" name="title" required/>
                <br/><br/>
                Description:<br/> <textarea  cols=type="text" rows="10" cols="10" name="description" placeholder="Write a description.." required></textarea>
                <br/><br/>
                Partners: <input type="text" name="partners" required/>
                <br/><br/>
                Upload a file: <input type="file" name="upload" />
                <br/><br/>
               Type: <select name="type" required>
                    <option value="Journals">Journals</option>
                    <option value="Conferences">Conferences</option>
                    <option value="Books">Books</option>
                    <option value="Book Chapters">Book Chapters</option>
                    <option value="Editorials">Editorials</option>
                </select>
                <br/><br/>
                <input type="submit" value="Create Publication"/>
            </form>
                <?php
           
        }
        mysqli_close($con);
        ?>
    </body>
</html>
