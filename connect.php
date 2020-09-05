<?php

session_start();
 
$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'registro',
);

if(!$conn){
    die('error al conectar');
};

?>