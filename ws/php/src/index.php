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
        <h1 class="w3-sofia">Students</h1>
        <?php require 'components/top_nav.php'; ?>
    </header>   
    
    <main >
        <ul class="w3-ul">
            <?php              
            $students = glob("UploadedStudents/*xml");
            foreach($students as $filename) {
                echo '<li><a href="'.$filename.'.html" class="w3-container haling_middle"><i>' . preg_replace('/^UploadedStudents\//', '',$filename) . '</i></a></li>';
            }

            ?>
        </ul>
    </main>

    <?php require 'components/footer.php'; ?>

</body>
</html>