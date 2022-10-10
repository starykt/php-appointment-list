<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Appointments</title>
</head>

<body style="background-color: #dedede">

  <div class="row">
    <div class="col-sm-1">
    </div>
    <div class="col-sm-10">
      <div class="card text-center">
        <div class="card-header">
        </div>
        <div class="card-body">
          <h5 class="card-title">Write down your appointments :)</h5>
          <p class="card-text">A page that allows facility for your reminders and ideas.</p>
          <a href="novo-compromisso.php" class="btn btn-outline-dark">New item</a>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Data and Time</th>
                <th scope="col">Appointments</th>
                <th scope="col">Place</th>
                <td scope="col"></td>
              </tr>
            </thead>
            <tbody>

              <?php

              $arquivo = file_get_contents("compromissos.json");
              $array = json_decode($arquivo);

              foreach ($array as $row) {
                if ($row->login == $_SESSION["login"]) {
              ?>
                  <tr>
                    <td><?=date("d/m/Y H:m:s", strtotime($row->datetime))?></td>
                    <td><?= $row->name ?></td>
                    <td><?= $row->place ?></td>
                    <td>
                      <a href="deletar-compromisso.php?name=<?= $row->name ?>&place=<?= $row->place ?>&datetime=<?= $row->datetime ?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
              <?php
                }
              }
              ?>


            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-sm-1"> <br>
      <a class="btn btn-outline-dark" href="sair.php">Sair</a>
    </div>

  </div>

</body>

<style>
  input {
    border-radius: 10px;
    width: 50%;
    border: 0;
    border-bottom: 2px solid #d2d2d2;
    outline: 0;
    font-size: 1.3rem;
    color: black;
    padding: 7px 0;
    background: transparent;
    transition: 0.2s;
  }
</style>

</html>