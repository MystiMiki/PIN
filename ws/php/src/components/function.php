<?php
// create and add values to cookies
function Xpath_history($command)
{
    // if the cookie exists, read it and unserialize it. If not, create a blank array
    if(array_key_exists('xpath', $_COOKIE)) {
        $cookie = $_COOKIE['xpath'];
        $cookie = unserialize($cookie); 
    } else {
        $cookie = array();
    }

    // add the value to the array and serialize
    $cookie[] = $command;
    $cookie = serialize($cookie);

    // save the cookie
    setcookie('xpath', $cookie, time()+3600); // in hour
}

// writes out values from cookies
// NOT WORKING PROPERLY
function display_Xpath_history()
{
    echo "<p>Xpath history:</p>";
    if (isset($_COOKIE['xpath'])) 
    {
        foreach (unserialize($_COOKIE['xpath']) as $name => $value) // needs to be unserialize, then goes through values
        {
            echo "<p>$name : $value </p>\n"; 
        }
    }
}

// writes out count of values from cookies
function display_Xpath_history_number()
{
    echo "<p>Number of your commands:</p>";
    if (isset($_COOKIE['xpath'])) 
    {
        echo sizeof(unserialize($_COOKIE['xpath']));       
    }
}

?>
