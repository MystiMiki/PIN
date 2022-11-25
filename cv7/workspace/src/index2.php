<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <title>Studentonahrávač</title>
    <style>
        .w3-sofia {
        font-family: Sofia, cursive;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="w3-sofia w3-container">Nahrání studenta</h1>
    </header>
    <nav class="w3-bar w3-black">
        <a href="index.php" class="w3-bar-item w3-button">Přehled studentů</a>
        <a href="index3.php" class="w3-bar-item w3-button">Převod xml na html</a>
    </nav>
    <form enctype="multipart/form-data" action="index2.php" method="POST">
        <label for="fakulta">Kliknutím nahrajte studenta ve validním XML souboru.</label>
        <br>
        <input type="file" name="fakulta" data-max-file-size="2M"/>
        <br>
        <button type="submit">Odeslat</button>
    </form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adresar_fakulty = 'fakulty/';
    $nahrana_fakulta = $adresar_fakulty . basename($_FILES['fakulta']['name']);

    if (file_exists($nahrana_fakulta)){
        echo '<p class="text-danger">Soubor se stejným názvem již existuje v databázi. Prosím přejmenujte soubor.!</p>';
    } 
    else if (move_uploaded_file($_FILES['fakulta']['tmp_name'], $nahrana_fakulta)) {
        // XSD validace
        $xml = new DOMDocument;
        $xml->load($nahrana_fakulta);
        if ($xml->schemaValidate('student2.xsd')){
        
          echo '<p class="text-success">Nahraný soubor je validní a byl úspěšně nahrán do databáze.</p>';
          
        } else {
          echo '<p class="text-warning">Nahraný soubor není validní! Prosím zkontrolujte správnou strukturu.</p>';
          unlink($nahrana_fakulta);
        }
    } else {
         echo '<p>Došlo k chybě při nahrávání souboru!</p>';
    }
}
?>
</body>
</html>