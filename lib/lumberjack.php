<?php
function require_relative($path) {
	require_once(dirname(__FILE__)."/".$path);
}
require_relative("lumberjack/store.php");
require_relative("lumberjack/model.php");
require_relative("lumberjack/collection.php");

// Models
// require_relative("models/user.php");
// require_relative("models/post.php");
// require_relative("models/page.php");
// require_relative("models/menu.php");
// require_relative("models/term.php");