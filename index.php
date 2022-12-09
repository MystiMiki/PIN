<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="styles.css">
    <title>Projekt xml</title>
</head>
<body>
    <header>
        <h1 class="w3-sofia w3-container">Studenti</h1>
    </header>

    <nav class="w3-bar">
        <a href="index.php" class="w3-bar-item w3-button">Přehled studentů</a>
        <a href="index2.php" class="w3-bar-item w3-button">Nahravač studentů</a>
        <a href="index3.php" class="w3-bar-item w3-button">Převod xml na html</a>
        <a href="index4.php" class="w3-bar-item w3-button">Formulář</a>
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </nav>

    <main>
        <section class="w3-container">
            <ul>
                <?php
                $adresar_studenti = 'studenti/';
                $obsah_adresare = scandir($adresar_studenti);
                array_splice($obsah_adresare, 0, 2);
                foreach($obsah_adresare as $stranka_studenta){
                    $stranka_studenta = rtrim($stranka_studenta, ".html");
                    echo '<li><a href="'.$adresar_studenti.$stranka_studenta.'" style="text-decoration: none;">'.$stranka_studenta_nazev.'</a></li>';
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