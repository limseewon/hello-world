<?php
 $hostname = 'localhost';
 $dbuserid = 'seewon';
 $dbpasswd = 'sudo0212!';
 $dbname = 'seewon';
 
 $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

 if ($mysqli->connect_errno) {
 die('mysqli connection error: ' . $mysqli->connect_error);
 } 

?>