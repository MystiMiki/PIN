<?php
function Xpath_history()
{

    $name = 'xpath command history';

    // if the cookie exists, read it and unserialize it. If not, create a blank array
    if(array_key_exists('xpath', $_COOKIE)) {
        $cookie = $_COOKIE['xpath'];
        $cookie = unserialize($cookie);
    } else {
        $cookie = array();
    }

    // add the value to the array and serialize
    $cookie[] = $name;
    $cookie = serialize($cookie);

    // save the cookie
    setcookie('xpath', $cookie, time()+3600);
}

function display_Xpath_history()
{
    echo "<nav class='w3-sidenav w3-white w3-card-2' style='width:25%'>";
    echo "Xpath history";
    if (isset($_COOKIE['xpath'])) 
    {
        foreach ($_COOKIE['xpath'] as $name => $value) 
        {
            echo "<p>$name : $value </p>\n"; 
        }
    }
    echo "</nav>";
}

?>
