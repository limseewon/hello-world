<?php
//관리자 검사
if (!isset($_SESSION['UID'])) {
  echo "<script>
    alert('로그인 후 시도해주세요.');
    location.href='/helloworld/index.php';
  </script>";
}
?>