<?php
 $hostname = 'worldhello.dothome.co.kr';
 $dbuserid = 'worldhello';
 $dbpasswd = 'sudo0212!';
 $dbname = 'worldhello';

 $mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

 if ($mysqli->connect_errno) {
 die('mysqli connection error: ' . $mysqli->connect_error);
 } 

?>