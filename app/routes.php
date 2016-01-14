<?php


// index route
$app->get('/', function() use ($app)
{
    // basic case
    
    // load the model
    require './models/model_index.php';
    $pdo=$app['pdo'];
    // use fonctions from that model
    $result = foo();
    $users = getAllUsers($pdo);
    // do stuff
    return $app['twig']->render('view_index.html.twig');
});

// example of a route with a variable parameter
$app->get('/{variable}', function($variable) use ($app)
{
    // the parameter variable is stored in $variable
    echo $variable;
    
    // do stuff
    
    // want to return an error ?
    $app->abort(401, "my beautiful 401 error");
    
    // want to use the session ? here's an example
    if (isset($app['session'])) {
        // want to get a parameter of the session ?
        $id = $app['session']->get('id');
        
        // want to set a parameter ?
        $app['session']->set('username', "dark_killer_69");
    }
    
    // want to redirect ?
    return $app->redirect('/myRedirection');

    // example with array
    $products = Array
    (
        [0] => Array
            (
                [title] => 'shirt louis vuitton'
                [price] => 149.99
            )

        [1] => Array
            (
                [title] => 'jean zarra'
                [price] => 19.99
            )
    )

    // want to pass multiple parameters to twig ?
    return $app['twig']->render('view_index.html.twig', array(
        'myArray' => $products, // use a for loop in your view
        'content' => $content, // get it with {{ content }} in view_index.html.twig
        'title' => $title // get it with {{ title }} 
    ));
});


// example of a POST route (url receiving a POST request)
$app->post('/login', function() use ($app)
{
    require './models/model_login.php';
    
    // want to get parameters of the request ?
    $username = $app['request']->get('username');
    $password = $app['request']->get('password');
    
    // example of use
    if (verifyPassword($username, $password, $pdo)) {
        return $app->redirect('/member');
    }
});

// other example
$app->post('/actions', function() use ($app)
{
    require './models/model_actions.php';
    $type = $app['request']->get('type');
    switch ($action) {
        case "changePassword":
            // do stuff
            return true;
        case "rename":
            // do things
            return false;
        default:
            $app->abort(403, "HOUSTONNNNNN ?!");
    }
});

/* other routes possible
 *
 * $app->put(' ...
 * $app->delete('
 *
 */