<?php

class Database{
	public static function connect(){
		$db = new mysqli('fdb29.awardspace.net', '3748835_tienda', 'Pablourrea1', '3748835_tienda');
		$db->query("SET NAMES 'utf8'");
		return $db;
	}
}

