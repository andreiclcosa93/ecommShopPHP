<?php

$connection = mysqli_connect('localhost', 'root', '', 'ecomphp');

if(!$connection) {

    echo "Error: unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    exit;
}

?>