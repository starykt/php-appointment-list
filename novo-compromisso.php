<?php
session_start();

if (!isset($_SESSION["login"])) {
  header("Location: index.php");
}

if ($_POST) {
  $name = isset($_POST["name"]) ? $_POST["name"] : "";
  $place = isset($_POST["place"]) ? $_POST["place"] : "";
  $datetime = isset($_POST["dttime"]) ? $_POST["dttime"] : "";

  $arquivo = file_get_contents("compromissos.json");
  $array = json_decode($arquivo);

  array_push($array, array(
    "login" => $_SESSION["login"],
    "name" => $name,
    "place" => $place,
    "datetime" => $datetime,
  ));

  $file = fopen("compromissos.json", "w");
  $msg = fwrite($file, json_encode($array)) ? "Saved successfully." : "Error saving. ";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>New Item</title>
</head>

<body style="background-color: #dedede">

  <div class="row">
    <div class="col-sm-1"> <br>
      <div style="text-align: right">
        <a class="btn btn-outline-dark" href="compromissos.php">Voltar</a>
      </div>
    </div>
    <div class="col-sm-10">
      <div class="card text-center">
        <div class="card-header">
        </div>
        <div class="card-body">
          <h5 class="card-title">Write down your appointments :)</h5>
          <form action="" method="POST">
            <div class="form-group">
              <label for="name">Name</label> <br>
              <input value="" class="" type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
              <label for="place">Place</label> <br>
              <input value="" class="" type="text" name="place" id="place" required> <br><br>
            </div>
            <div class="form-group">
              <label for="dttime">Date and Time</label> <br>
              <input value="" class="" type="datetime-local" name="dttime" id="dttime" required> <br><br>
            </div>

            <input type="submit" value="Save" class="btn btn-outline-dark">
        </div>
        </form>

        <?php
        if (isset($msg)) {
          echo $msg;
        }
        ?>

      </div>
    </div>
    
    <div class="col-sm-1"> <br>
    <a class="btn btn-outline-dark" href="sair.php">Sair</a>
    </div>
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