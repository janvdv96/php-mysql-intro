<?php
require '../controller/connection.php';

if (empty($_POST)){
    session_destroy();
    header('location: ../view/login.php');
}

if (!empty($_POST)){
    $check = selectWHere(openConnection(), 'SELECT * FROM students WHERE email=:email','email', $_POST['email']);
    if (!empty($check)){
        session_start();
        $_SESSION['logged_in'] = true;
        header('location: ../view/index.php');
    }
}

var_dump($_POST);
echo '<hr>';
var_dump($check);


