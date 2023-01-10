<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
    <link rel="stylesheet" href="styles.css"/>
    <title>Project PIN</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
    <header>
        <h1 class="w3-sofia">Student recorder</h1>
        <?php require 'components/top_nav.php'; ?> 
    </header>    

    <main>        
        <section class="max_width">
            <form enctype="multipart/form-data" action="recorder.php" method="POST">
                <label for="student">Click to upload the student in a valid XML file.</label>
                <br>
                <input type="file" id="student" name="student" data-max-file-size="2M"/>
                <br>
                <button type="submit" class="w3-button">Send</button>
            </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $adresar_students = 'UploadedStudents/';
                $nahrany_student = $adresar_students . basename($_FILES['student']['name']);

                if (file_exists($nahrany_student)){
                    echo '<p class="text-danger">A file with the same name already exists in the database. Please rename the file! </p>';
                    echo '<p class="w3-text-red">' . basename($_FILES['student']['name']) . '</p>';
                } 
                else if (move_uploaded_file($_FILES['student']['tmp_name'], $nahrany_student)) {
                    // XSD validace
                    $xml = new DOMDocument;
                    $xml->load($nahrany_student);

                    
                    if ($xml->schemaValidate('student.xsd')){

                        echo '<hr><p class="text-success">The uploaded file is valid and has been successfully uploaded to the database.</p>';

                        // XML
                        $xml_dokument = new DOMDocument();
                        $xml_dokument->load($nahrany_student);

                        $xslt_dokument = new DOMDocument();
                        $xslt_dokument->load("student.xslt");

                        // XSLTtransformation
                        $xslt_procesor = new XSLTProcessor();
                        $xslt_procesor->importStylesheet($xslt_dokument);
                        $transformovany_xml = $xslt_procesor->transformToDoc($xml_dokument);
                            
                        // ulozeni transformovaneho dokumentu
                        $nazev_dokumentu = basename($_FILES['student']['name']) . ".html";
                        $transformovany_xml->save("UploadedStudents/" . $nazev_dokumentu );
                    
                    
                    } else {
                        echo '<p class="text-warning">Uploaded file is not valid! Please check the correct structure.</p>';
                        unlink($nahrany_student);
                    }
                } else {
                        echo '<p class="text-warning">An error occurred while uploading the file!</p>';
                }
            }
            ?>
        </section>
    <?php require 'components/right_bar.php'; ?>
    </main>

    <?php require 'components/footer.php'; ?>
</body>
</html>