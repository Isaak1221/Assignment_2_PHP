<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/Styles.css">
    <link rel="icon" type="image" href="../IMAGES/DataIcon.png">
    <title>Assignment_2</title>
</head>

<body>

        <header>
            <nav>
                <h1>Database</h1>
                <ul>
                <li><a href="../Index.php">Index</a></li>
                    <li><a href="New_R.php">New Register</a></li>
                    <li><a href="Data.php">Data</a></li> 
                    <li><a href="Update.php">Update</a></li>
                    <li><a href="Delete.php">Delete</a></li>
                    <li><a href="../Login/Login.php">Logout</a></li>
                    
                </ul>

            </nav>
        </header>
    <seccion class="table">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "assignment_1";

    $mysqli = new mysqli($servername, $username, $password, $dbname);

    $query = "SELECT * FROM Student";
    $result = $mysqli->query($query);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Student_ID</th><th>Name</th><th>Last_Name</th><th>Email</th><th>Program</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["Student_ID"] . "</td>";
            echo "<td>" . $row["Name"] . "</td>";
            echo "<td>" . $row["Last_Name"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "<td>" . $row["Program"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found";
    }

    $mysqli->close();
    ?>
    </seccion>
        <footer>
        <h2 class="brand">Isaac Granciano</h2>
        <p class="brand2">Beginner Web Developer.</p>
        </footer>

</body>
</html>