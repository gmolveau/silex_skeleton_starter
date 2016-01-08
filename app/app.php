<?php
use Silex\Application;
use Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider;
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Register global error and exception handlers
ErrorHandler::register();
ExceptionHandler::register();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__ . '/../views'
));
$app->register(new Silex\Provider\SessionServiceProvider());

require_once __DIR__ . '/credentials.php'; // database credentials

// database registration PDO
$app->register(
// you can customize services and options prefix with the provider first argument (default = 'pdo')
    new PDOServiceProvider('pdo'), array(
    'pdo.server' => array(
        // PDO driver to use among : mysql, pgsql , oracle, mssql, sqlite, dblib
        'driver' => 'mysql',
        'host' => HOST,
        'dbname' => BASE,
        'port' => PORT,
        'user' => USER,
        'password' => PASSWD
    ),
    // optional PDO attributes used in PDO constructor 4th argument driver_options
    // some PDO attributes can be used only as PDO driver_options
    // see http://www.php.net/manual/fr/pdo.construct.php
    'pdo.options' => array(
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"
    ),
    // optional PDO attributes set with PDO::setAttribute
    // see http://www.php.net/manual/fr/pdo.setattribute.php
    'pdo.attributes' => array(
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
    )
));
