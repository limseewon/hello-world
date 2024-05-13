<?php
session_start();
session_unset();
session_destroy();
$url = '/helloworld/user/index.php';
header("Location:$url");
die();