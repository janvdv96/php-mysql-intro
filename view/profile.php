<?php
declare(strict_types=1);
require '../controller/connection.php';
try {
    $profileData = select(openConnection(), 'SELECT * FROM students WHERE id=' . $_GET['profile']);
} catch (Exception $e) {
    die ($e);
}

if (isset($_POST['delete'])) {
    deleteRow(openConnection(), $_GET['profile']);
    header('location: index.php');
}

if (empty($profileData)) {
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
    <title><?php echo $profileData[0]['first_name'] ?>'s profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
          crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/profile.css">
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
            <a class="nav-item nav-link active" href="index.php">Full List <span
                        class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="insert.php">Add a student</a>
        </div>
    </div>
</nav>

<div class="container thickBorder mt-3">
    <div class="row my-3">
        <div class="col-md-8">
            <div class="text-center nameText thickBorder">
                <?php echo $profileData[0]['first_name'] . ' ' . $profileData[0]['last_name'] . ', "' . $profileData[0]['username'] . '"' ?>
            </div>
            <div class="row p-3">
                <div class="col-2">
                    <a target="_blank" href="<?php echo $profileData[0]['github'] ?>"><img
                                class="logo grow center-block" src="../assets/src/GitHub-Mark-64px.png" alt=""></a>
                </div>
                <div class="col-2">
                    <a target="_blank" href="<?php echo $profileData[0]['linkedin'] ?>"><img
                                class="logo grow center-block" src="../assets/src/linkedin.png" alt=""></a>
                </div>
                <div class="col-2">
                    <a target="_blank" href="mailto:<?php echo $profileData[0]['email'] ?>"><img
                                class="logo grow center-block" src="../assets/src/email.png" alt=""></a>
                </div>
            </div>
            <div class="col">
                <p class="quoteText"><?php echo $profileData[0]['quote'] . ' -' . $profileData[0]['quote_author'] ?></p>
            </div>
        </div>
        <div class="col-md-4">
            <img class="profilePic thickBorder" src="<?php echo $profileData[0]['avatar'] ?>" alt="">
        </div>
    </div>
</div>
<form action="profile.php?profile=<?php echo $_GET['profile'] ?>" method="post">
    <input type="submit" name="delete" value="delete profile">
</form>

</body>
</html>