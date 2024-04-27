<?php
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';
session_start();
include_once $_SERVER['DOCUMENT_ROOT'] . '/helloworld/inc/dbcon.php';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
      <form action="login_ok.php" method="POST" class="d-flex flex-column " novalidate>
      <form action="login_ok.php" method="POST" class="d-flex flex-column " novalidate>
        <div class="form-floating">
          <input type="text" class="form-control" id="userid" name="userid" placeholder="Id" />
          <label for="userid">Id</label>
          <input type="text" class="form-control" id="userid" name="userid" placeholder="Id" />
          <label for="userid">Id</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Password" />
          <label for="passwd">Password</label>
          <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Password" />
          <label for="passwd">Password</label>
          <div class="invalid-tooltip">Please choose a unique and valid username.</div>
        </div>
        <div class="position-relative">
          <button type="submit" class="btn btn-primary">Primary</button>
          <div class="invalid-tooltip">Please choose a unique and valid username.</div>
        </div>
      </form>
      <div>
        <span><a href="">아이디 찾기</a></span
        ><span><a href="">비밀번호 찾기</a></span>
      </div>
    </main>

    <!-- jquery -->
    <script
      src="https://code.jquery.com/jquery-3.7.1.min.js"
      integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
      crossorigin="anonymous"
    ></script>

    <!-- bootstrap -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
