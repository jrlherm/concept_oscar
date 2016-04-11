<?php

/**
 * Path config
*/

define('APP_ROOT_DIR', __DIR__);
define('APP_VIEW_DIR', APP_ROOT_DIR.'/View/');

/**
 * DB Sql connection
 */

require('config/DbConnect.php');

/**
 * Array Routing
 */

require('config/Routing.php');