<?php
require '../controller/connection.php';
if ($_SESSION['logged_in']){
    header('location: ../view/index.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/login.css">
    <title>Login</title>
</head>
<body class="text-center">
<form class="form-signin" action="../controller/auth.php" method="post">
    <h1 class="h3 mb-3 display-3 font-weight-normal">Log in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="pw" id="inputPassword" class="form-control" placeholder="Password" required>
    <input class="btn btn-lg btn-dark btn-block" type="submit" value="Sign in">
    <p class="mt-5 mb-3 text-muted">&copy; BeCode 2019</p>
</form>
</body>
</html>