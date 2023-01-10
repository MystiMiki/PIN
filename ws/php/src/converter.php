<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia"/>
    <link rel="stylesheet" href="styles.css"/>
    <title>Project PIN</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
    <header>
        <h1 class="w3-sofia">Convert xml to html</h1>
        <?php require 'components/top_nav.php'; ?> 
    </header>



    <main>
        <section>
            <div>
                <p>
                    All students preview are already created. Use only for update of styles. It will <span class="w3-text-red">overwrite</span> existing file.
                </p>
                <form enctype="multipart/form-data" action="converter.php" method="POST">
                    <label for="student">Click to upload the student in a valid XML file.</label>
                    <br>
                    <input type="file" id="student" name="student" data-max-file-size="2M"/>
                    <br>
                    <button type="submit" class="w3-button">Send</button>
                </form>
            </div>
        

            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $student_directory = 'UploadedStudents/';
                $uploaded_student = $student_directory . basename($_FILES['student']['name']) . ".html";

                if (file_exists($uploaded_student)){
                    echo '<p class="text-danger">A file with the same name already exists in the database. <p class="w3-text-red"> The file was overwritten! </p></p>';
                } 
                if (move_uploaded_file($_FILES['student']['tmp_name'], $uploaded_student)) {
                    // XSD validation
                    $xml = new DOMDocument;
                    $xml->load($uploaded_student);
                    if ($xml->schemaValidate('student.xsd')){
                    
                        echo '<hr><p class="text-success">The uploaded file is valid and has been successfully uploaded to the database.</p>';
                        
                        // XML
                        $xml_document = new DOMDocument();
                        $xml_document->load($uploaded_student);

                        // XSL
                        $xslt_document = new DOMDocument();
                        $xslt_document->load("student.xslt");

                        // XSLTtransformation
                        $xslt_procesor = new XSLTProcessor();
                        $xslt_procesor->importStylesheet($xslt_document);
                        $transformed_xml = $xslt_procesor->transformToDoc($xml_document);
                        
                        // saving the transformed document
                        $file_name = basename($_FILES['student']['name']) . ".html";
                        $transformed_xml->save("UploadedStudents/" . $file_name );
                    
                    } else {
                    echo '<p class="text-warning">Uploaded file is not valid! Please check the correct structure.</p>';
                    unlink($uploaded_student);
                    }
                } else {
                    echo '<p class="text-warning">An error occurred while uploading the file!</p>';
                }
            }
            ?> 
        </section>
    </main>
    <?php require 'components/footer.php'; ?>
</body>
</html>
