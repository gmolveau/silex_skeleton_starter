<?php


// index route
$app->get('/', function() use ($app)
{
    // basic case
    
    // load the model
    require './models/model_index.php';
    
    // use fonctions from that model
    $result = foo();
    
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
    
    // want to pass parameter to twig ?
    return $app['twig']->render('view_index.html.twig', array(
        'content' => $content,
        'title' => $title
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
    if (verifyPassword($username, $password)) {
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