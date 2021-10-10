<?php 
require "_dbconnect.php";

$movieName = $_POST['movieName'];
$actor = $_POST['actor']; 
$actress = $_POST['actress'];
$year = $_POST['year'];
$director = $_POST['director']; 

$insert_sql = "INSERT INTO `movies` (`movie`, `actor`, `actress`, `releaseyear`, `director`) VALUES ('$movieName', '$actor', '$actress', '$year', '$director')";

if(isset($movieName) and isset($actor) and isset($actress) and isset($year) and isset($director)){
    $res = mysqli_query($conn, $insert_sql) or die("Query Failed");
    header("location: index.php");
} else{
    echo "Failed";
}
?>
