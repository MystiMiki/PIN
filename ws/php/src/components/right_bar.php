<div class="right_bar w3-round-large margin5">	
    <div class="w3-container"><b>Uploaded students:</b></div>
    <?php
    $students = glob("UploadedStudents/*xml");
    $students = preg_replace('/^UploadedStudents\//', '',$students);
    foreach($students as $filename) {
        echo '<p class="w3-container w3-leftbar w3-border-black">' . $filename . '</p>';
    }
    ?>
</div>