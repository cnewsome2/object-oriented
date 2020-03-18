<?php

spl_autoload_register(function($class) {

	$prefix = "CNewsome2\\ObjectOriented";
	$baseDir = __DIR__;

	// does the class use the namespace prefix?
	$len = strlen($prefix);
	if (strncmp($prefix, $class, $len) !== 0) {
		// no, move to the next registered autoloader
		return;
	}

	$className = substr($class, $len);

	$file = $baseDir . str_replace("\\", "/", $className) . ".php";

	if(file_exists($file)) {
		require_once($file);
	}
});