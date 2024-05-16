<?php
session_start();
session_unset();
session_destroy();
$url = '/helloworld/index.php';
header("Location:$url");
die();