<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="styles.css">
    <title>Project PIN</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
    <header>
        <h1 class="w3-sofia w3-container">Student recorder</h1>
    </header>

    <nav class="w3-bar">
        <a href="index.php" class="w3-bar-item w3-button w3-round">Overview of students</a>
        <a href="recorder.php" class="w3-bar-item w3-button w3-round">Student recorder</a>
        <a href="converter.php" class="w3-bar-item w3-button w3-round">Convert xml to html</a>
        <a href="XPath.php" class="w3-bar-item w3-button w3-round">XPath</a>
        <a href="form.php" class="w3-bar-item w3-button w3-round">Form</a>
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </nav>

    <main class="w3-panel">
        <form enctype="multipart/form-data" action="recorder.php" method="POST">
            <label for="student">Click to upload the student in a valid XML file.</label>
            <br>
            <input type="file" id="student" name="student" data-max-file-size="2M"/>
            <br>
            <button type="submit" class="w3-button">Send</button>
        </form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adresar_students = 'students/';
    $nahrany_student = $adresar_students . basename($_FILES['student']['name']);

    if (file_exists($nahrany_student)){
        echo '<p class="text-danger">A file with the same name already exists in the database. Please rename the file!</p>';
        echo '<p class="w3-text-red">' . basename($_FILES['student']['name'] . '</p>');
    } 
    else if (move_uploaded_file($_FILES['student']['tmp_name'], $nahrany_student)) {
        // XSD validace
        $xml = new DOMDocument;
        $xml->load($nahrany_student);
        if ($xml->schemaValidate('student.xsd')){
        
          echo '<hr><p class="text-success">The uploaded file is valid and has been successfully uploaded to the database.</p>';
          
        } else {
          echo '<p class="text-warning">Uploaded file is not valid! Please check the correct structure.</p>';
          unlink($nahrany_student);
        }
    } else {
         echo '<p>An error occurred while uploading the file!</p>';
    }
}
?>
    </main>
    <footer class="w3-container">
        <h3>This is footer</h3>
    </footer>
</body>
</html>