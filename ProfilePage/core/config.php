<?php
return[
	'name' => 'isightdb',
	'username' => 'root',
	'password' => '',
	'connection' => 'mysql:host=127.0.0.1',
	'options' => [
		PDO::ATTR_PERSISTENT    => true,
    	PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION,
    	PDO::ATTR_EMULATE_PREPARES => false
	]
	
];