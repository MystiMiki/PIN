<!DOCTYPE HTML>  
<html>

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="styles.css">
    <title>Formulář</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
  <header>
      <h1 class="w3-sofia w3-container">Formulář</h1>
  </header>

  <nav class="w3-bar">
        <a href="index.php" class="w3-bar-item w3-button">Přehled studentů</a>
        <a href="index2.php" class="w3-bar-item w3-button">Nahravač studentů</a>
        <a href="index3.php" class="w3-bar-item w3-button">Převod xml na html</a>
        <a href="index4.php" class="w3-bar-item w3-button">Formulář</a>
    </nav>

  <main class="w3-panel">
    
  

<?php
// define variables and set to empty values
$firstErr = $lastErr =  $personalErr =  
$emailErr = $genderErr = $startyeareErr = $startYearErr = "";
$first = $last = $personal =  
$email = $gender = $startYear = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["first"])) {
    $firstErr = "First name is required";
  } else {
    $first = test_input($_POST["first"]);
  }
    
  if (empty($_POST["last"])) {
    $lastErr = "Last name is required";
  } else {
    $last = test_input($_POST["last"]);
  }

  if (empty($_POST["personal"])) {
    $personalErr = "Personal identifier is required";
  } else {
    $personal = test_input($_POST["personal"]);
  }

  if (empty($_POST["email"])) {
    $emailErr = "";
  } else {
    $email = test_input($_POST["email"]);
    if (!preg_match("/[a-z0-9._-]+@[a-z0-9_-]+\.[a-z0-9._-]+/i", $email)) {
      $emailErr = "Invalid email";
    }
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["startYear"])) {
    $startYearErr = "";
  } else {
    $startYear = test_input($_POST["startYear"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

  <h2>PHP Form Validation Example</h2>
  <p><span class="error">* required field</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    First name: <input type="text" name="first">
    <span class="error">* <?php echo $firstErr;?></span>
    Last name: <input type="text" name="last">
    <span class="error">* <?php echo $lastErr;?></span>
    <br><br>
    E-mail: <input type="text" name="email">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Personal identifier: <input type="text" name="personal">
    <span class="error">* <?php echo $personalErr;?></span>
    <br><br>
    <!--Comment: <textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>-->
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
  </form>

<?php
echo "<h2>Your Input:</h2>";
echo $first;
echo "<br>";
echo $last;
echo "<br>";
echo $email;
echo "<br>";
echo $gender;
?>
  </main>
  <footer class="w3-container">
      <h3>This is footer</h3>
  </footer>

</body>
</html>