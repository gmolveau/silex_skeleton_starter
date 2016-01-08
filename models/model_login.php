<?php

function connect()
{
    // example of pdo usage 
    $pdo = $app['pdo'];
    try {
        // example of pdo query
        $all_users = $pdo->query("SELECT username FROM users;");
        return $all_users; //renvoyer à la view
    }
    catch (PDOException $e) {
        return ($e->getMessage());
    }
};

function verifyPassword($username, $password)
{
    $pdo = $app['pdo'];
    try {
        // example of pdo prepared statement
        $stmt = $pdo->prepare("SELECT `password` FROM `users` WHERE `username` = :username");
        $stmt->execute(array(
            ':username' => $username
        ));
        $result = $stmt->fetchAll();
        return password_verify($password, $result['password']);
    }
    catch (PDOException $e) {
        return ($e->getMessage());
    }
};


?>