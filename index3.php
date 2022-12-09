<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="styles.css">
    <title>Generátor .xml.html</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
    <header>
        <h1 class="w3-sofia w3-container">Generátor .xml.html</h1>
    </header>

    <nav class="w3-bar">
        <a href="index.php" class="w3-bar-item w3-button">Přehled studentů</a>
        <a href="index2.php" class="w3-bar-item w3-button">Nahravač studentů</a>
        <a href="index3.php" class="w3-bar-item w3-button">Převod xml na html</a>
        <a href="index4.php" class="w3-bar-item w3-button">Formulář</a>
    </nav>

    <main class="w3-panel">
        <form enctype="multipart/form-data" action="index3.php" method="POST">
            <label for="student">Kliknutím nahrajte studenta ve validním XML souboru.</label>
            <br>
            <input type="file" id="student" name="student" data-max-file-size="2M"/>
            <br>
            <button type="submit" class="w3-button">Odeslat</button>
        </form>
    

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adresar_studentu = 'studenti/';
    $nahrany_student = $adresar_studentu . basename($_FILES['student']['name']);

    /*if (file_exists($nahrana_fakulta)){
        echo '<p class="text-danger">Soubor se stejným názvem již existuje v databázi. Prosím přejmenujte soubor.!</p>';
    } 
    else*/ if (move_uploaded_file($_FILES['student']['tmp_name'], $nahrany_student)) {
        // XSD validace
        $xml = new DOMDocument;
        $xml->load($nahrany_student);
        if ($xml->schemaValidate('student.xsd')){
        
            echo '<p class="text-success">Nahraný soubor je validní a byl úspěšně nahrán do databáze.</p>';
            
            // XML
            $xml_dokument = new DOMDocument();
            $xml_dokument->load($nahrany_student);

            // XSL
            $xsl_dokument = new DOMDocument();
            $xsl_dokument->load("student.xsl");

            // XSLTtransformation
            $xsl_procesor = new XSLTProcessor();
            $xsl_procesor->importStylesheet($xsl_dokument);
            $transformovany_xml = $xsl_procesor->transformToDoc($xml_dokument);
              
            // ulozeni transformovaneho dokumentu
            $nazev_dokumentu = basename($_FILES['student']['name']) . ".html";
            $transformovany_xml->save("studenti/" . $nazev_dokumentu );
          
        } else {
          echo '<p class="text-warning">Nahraný soubor není validní! Prosím zkontrolujte správnou strukturu.</p>';
          unlink($nahrany_student);
        }
    } else {
         echo '<p>Došlo k chybě při nahrávání souboru!</p>';
    }
}
?> 
    </main>
    <footer class="w3-container">
        <h3>This is footer</h3>
    </footer>
</body>
</html>