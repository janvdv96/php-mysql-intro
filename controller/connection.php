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

    $stmt->bindValue(':first_name', $data['first_name']);
    $stmt->bindValue(':last_name', $data['last_name']);
    $stmt->bindValue(':username', $data['username']);
    $stmt->bindValue(':linkedin', $data['linkedin']);
    $stmt->bindValue(':github', $data['github']);
    $stmt->bindValue(':email', $data['email']);
    $stmt->bindValue(':preferred_language', $data['preferred_language']);
    $stmt->bindValue(':avatar', $data['avatar']);
    $stmt->bindValue(':video', $data['video']);
    $stmt->bindValue(':quote', $data['quote']);
    $stmt->bindValue(':quote_author', $data['quote_author']);

    $stmt->execute();
}

function update()
{
    // update a value on a row
}

function deleteRow(PDO $pdo, $id)
{
    $stmt = $pdo->prepare('DELETE FROM students WHERE id=:id');
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}