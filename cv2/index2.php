<!DOCTYPE html>
<html>
<head>
    <title>Studentonahrávač</title>
</head>
<body>
    <h1>Studentonahrávač</h1>
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
