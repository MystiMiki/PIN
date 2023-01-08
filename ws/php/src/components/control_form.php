<?php
// define variables and set to empty values
    $fileErr = $firstErr = $lastErr =  $personalErr =  
    $emailErr = $genderErr = $startyeareErr = $startYearErr = "";
    $file = $first = $last = $personal =  
    $email = $gender = $startYear = "";

    $is_all = true;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["file"])) {
            $is_all = false;
            $fileErr = "File name is required";
        } else {
            $file = test_input($_POST["file"]);
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

        if (empty($_POST["personal"])) {
            $is_all = false;
            $personalErr = "Personal identifier is required";
        } else {
            $personal = test_input($_POST["personal"]);
        }

        if (empty($_POST["email"])) {
            $is_all = false;
            $emailErr = "Email is required";
        } else {        
            if (!preg_match("/[a-z0-9._-]+@[a-z0-9_-]+\.[a-z0-9._-]+/i", $email)) {
                $is_all = false;
                $emailErr = "Invalid email";
            }
            else{
                $email = test_input($_POST["email"]);
            }
        }

        if (empty($_POST["gender"])) {
            $is_all = false;
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

        if (empty($_POST["startYear"])) {
            $is_all = false;
            $startYearErr = "";
        } else {
            $startYear = test_input($_POST["startYear"]);
        }
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>