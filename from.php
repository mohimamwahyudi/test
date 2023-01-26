<?php 
    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "test";

    $conn = new mysqli($server, $user, $pass, $db);
    if (@$_POST):
      $nama=$_POST['firstname'];
      $belakang=$_POST['lastname'];

      if (empty($nama) || empty($belakang)) {
          echo '<div class="alert alert-danger mt-2" role="alert">Silahkan lengkapi form yang disediakan!</div>';
      }
      else {
          $conn->query("INSERT INTO persons VALUES(null, '$nama', '$belakang')");
          
          
      }
     endif;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>tetst</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
  </div>
</nav> 
<form class="my-2" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">first Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="text" name="firstname">

  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">lastname</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="lastname">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
    </tr>
  </thead>
  <tbody>
    <tr>
       <?php

                    $result = $conn->query("SELECT * FROM persons") or die($conn->error);

                    if ($result->num_rows > 0) {       

                    while($row = $result->fetch_assoc()) 

                    {

                ?>

                    <tr>
                        <td><?= $row['Personid'] ?></td>

                        <td>Rp.<?= $row['LastName'] ?></td>

                        <td><?= $row['FirstName']  ?> </td>

                    </tr>
                    <?php } 
                    }
                    ?>
    </tr>

  </tbody>
</table>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>