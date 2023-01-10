<?php
    // define variables and set to empty values
    $file_nameErr = $firstErr = $lastErr =  $emailErr  =  
    $genderErr = $degreeErr = $personalErr = $start_yearErr = 
    $facultyErr = $instituteErr = "";
    $file_name = $first = $last = $email =  
    $gender = $degree = $personal = $start_year = 
    $faculty = $institute = $branch = "";

    // control values
    $is_all = true; // is all required values filled out
    $is_branch = false; // if there is a branch, then faculty and institute are required

    // control only on Submit button, not on Delete history button
    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] == 'Submit') {
        if (empty($_POST["file_name"])) { // if value is empty
            $is_all = false;
            $file_nameErr = "File name is required"; // error message
        } else {   
            $file_name = test_input($_POST["file_name"]); // load value
        }

        if (empty($_POST["first"])) {
            $is_all = false;
            $firstErr = "First name is required";
        } else {
            $first = test_input($_POST["first"]);
        }  
            
        if (empty($_POST["last"])) {
            $is_all = false;
            $lastErr = "Last name is required";
        } else {
            $last = test_input($_POST["last"]);
        }

        if (empty($_POST["email"])) {
            $is_all = false;
            $emailErr = "Email is required";
        } else {     
            $email = test_input($_POST["email"]);
            if (!preg_match("/[a-z0-9._-]+@[a-z0-9_-]+\.[a-z0-9._-]+/i", $email)) { // control with regular expression
                $is_all = false;
                $emailErr = "Invalid email";
            }
        }

        if (empty($_POST["gender"])) {
            $is_all = false;
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["degree"])) {
            $is_all = false;
            $degreeErr = "Degree name is required";
        } else {  
            $degree = test_input($_POST["degree"]);         
        }

        if (empty($_POST["personal"])) {
            $is_all = false;
            $personalErr = "Personal identifier is required";
        } else {
            $personal = test_input($_POST["personal"]);
        }

        if (!empty($_POST["start_year"])) { // if value is NOT empty
            $start_year = test_input($_POST["start_year"]);
            if ($start_year < 1900) { // control year
                $is_all = false;
                $start_yearErr = "Year must be greater than 1900";
            }
        }

        if (!empty($_POST["branch"])) { 
            $branch = test_input($_POST["branch"]);
            // if there is a branch, then faculty and institute are required
            if (empty($_POST["faculty"])) { 
                $is_all = false;
                $facultyErr = "Faculty is required";
            } else {
                $faculty = test_input($_POST["faculty"]);
            }
            if (empty($_POST["institute"])) {
                $is_all = false;
                $instituteErr = "Institute is required";
            } else {
                $institute = test_input($_POST["institute"]);
            }
        }
    }

    // edit input 
    function test_input($data) {
        $data = trim($data); // strip whitespace
        $data = stripslashes($data); // Example: \' becomes '
        $data = htmlspecialchars($data); // convert special characters to HTML entities
        return $data;
    }

    // debug output
    function display_input($file_name, $first, $last, $email, $gender, $degree, $personal, $start_year, $branch, $faculty, $institute){
        echo "<h2>Your Input:</h2>" .
                  $file_name  .
                  "<br>" .
                  $first .
                  "<br>" .
                  $last  .
                  "<br>" .
                  $email .
                  "<br>" .
                  $gender.
                  "<br>" .
                  $degree.
                  "<br>" .
                  $personal .
                  "<br>" .
                  $start_year.
                  "<br>" .
                  $faculty .
                  "<br>" .
                  $institute .
                  "<br>" .
                  $branch;
    }
    ?>