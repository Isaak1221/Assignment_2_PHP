<!DOCTYPE html>
<body lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/Styles.css">
    <link rel="icon" type="image" href="../IMAGES/DataIcon.png">
    <title>Assignment_2</title>
</head>
<body>
    <header>
        <nav>
                <h1>Welcome</h1>
                <ul>
            <li><a href="Login.php">Login</a></li>     
            </ul>
        </nav>
    </header>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_a2";

$conn = mysqli_connect($servername,  $username,   $password, $dbname);

if (!$conn) {
  die("Error" . mysqli_connect_error());
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["username"];
  $password = $_POST["password"];
  $email = $_POST["email"];

  $password_hash = password_hash($password, PASSWORD_DEFAULT);

  $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password_hash', '$email')";
  mysqli_query($conn, $query);

  header("Location: Login.php");
  exit;
}
?>

<form class="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" require><br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" require><br><br>
  <label for="email">Email:</label>
  <input type="email" id="email" name="email" require><br><br>

  <input type="submit" value="Register">
</form>



    <footer>
     <h2 class="brand">Isaac Granciano</h2>
     <p class="brand2">Beginner Web Developer.</p>
    </footer>
</body>
</html>

