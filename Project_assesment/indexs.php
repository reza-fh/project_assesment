<?php
include "inc/connection.php";
include "inc/function.php";

if(isset($_GET['yono'])) {
   inputData($_GET);
   header('location: indexs.php');
}

if(isset($_GET['delete'])){
   deleteData($_GET);
   header('location: indexs.php');
}

if (isset($_GET['edit'])) {
  edit($_GET);
  header("Location: indexs.php");
}

$tampung=[];
if(isset($_POST['cari'])){
    $tampung=searching($_POST['search']);
    if(!empty($tampung)){
        $data=$tampung;
    }else{
      $msg=$_POST['search']." Tidak Ditemukan!!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="shortcut icon" type="image/png" href="img/favicon/robot.png"/>
  <title>Extra Robotic</title>
</head>
<body>
        <!-- header -->
 <?php require "header.php"; ?>

<div class="container-fluid mb-2" style="margin-top: 20px;">
  <div class="row">
    <div class="col">
      <div>
        <img class="w-100" src="img/robot2.jpg" alt="gambar">
      </div>
    </div>
  </div>
</div>
<div class="container">
  <?php if(isset($msg)) : ?>
  <div class="alert alert-primary" role="alert">
     <?php echo $msg; ?>
  </div>
  <?php endif; ?>
</div>
<div class="container bg-dark">
  <div class="row">
    <div class="col-8 d-flex flex-column">
        <h1 class="d-flex mx-auto text-white">Daftar Ekstra Robotic</h1>
    </div>
    <form action="indexs.php" class="form-inline" method="POST">
         <a type="button" class="btn btn-primary mr-2" style="color: white;" data-target="#exampleModal" data-toggle="modal">+ Data Extra</a>
          <div class="md-form my-0">
              <input name="search" class="form-control mr-sm-2" type="search" placeholder="Cari data" aria-label="Search" autocomplete="off">
              <button name="cari" type="submit" class="btn btn-outline-primary"><i style="color:white;" class="fas fa-search"></i></button>
          </div>
      </form>
      <table class="table table-dark">
        <div class="mt-4">
          <thead>
            <tr>  
              <!-- <th scope="col">No</th> -->
              <th scope="col">Nama</th>
              <th scope="col">Jurusan</th>
              <th scope="col">Email</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $key) : ?>
            <tr>
              <td><?php echo $key["nama"]; ?></td>
              <td><?php echo $key["jurusan"]; ?></td>
              <td><?php echo $key["email"]; ?></td>
              <td>
                <a class="btn btn-outline-light"  onclick="return confirm('Apakah Kamu Ingin Menghapus Data?')" href="indexs.php?delete=&id=<?php echo $key["id"]; ?>">hapus</a>
                <a class="btn btn-outline-light" href="edit.php?=&id=<?php echo $key["id"]; ?>">edit</a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

  <!-- footer -->
  <?php require "footer.php" ?>
  <!-- POPUP Tambah Data -->

 <div class="modal fade" id="exampleModal"  data-backdrop="static" data-keyboard="false" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <form action="indexs.php" method="GET">
          <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" name="nama"  class="form-control" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Jurusan</label>
            <input type="text" name="jurusan"  class="form-control" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Email address</label>
            <input type="email"  name="email" class="form-control" autocomplete="off" placeholder="Nama@gmail.com">
          </div>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">batal</button>
          <button type="submit" name="yono" class="btn btn-primary">Tambah</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <!-- Optional JavaScript; choose one of the two! -->
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script>
    if ($(window).width() > 992) {
      $(window).scroll(function(){  
        if ($(this).scrollTop() > 40) {
            $('#navbar_top').addClass("fixed-top");
            $('body').css('padding-top', $('.navbar').outerHeight() + 'px');
          }else{
            $('#navbar_top').removeClass("fixed-top");
            $('body').css('padding-top', '0');
          }   
      });
    }
    $(document).ready(function(){
  var docEl = $(document),
      headerEl = $('header'),
      headerWrapEl = $('.wrapHead'),
      navEl = $('nav'),
      linkScroll = $('.scroll');
  
  docEl.on('scroll', function(){
    if ( docEl.scrollTop() > 60 ){
      headerEl.addClass('fixed-to-top');
      headerWrapEl.addClass('fixed-to-top');
      navEl.addClass('fixed-to-top');
    }
    else {
      headerEl.removeClass('fixed-to-top');
      headerWrapEl.removeClass('fixed-to-top');
      navEl.removeClass('fixed-to-top');
    }
  });
  
  linkScroll.click(function(e){
      e.preventDefault();
      $('body, html').animate({
         scrollTop: $(this.hash).offset().top
      }, 500);
   });
 });

var myVar = setInterval(myTimer, 1000);
function myTimer() {
  var d = new Date();
  document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
  </script>
</body>
</html>

