<?php
// WARNING: Exclude the DB params from your repository!
// SUGGESTION: Make a copy of this file and call it config.secret.php.  It will be git-ignored.

// Holds some constants and their values.

// DB params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'your_password');
define('DB_NAME', 'your_db');


// App Root
define('APPROOT', dirname(dirname(__FILE__)));

// URL Root
define('URLROOT', 'http://localhost/phpmvc');

// Site name
define('SITENAME', 'PHP MVC');
?>