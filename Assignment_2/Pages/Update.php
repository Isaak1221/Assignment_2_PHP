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
    <section class="form">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    <label for="Student_ID">Enter Student ID:</label>
    <input type="text" id="Student_ID" name="Student_ID" required>
    <input type="submit" value="Search">
</form>
</section>

<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'assignment_1';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: ". $conn->connect_error);
}

$Student_ID = '';
$Name = '';
$Last_Name = '';
$Email = '';
$Program = '';

if (isset($_GET['Student_ID'])) {
    $Student_ID = $_GET['Student_ID'];

    $stmt = $conn->prepare("SELECT * FROM student WHERE Student_ID =?");
    $stmt->bind_param("i", $Student_ID);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $Name = $row['Name'];
        $Last_Name = $row['Last_Name'];
        $Email = $row['Email'];
        $Program = $row['Program'];
    } else {
        echo "Student ID Invalidate";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Student_ID = $_POST['Student_ID'];
    $Name = $_POST['Name'];
    $Last_Name = $_POST['Last_Name'];
    $Email = $_POST['Email'];
    $Program = $_POST['Program'];

    $stmt = $conn->prepare("UPDATE student SET Name =?, Last_Name =?, Email =?, Program =? WHERE Student_ID =?");
    $stmt->bind_param("ssssi", $Name, $Last_Name, $Email, $Program, $Student_ID);
    $stmt->execute();

    if ($stmt->error) {
        echo "Error: " . $stmt->error;
    } else {
        echo "Data updated";
    }
    exit;
}

$conn->close();
?>

<section class="form">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

    <input type="hidden" name="Student_ID" value="<?php echo $Student_ID;?>">

    <label for="Name">Name:</label>
    <input class="text" type="text" id="Name" name="Name" value="<?php echo $Name;?>" placeholder="Enter your name" required> <br>

    <label for="Last_Name">Last Name:</label>
    <input class="text" type="text" id="Last_Name" name="Last_Name" value="<?php echo $Last_Name;?>" placeholder="Enter your last name" required> <br>

    <label for="Email">Email:</label>
    <input class="text" type="email" id="Email" name="Email" value="<?php echo $Email;?>" placeholder="Enter your email" required> <br>

    <label>Select your program</label>
    <select class="text" id="Program" name="Program">
        <option value="<?php echo $Program;?>"><?php echo $Program;?></option>
        <option value="Acupunture">Acupunture</option>
        <option value="Architecture">Architecture</option>
        <option value="Art">Art</option>
        <option value="Biotechnology">Biotechnology</option>
        <option value="Business">Business</option>
        <option value="Carpentry">Carpentry</option>
        <option value="Computer">Computer</option>
        <option value="Dentist">Dentist</option>
    </select><br>
    <input type="submit" value="Update">
</form>
</section>

    <footer>
     <h2 class="brand">Isaac Granciano</h2>
     <p class="brand2">Beginner Web Developer.</p>
    </footer>

  </body>
</html>