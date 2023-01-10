<?php
// define variables and set to empty values
    $file_nameErr = $firstErr = $lastErr =  $emailErr  =  
    $genderErr = $degreeErr = $personalErr = $start_yearErr = 
    $facultyErr = $instituteErr = "";
    $file_name = $first = $last = $email =  
    $gender = $degree = $personal = $start_year = 
    $faculty = $institute = $branch = "";

    $is_all = true;
    $is_branch = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] == 'Submit') {
        if (empty($_POST["file_name"])) {
            $is_all = false;
            $file_nameErr = "File name is required";
        } else {
            $file_name = test_input($_POST["file_name"]);
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
            if (!preg_match("/[a-z0-9._-]+@[a-z0-9_-]+\.[a-z0-9._-]+/i", $email)) {
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

        if (!empty($_POST["start_year"])) {    
            $start_year = test_input($_POST["start_year"]);
            if ($start_year < 1900) {
                $is_all = false;
                $start_yearErr = "Year must be greater than 1900";
            }
        }

        if (!empty($_POST["branch"])) {
            $branch = test_input($_POST["branch"]);
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

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

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