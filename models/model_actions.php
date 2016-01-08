<?php

function createAccount($username, $password)
{
    try {
        $pdo  = $app['pdo'];
        // example of a INSERT INTO pdo request
        $stmt = $pdo->prepare("INSERT INTO users(username,password,profile) VALUES(:username,:password,:profile)");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        // hash password before input in DB
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue(':password', $hash, PDO::PARAM_STR);
        $stmt->bindValue(':profile', null);
        $stmt->execute();
        return true;
    }
    catch (PDOException $e) {
        return ($e->getMessage());
    }
}

function changePassword($username, $password)
{
    try {
        $pdo  = $app['pdo'];
        // example of an UPDATE pdo request
        $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE username = :username");
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);
        
        // hash password before input in DB
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindValue(':password', $hash);
        $stmt->execute();
        return true;
    }
    catch (PDOException $e) {
        return ($e->getMessage());
    }
}

?>