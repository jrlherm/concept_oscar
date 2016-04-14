<?php

/**
 * Path config
*/

define('APP_ROOT_DIR', __DIR__);
define('APP_VIEW_DIR', APP_ROOT_DIR.'/view/');

/**
 * DB Sql connection
 */

require('config/DbConnect.php');

/**
 * Array Routing
 */

require('config/Routing.php');