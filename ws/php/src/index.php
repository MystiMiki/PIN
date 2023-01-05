<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
    <link rel="stylesheet" href="styles.css"/>
    <title>Project PIN</title>
</head>
<body>
    <header>
        <h1 class="w3-sofia w3-container">Students</h1>
    </header>

    <nav class="w3-bar">
        <a href="index.php" class="w3-bar-item w3-button w3-round">Overview of students</a>
        <a href="recorder.php" class="w3-bar-item w3-button w3-round">Student recorder</a>
        <a href="converter.php" class="w3-bar-item w3-button w3-round">Convert xml to html</a>
        <a href="XPath.php" class="w3-bar-item w3-button w3-round">XPath</a>
        <a href="form.php" class="w3-bar-item w3-button w3-round">Form</a>
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </nav>

    <main>
        <ul class="w3-ul">
            <?php              
            $students = glob("students/*xml");
            foreach($students as $filename) {
                echo '<li><a href="'.$filename.'.html" class="w3-container"><i>' . preg_replace('/^students\//', '',$filename) . '</i></a></li>';
            }

            ?>
        </ul>
    </main>

    <footer class="w3-container">
        <h3>Made by ME<sup>©</sup></h3>
    </footer>

</body>
</html>