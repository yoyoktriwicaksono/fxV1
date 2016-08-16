<?php
/*
 * DATABASE
 */
define("MYSQL","MYSQL");

require_once ('vendor/autoload.php');
 
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array("../base/entities");
$isDevMode = true;

switch ($APP_CONFIG[DATABASE_VENDOR]) {
    /*
    case MSSQL:
        $dbParams = array(
            'driver'   => 'pdo_sqlsrv', // pdo_sqlsrv
            'user'     => 'sa',
            'password' => 'saadmin',
            'dbname'   => 'dbbpjs',
            'host'     => 'localhost',
            'port'     => '1433',
        );
        break;
    */
    case MYSQL:
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'admin',
            'dbname'   => 'absensireska',
            'host'     => 'localhost',
            'port'     => '3306',
        );
        break;
    /*
    case ORACLE:
        $dbParams = array(
        'driver'   => 'oci8',
        'user'     => 'admin',
        'password' => 'saadmin',
        'host'     => 'yoyok-PC',
        'port'     => '1521',
        'dbname'   => 'XE',
        'servicename'     => 'XE',
        'service'     => true
        );
        break;
         */
    default:
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'admin',
            'dbname'   => 'absensireska',
            'host'     => 'localhost',
            'port'     => '3306',
        );
        break;
}

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);
?>