<?php
function foo(){
    //do stuff like a query pdo
    //$pdo = $app['pdo']
    return array('foo'=>'stuff duck');
}

function getAllUsers($pdo)
{
    // example of pdo usage 
    try {
        // example of pdo query
        $all_users = $pdo->query("SELECT username FROM users;");
        return $all_users; //renvoyer à la view
    }
    catch (PDOException $e) {
        return ($e->getMessage());
    }
};

?>