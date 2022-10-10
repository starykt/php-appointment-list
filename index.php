<?php
session_start();

if (isset($_SESSION["login"])) {
  header("Location: compromissos.php");
}

if ($_POST) {
  $user = isset($_POST["user"]) ? $_POST["user"] : '';
  $psswd = isset($_POST["password"]) ? $_POST["password"] : '';

  $csv = array_map('str_getcsv', file('users.csv'));
  foreach ($csv as $row) {
    if ($user == $row[0]) {
      if ($psswd == $row[1]) {
        $_SESSION["login"] = $user;
        header("Location: compromissos.php");
      }
    }
  }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Login</title>
</head>

<body style="background-color: #dedede">

  <div class="row">
    <div class="col-sm-3">
    </div>
    <div class="col-sm-6">
      <div class="card text-center">
        <div class="card-header">
          Welcome
        </div>
        <div class="card-body">
          <h5 class="card-title">Write down your appointments :)</h5>
          <p class="card-text">A page that allows facility for your reminders and ideas.</p>
          <form action="" method="POST">
            <div class="form-group">
              <label for="user">User</label> <br>
              <input value="" class="inputText" type="text" name="user" id="user" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label> <br>
              <input value="" class="inputText" type="password" name="password" id="password" required> <br><br>

              <input type="submit" value="Login" class="btn btn-outline-dark">
            </div>
          </form>
        </div>
      </div>
    </div>

</body>

<style>
  .inputText {
    border-radius: 10px;
    width: 50%;
    border: 2px solid #d2d2d2;
    outline: 0;
    color: black;
    padding: 7px 0;
    background: transparent;
    transition: 0.2s;
    font-size: 16px;
  }

  .inputText:hover {
    border-color: #092d70 ;
  }
</style>

</html>