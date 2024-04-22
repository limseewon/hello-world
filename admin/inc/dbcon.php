<?php
 $hostname = 'localhost';
 $dbuserid = 'worldhello';
 $dbpasswd = '';
 $dbname = '';

 $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

 if ($mysqli->connect_errno) {
 die('mysqli connection error: ' . $mysqli->connect_error);
 } 

?>