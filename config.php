<?php
$host = 'http://localhost:8888/OpenCartBackend';
$dir = '/Users/kuzmavladislavvladimirovic/Documents/2020/java_projects/OpenCartBackend';
// HTTP
define('HTTP_SERVER', $host . '/');

// HTTPS
define('HTTPS_SERVER', $host . '/');

// DIR
define('DIR_APPLICATION', $dir . '/catalog/');
define('DIR_SYSTEM', $dir . '/system/');
define('DIR_IMAGE', $dir . '/image/');
define('DIR_STORAGE', '/Users/kuzmavladislavvladimirovic/Documents/2020/java_projects/OpenCartBackend/storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/theme/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_MODIFICATION', DIR_STORAGE . 'modification/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'kzm_vlad');
define('DB_PASSWORD', '123root@');
define('DB_DATABASE', 'opencart_backend');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');