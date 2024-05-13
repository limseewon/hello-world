<?php
session_start();
session_unset();
session_destroy();
$url = '/helloworld/admin/login.php';
echo "<script>alert('로그아웃 되었습니다.');</script>"; // 작동 왜안할까
header("Location.href:$url");
die();