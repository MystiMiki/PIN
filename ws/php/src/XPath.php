<?php
    require 'components/function.php';
    $command = '';
    Xpath_history($command);
?>
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
        <h1 class="w3-sofia">XPath</h1>
        <?php require 'components/top_nav.php'; ?> 
    </header>    

    <main> 
        <section>
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
                        
                        // get xpath command from input
                        $xpath = $_POST["xpath"];                   

                        // get file names of xml from folder UploadedStudents
                        $students = glob("UploadedStudents/*xml");
                        foreach($students as $filename) {
                            // load xml
                            $student = simplexml_load_file($filename);                        

                            // returned result of xpath command
                            $result = $student->xpath($xpath); 
                                                
                            if (count($result) > 0) {                            
                                echo '<p class="w3-panel w3-leftbar w3-border-black">' . preg_replace('/^UploadedStudents\//', '',$filename) . '</p>'; // edit name file for end user with regular expression
                                echo $student->name->first . '' . 
                                $student->name->last . '<br>' .
                                $student->email . '<br>' .
                                $student->branch . '<br>' .
                                '<hr>';
                            }
                        }
                    }
                    ?>
                </ul>
            </section>
        </section>

        <div class="right_bar w3-round-large">	
            <?php         
            display_Xpath_history_number();
            //display_Xpath_history(); //NOT WORKING PROPERLY
            ?>
        </div>
    </main>
    
    <?php require 'components/footer.php'; ?>
</body>
</html>