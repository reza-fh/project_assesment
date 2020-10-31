<?php

include "inc/connection.php";
include "inc/function.php";

  $siswa=$db->query("SELECT * FROM robotic WHERE id=".$_GET['id']);
  $siswa->execute();
  $data=$siswa->fetchAll();

  if (isset($_GET['edit'])) {
    edit($_GET);
    header("Location: indexs.php");
  }

?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/png" href="img/favicon/robot.png"/>
  <title>EDIT</title>
</head>
<body>

  <?php include "header.php"; ?>
 
  <div class="container" style="margin-top: 90px; margin-bottom: 70px;">
    <div class="row">
        <div class="col-5">
            <form action="indexs.php" method="GET">
                <input type="hidden" name="id" value="<?php echo $data[0]["id"]; ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nama</label>
                <input type="text" name="nama" value="<?php echo $data[0]["nama"]; ?>" class="form-control"  aria-describedby="emailHelp" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">jurusan</label>
                <input type="text" name="jurusan" value="<?php echo $data[0]["jurusan"]; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">email</label>
                <input type="email" name="email" value="<?php echo $data[0]["email"]; ?>" class="form-control" required>
            </div>
            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
            </form>
        </div>
        <div class="col-7">
              <img src="img/bg.png" alt="bg">
        </div>
    </div>
</div>

<?php include "footer.php"; ?>
  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script>
  var myVar = setInterval(myTimer, 1000);
  function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
  }
</script>  
</body>
</html>