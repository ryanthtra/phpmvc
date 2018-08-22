<?php
// Load config file
require_once 'config/config.php';

// Loading libraries
// require_once 'libraries/Core.php';
// require_once 'libraries/Controller.php';
// require_once 'libraries/Database.php';

// Autoloading libraries
spl_autoload_register(function($className){
  require_once 'libraries/' . $className . '.php';
})

?>

<h1>BOOTSTRAP</h1>