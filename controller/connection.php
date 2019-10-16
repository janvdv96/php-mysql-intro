<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

function openConnection()
{
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'janvdv';
    $db = 'becode';

    $pdo = new PDO('mysql:host=' . $dbhost . ';dbname=' . $db, $dbuser, $dbpass); // DSN specifying the database source, username and password is optional
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    return $pdo;
}

function select(PDO $pdo, string $query): array
{
    //select rows from the db based on a given query
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function selectWHere(PDO $pdo, string $query, string $column, string $value): array
{
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':' . $column, $value);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function insertNewStudent(PDO $pdo, $data): void
{
    $sql = 'INSERT INTO students (first_name, last_name, username, linkedin, github, email, preferred_language, avatar, video, quote, quote_author) VALUES (:first_name, :last_name, :username, :linkedin, :github, :email, :preferred_language, :avatar, :video, :quote, :quote_author)';
    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':first_name', $first_name);
    $stmt->bindParam(':last_name', $last_name);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':linkedin', $linkedin);
    $stmt->bindParam(':github', $github);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':preferred_language', $preferred_language);
    $stmt->bindParam(':avatar', $avatar);
    $stmt->bindParam(':video', $video);
    $stmt->bindParam(':quote', $quote);
    $stmt->bindParam(':quote_author', $quote_author);

    $first_name = $data['first_name'];
    $last_name = $data['last_name'];
    $username = $data['username'];
    $linkedin = $data['linkedin'];
    $github = $data['github'];
    $email = $data['email'];
    $preferred_language = $data['preferred_language'];
    $avatar = $data['avatar'];
    $video = $data['video'];
    $quote = $data['quote'];
    $quote_author = $data['quote_author'];

    $stmt->execute();
}

function update()
{
    // update a value on a row
}

function deleteRow(PDO $pdo, $id)
{
    // delete an entire row based on ID?
    $stmt = $pdo->prepare('DELETE FROM students WHERE id=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}