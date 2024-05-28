<?php
 $hostname = 'localhost';
 $dbuserid = 'seewon';
 $dbpasswd = 'mina1105!';
 $dbname = 'worldhello';
 
 $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

 if ($mysqli->connect_errno) {
 die('mysqli connection error: ' . $mysqli->connect_error);
 } 

?>