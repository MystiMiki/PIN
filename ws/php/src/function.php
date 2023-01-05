<?php
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

function display_Xpath_history()
{
    echo "<p>Xpath history</p>";
    // how many?
    if (isset($_COOKIE['xpath'])) 
    {
        foreach (unserialize($_COOKIE['xpath']) as $name => $value) 
        {
            echo "<p>$name : $value </p>\n"; 
        }
    }
}

?>
