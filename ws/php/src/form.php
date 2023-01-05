<!DOCTYPE HTML>  
<html>

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
    <link rel="stylesheet" href="styles.css"/>
    <title>Project PIN</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
    <header>
        <h1 class="w3-sofia w3-container">Form</h1>
    </header>

    <nav class="w3-bar">
        <a href="index.php" class="w3-bar-item w3-button w3-round">Overview of students</a>
        <a href="recorder.php" class="w3-bar-item w3-button w3-round">Student recorder</a>
        <a href="converter.php" class="w3-bar-item w3-button w3-round">Convert xml to html</a>
        <a href="XPath.php" class="w3-bar-item w3-button w3-round">XPath</a>
        <a href="form.php" class="w3-bar-item w3-button w3-round">Form</a>
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </nav>

    <nav class="right_bar w3-sidebar w3-bar-block w3-padding-16">	
      <?php
        $students = glob("students/*xml");
        $students = preg_replace('/^students\//', '',$students);
        foreach($students as $filename) {
            echo '<li><i>' . $filename . '</i></li>';
        }
      ?>
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
    <section class="w3-panel">
    Name of file: <input type="text" name="file" placeholder="studentX.xml"> 
    </section>

    <section class="w3-panel">
    First name: <input type="text" name="first">
    <span class="error">* <?php echo $firstErr;?></span>
    </section>

    <section class="w3-panel">
    Last name: <input type="text" name="last">
    <span class="error">* <?php echo $lastErr;?></span>
    </section>

    <section class="w3-panel">
    E-mail: <input type="text" name="email" placeholder="@">
    <span class="error">* <?php echo $emailErr;?></span>
    </section>

    <section class="w3-panel">
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr;?></span>
    </section>

    <section class="w3-panel">
    Personal identifier: <input type="text" name="personal" placeholder="F...">
    <span class="error">* <?php echo $personalErr;?></span>
    </section>

    <section class="w3-panel">
    <input type="submit" name="submit" value="Submit">  
    </section>
  </form>

<?php
echo "<h2>Your Input:</h2>" .
      $first .
      "<br>" .
      $last .
      "<br>" .
      $email .
      "<br>" .
      $gender; 
?>
  </main>
  <footer class="w3-container">
      <h3>Made by ME<sup>©</sup></h3>
  </footer>

</body>
</html>