<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
       <form action="Database.php" method="post">

        <label for="Name">Name:</label>
        <input class="text" type="text" id="Name" name="Name" placeholder="Enter your name" required> 

        <label for="Last_Name">Last Name:</label>
        <input class="text" type="text" id="Last_Name" name="Last_Name" placeholder="Enter your last name" required> 

        <label for="Email">Email:</label>
        <input class="text" type="email" id="Email" name="Email" placeholder="Enter your email" required> 

        <label>Select your program</label>
        <select class="text" id="Program" name="Program">
          <option value="">Choose an option</option>
          <option value="Acupunture">Acupunture</option>
          <option value="Architecture">Architecture</option>
          <option value="Art">Art</option>
          <option value="Biotechnology">Biotechnology</option>
          <option value="Business">Business</option>
          <option value="Carpentry">Carpentry</option>
          <option value="Computer">Computer</option>
          <option value="Dentist">Dentist</option>
        </select>

        <input class="button" type="reset"></input>

        <input class="button" type="submit"></input>
    </form>
    </section>


    <footer>
     <h2 class="brand">Isaac Granciano</h2>
     <p class="brand2">Beginner Web Developer.</p>
    </footer>
</body>
</html>