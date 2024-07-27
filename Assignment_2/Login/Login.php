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
            <li><a href="Register.php">Create Account</a></li>     
            </ul>
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

  $query = "SELECT * FROM users WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    if (password_verify($password, $user["password"])) {
    
      session_start();
      $_SESSION["username"] = $username;
      $_SESSION["id"] = $user["id"];

      header("Location: ../Index.php");
      exit;
    } else {
      echo "Password incorrect";
    }
  } else {
    echo "User incorrect";
  }
}
?>

<form class="form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" require><br><br>
  <label for="password">Password:</label>
  <input type="password" id="password" name="password" require><br><br>
  <input type="submit" value="Let's start">
</form>


    <footer>
     <h2 class="brand">Isaac Granciano</h2>
     <p class="brand2">Beginner Web Developer.</p>
    </footer>
</body>
</html>
