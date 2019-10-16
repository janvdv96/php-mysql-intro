<?php
declare(strict_types=1);
require '../controller/connection.php';
$dataAll = select(openConnection(), 'SELECT * FROM students');
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
    <link rel="stylesheet" href="../assets/style.css">
    <title>Index.php</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Becode Students</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php">Full List <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="insert.php">Add a student</a>
        </div>
    </div>
</nav>

<div class="container text-center">
    <h1>List of all BeCode students</h1>
    <table>
        <th>ID</th>
        <th>First name</th>
        <th>Last name</th>
        <th>Username</th>
        <th>LinkedIn</th>
        <th>Github</th>
        <th>Email</th>
        <th>Language</th>
        <th>Avatar</th>
        <th>Video</th>
        <th>Quote</th>
        <th>Quote Author</th>
        <th>Created at</th>
        <?php
        if (!empty($dataAll)) {
            foreach ($dataAll as $data) {
                echo '<tr>';
                echo '<td>' . $data['id'];
                echo '<td>' . $data['first_name'];
                echo '<td>' . $data['last_name'];
                echo '<td>' . $data['username'];
                echo '<td><a href="' . $data['linkedin'] . '"> ' . 'Link' . '</a>';
                echo '<td><a href="' . $data['github'] . '"> ' . 'Link' . '</a>';
                echo '<td><a href="mailto:' . $data['email'] . '"> ' . 'Email' . '</a>';
                echo '<td>' . $data['preferred_language'];
                echo '<td><img class="avatar" src="' . $data['avatar'] . '" alt="avatar">';
                echo '<td><a href="' . $data['video'] . '"> ' . 'Link' . '</a>';
                echo '<td>' . $data['quote'];
                echo '<td>' . $data['quote_author'];
                echo '<td>' . $data['created_at'];
                echo '<td><a href="profile.php?profile=' . $data['id'] . '"> ' . 'Profile' . '</a>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td>' . 'Nothing here, check your DB';
            echo '</tr>';
        }
        ?>
    </table>
</div>
</body>
</html>

<?php
var_dump($_SESSION);
echo '<hr>';
var_dump($_COOKIE);
