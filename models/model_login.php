<?php

function verifyPassword($username, $password, $pdo)
{
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