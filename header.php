<?php
    include "koneksi.php";
    if (!$_SESSION["UserID"])
{
    header("location: login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">

</head>
<body>

<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand active fw-semibold" href="home.php"><img style="width: 50px" class="px-2" src="gambar/lagu.jpg">Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-auto">
      <li class="nav-item">
        <a href="home.php" class="nav-link active">Home</a>
    </li>
    <li class="nav-item">
        </li>
        <a href="album.php" class="nav-link active">Album</a>
    <li class="nav-item">
        <a href="foto.php" class="nav-link active">Foto</a>
    </li>
    <li class="nav-item">
        <p class="nav-link active" ></p>
    </li>
      </ul>
      <span class="navbar">
            <a href="logout.php" class="text-danger"><i class="fa-solid fa-lock-open"></i>Logout</a>
      </span>
    </div>
  </div>
</nav>
<!-- <&nbsp;> -->
<!-- <"navbar-nav me-auto mb-2 mb-lg-0 mx-auto"> -->