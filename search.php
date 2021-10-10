<?php
require('_dbconnect.php');

if(isset($_GET['query'])){
    $query = $_GET['query'];
    $search_sql = "SELECT * FROM `movies` WHERE movie LIKE '%$query%' OR actor LIKE '%$query%' OR actress LIKE '%$query%' OR director LIKE '%$query%' OR releaseyear LIKE '%$query%'";
    $res = mysqli_query($conn,$search_sql) or die("Query Failed".mysqli_error($conn));
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
</head>
<body>
    <ul>
    <?php
    $count=mysqli_num_rows($res);
    if($count==0)
    echo 'No related data found';
    else{
        while($row= mysqli_fetch_assoc($res)){
            echo 
            '<span>Movie Name:'.$row["movie"].' </span><br>'.
            '<span>Actor Name:'.$row["actor"].' </span><br>'.
            '<span>Actress Name:'.$row["actress"].' </span><br>'.
            '<span>Released Year:'.$row["releaseyear"].' </span><br>'.
            '<span> Director Name '.$row["director"].' </span><br>';
        }
}
    ?>


    </ul>
</body>
</html>