<?php
// Redirection if direct access <=> session not active
if (session_status() !== PHP_SESSION_ACTIVE) {
    header('Location:../?page=error404');
    exit();
}



define('ENV','dev');


define('DB_PORT', 3306);

define('DB_HOST_DEV', "localhost");
define('DB_HOST_PROD', "dev");
/**
 * This function return DB_HOST according to the environment
 *
 * @return string
 */
function getDBHost() {
    if (ENV == 'prod') {
        return DB_HOST_PROD;
    } else {
        return DB_HOST_DEV;
    }
}

define('DB_NAME_DEV', "mydb");
define('DB_NAME_PROD', "..........");
/**
 * This function return DB_NAME according to the environment
 *
 * @return string
 */
function getDBName() {
    if (ENV == 'prod') {
        return DB_NAME_PROD;
    } else {
        return DB_NAME_DEV;
    }
}

define('DB_USER', "root");
define('DB_PASSWD', "");


// Salt for password :)
define('SALT','48@!alsd');




