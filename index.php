<?php
require "_dbconnect.php";
$fetch_sql = "SELECT * FROM `movies`";
$res = mysqli_query($conn, $fetch_sql) or die("Query Failed");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 80%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    </style>
</head>

<body>
    <form action="search.php" method="get">
        <div>
            <input type="text" name="query" id="search-query">
            <input type="submit" value="Search">
        </div>
    </form>

    <h1>Add a Movie</h1>
    <form action="insert.php" method="post" onsubmit="return validate()">
        <div>
            <input type="text" name="movieName" id="movie-name" placeholder="Movie name">
        </div>
        <div>
            <input type="text" name="actor" id="actor" placeholder="Actor Name">
        </div>
        <div>
            <input type="text" name="actress" id="actress" placeholder="Actress Name">
        </div>
        <div>
            <input type="text" name="year" id="year" placeholder="Released Year">
        </div>
        <div>
            <input type="text" name="director" id="director" placeholder="Director Name">
        </div>
        <input type="submit" value="Add">
    </form>

    <h1>List of Movies</h1>
    <table>
        <tr>
            <th>Movie Name</th>
            <th>Actor</th>
            <th>Actress</th>
            <th>Released Year</th>
            <th>Director</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($res)) {
            echo '<tr>
                    <td>' . $row['movie'] . '</td>
                    <td>' . $row['actor'] . '</td>
                    <td>' . $row['actress'] . '</td>
                    <td>' . $row['releaseyear'] . '</td>
                    <td>' . $row['director'] . '</td>
                </tr>';
        }
        ?>
    </table>

    
</body>

</html>