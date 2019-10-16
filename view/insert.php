<?php
declare(strict_types=1);
require '../controller/connection.php';

if (!empty($_POST)) {
    insertNewStudent(openConnection(), $_POST);
    header('location: index.php');
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
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Insert.php</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Becode Students</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php">Full List <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link active" href="insert.php">Add a student</a>
        </div>
    </div>
</nav>

<div class="container text-center">
    <h1>Add a student:</h1>
    <form method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" required/>
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control" required/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required/>
            </div>
            <div class="form-group col-md-6">
                <label for="linkedin">Linkedin:</label>
                <input type="text" id="linkedin" name="linkedin" class="form-control" required/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="github">Github:</label>
                <input type="text" id="github" name="github" class="form-control" required/>
            </div>
            <div class="form-group col-md-6">
                <label for="email">E-mail:</label>
                <input type="text" id="email" name="email" class="form-control" required/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="preferred_language">Language:</label>
                <input type="text" id="preferred_language" name="preferred_language" class="form-control" required/>
            </div>
            <div class="form-group col-md-6">
                <label for="avatar">Avatar:</label>
                <input type="text" id="avatar" name="avatar" class="form-control" required/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="video">Video:</label>
                <input type="text" id="video" name="video" class="form-control" required/>
            </div>
            <div class="form-group col-md-6">
                <label for="quote">Quote:</label>
                <input type="text" id="quote" name="quote" class="form-control" required/>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="quote_author">Quote Author:</label>
                <input type="text" id="quote_author" name="quote_author" class="form-control" required/>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

</body>
</html>

