<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="styles.css">
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
        <section class="w3-container">
            <ul>
                <?php              
                $students = glob("students/*xml");
                if (is_array($students)) {
                    foreach($students as $filename) {
                        $student = simplexml_load_file($filename);
                        echo '<h5 class="w3-panel w3-leftbar"><i>' . preg_replace('/^students\//', '',$filename) . '</i></h5>';
                        echo $student->name->first . ' ';
                        echo $student->name->last . '<br>';
                        echo '<p class="w3-small">' . $student->email . '<br>';
                        echo $student->branch . '<br>';
                        echo '</p><hr>';

                    }
                }
                ?>
            </ul>
        </section>
    </main>

    <footer class="w3-container">
        <h3>This is footer</h3>
    </footer>

</body>
</html>