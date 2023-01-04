<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
    <link rel="stylesheet" href="styles.css"/>
    <title>Project PIN</title>
</head>
<body>
    <header>
        <h1 class="w3-sofia w3-container">XPath</h1>
    </header>

    <nav class="w3-bar">
        <a href="index.php" class="w3-bar-item w3-button w3-round">Overview of students</a>
        <a href="recorder.php" class="w3-bar-item w3-button w3-round">Student recorder</a>
        <a href="converter.php" class="w3-bar-item w3-button w3-round">Convert xml to html</a>
        <a href="XPath.php" class="w3-bar-item w3-button w3-round">XPath</a>
        <a href="form.php" class="w3-bar-item w3-button w3-round">Form</a>
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </nav>

    <nav class="right_bar w3-sidebar w3-bar-block">	
        <p>History:</p>
        <?php 
        include 'function.php';
        display_Xpath_history();
        ?>
    </nav>
    

    <main>  
        <section class="w3-container">
            <form method="post" class="w3-cell w3-container">
                <input type="text" name="xpath" required="true" placeholder="XPath query"/>
                <button type="submit" class="w3-button">Send</button>
            </form>
            <div class="w3-cell w3-container valign_middle">Example query: /student/gender/female</div>
        </section>

        <section class="w3-container">
            <ul>
                <?php   
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                    $xpath = $_POST["xpath"];                   

                    $students = glob("students/*xml");
                    foreach($students as $filename) {
                        $student = simplexml_load_file($filename);

                        Xpath_history();

                        $result = $student->xpath($xpath); 
                                            
                        if (count($result) > 0) {                            
                            echo "<h5>" . preg_replace('/^students\//', '',$filename) . "</h5><br>";
                            echo $student->name->first . " " . 
                            $student->name->last . "<br>" .
                            $student->email . "<br>" .
                            $student->branch . "<br>" .
                            "<hr>";
                        }
                    }
                }
                ?>
            </ul>
        </section>
    </main>

    <footer class="w3-container">
        <h3>Made by ME<sup>©</sup></h3>
    </footer>

</body>
</html>