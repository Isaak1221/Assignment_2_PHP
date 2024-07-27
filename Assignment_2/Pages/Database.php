<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
</head>
<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "assignment_1";
    
    $conn = mysqli_connect ($servername, $username, $password, $dbname);

    $Name = $_POST ['Name'];
    $Last_Name = $_POST ['Last_Name'];
    $Email = $_POST ['Email'];
    $Program = $_POST ['Program'];

    $sql = "INSERT INTO Student (Name, Last_Name, Email, Program) VALUES ('$Name', '$Last_Name', '$Email', '$Program')";
    if (mysqli_query($conn, $sql)){
        echo "<br> New record created successfully";
        
    }

    mysqli_close ($conn);

    ?>
    <a href="../Index.php">Return back</a>
</body>
</html>