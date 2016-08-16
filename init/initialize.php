<?php

/* 
 * Initialize page
 */

include_once (__DIR__ .'/app.config.php');

/*
 * Validate application encoding
 */
if ($APP_CONFIG[USE_GZIP] == YES ) {
    if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
        ob_start("ob_gzhandler");
    } else {
        ob_start();
    }
}

/*
 * Validate application mode (development or release)
 */
if ($APP_CONFIG[APP_MODE] == DEVELOPMENT) {
    header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    header("Cache-Control: no-cache");
    header("Pragma: no-cache");
}

if (isset($_GET['sessionexpired'])) {
    header("Location:".APP_URL);
}
/*
 * Validate session expired
 */
$timerequest = $_SERVER['REQUEST_TIME'];
if (isset($_SESSION[LASTACTIVITY]) && ($timerequest - $_SESSION[LASTACTIVITY]) > $APP_CONFIG[SESSION_EXPIRED]) {
	session_unset();
	session_destroy();
	session_start();
    header("Location:".APP_URL.'?sessionexpired=1');
}
$_SESSION[LASTACTIVITY] = $timerequest;
?>