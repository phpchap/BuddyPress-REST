<?php

// add restler to include path
$path = get_include_path() . PATH_SEPARATOR . 'Restler/restler';
set_include_path($path);

require_once 'restler.php';
require_once 'UserAPI.php';

// start the rest server
$r = new Restler(TRUE);
$r->refreshCache();
$r->addAPIClass('UserAPI');
$r->handle();

/*

// set autoloader
spl_autoload_register('spl_autoload');

 * 
 */