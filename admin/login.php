<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/helloworld/css/common.css">
    <link rel="stylesheet" href="/helloworld/css/login.css">
    <title>HelloWorld</title>

    <style>
    </style>
  </head>
  <body>
    <main class="d-flex flex-column align-items-center">
      <div id="logo">
        <img src="/helloworld/img/logo.png" alt="logo.jpg" />
      </div>
      <form action="login_ok.php" method="POST" class="d-flex flex-column" novalidate>
        <div class="form-floating">
          <input type="text" class="form-control" id="userid" name="userid" placeholder="Id" />
          <label for="userid">Id</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Password" />
          <label for="passwd">Password</label>
          <div class="invalid-tooltip">Please choose a unique and valid username.</div>
        </div>
        <div class="position-relative">
          <button type="submit" class="btn btn-primary">로그인</button>
          <div class="invalid-tooltip">Please choose a unique and valid username.</div>
        </div>
      </form>
      <div class="search_login">
        <span><a href="">아이디 찾기</a></span>
        <span><a href="">비밀번호 찾기</a></span>
      </div>
    </main>

    <!-- jquery -->
    <script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"
    ></script>
    
    <!-- bootstrap -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </body>
</html>