<?php
/*
 * DATABASE
 */
define("MSSQL","MSSQL");
define("MYSQL","MYSQL");
define("ORACLE","ORACLE");

/*
 * Application Mode {DEVELOPMENT,RELEASE}
 */
define("DEVELOPMENT", "DEVELOPMENT");
define("RELEASE", "RELEASE");

/*
 * Boolean
 */
define("NO", "0" );
define("YES", "1" );


/*
 * Define database used by application
 */
$APP_CONFIG[DATABASE_VENDOR] = MSSQL;

/*
 * Define Application mode
 * DEV = Development
 * REL = Release
 */
$APP_CONFIG[APP_MODE] = RELEASE;

/*
 * USE_GZIP to define that compression is defined in application
 * 0 => No, the compression is defined in php.ini
 * 1 => Yes, the compression is defined in application
 */
$APP_CONFIG[USE_GZIP] = NO; 

/*
 * Sesion Timeout = 1800 sec  = 30 minute
 */
$APP_CONFIG[SESSION_EXPIRED] = 1800;
define("LASTACTIVITY", "LASTACTIVITY" );

/*
 * Application URL
 */
define("APP_URL", "http://localhost/absensi/");

?>