<?php

require_once('vendor/autoload.php');
require_once('config/application.php');
require_once(ABSPATH . 'wp-settings.php');

function require_relative($path) {
	require_once(dirname(__FILE__)."/".$path);
}

define('LIB_PATH', '');
require_relative('../lib/lumberjack/store.php');
require_relative('../lib/lumberjack/model.php');
require_relative('../lib/lumberjack/models/post.php');