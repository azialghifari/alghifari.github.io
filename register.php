<?php
    include "koneksi.php";

    // if(isset($_POST['register'])) {
    //     if (register($_POST) > 0) {
    //         echo "
    //             <script>
    //                 alert('registrasi berhasil');
    //             </script>
    //         ";  
    //         header("location:login.php");
    //     } else {
    //         echo mysqli_error();
    //     }
    // }

    if(isset($_POST['register'])){

        $username       = $_POST['Username'];
        $password       = md5($_POST['Password']);
        $email          = $_POST['Email'];
        $namalengkap    = $_POST['NamaLengkap'];
        $alamat         = $_POST['Alamat'];

        $tambah = mysqli_query ($konek, "INSERT INTO user VALUES('', '$username', '$password', '$email', '$namalengkap', '$alamat')");

        if ($tambah){
            header("location: login.php");
        }else{
            mysqli_error($konek);
        }
    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Regestrasi</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<div class="container mt-5 w-100">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card">
                    <div class="card-body">  
    <h1>Halaman Regestrasi</h1>
    <form action="register.php" method="post">
    <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="Username" class="form-control" id="username">
    </div>
    <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" name="Password" class="form-control" id="Password">
    </div>
    <div class="mb-3">
    <label for="Email" class="form-label">Email</label>
    <input type="text" name="Email" class="form-control" id="Email">
    </div>
    <div class="mb-3">
    <label for="NamaLengkap" class="form-label">NamaLengkap</label>
    <input type="text" name="NamaLengkap" class="form-control" id="NamaLengkap">
    </div>
    <div class="mb-3">
    <label for="Alamat" class="form-label">Alamat</label>
    <input type="text" name="Alamat" class="form-control" id="Alamat">
    </div>
       
    <div class="mt-2">
    <button type="submit" name="register" class="btn btn-primary w-100">register</button>
    </div>
</form>
Anda sudah punya akun? Login di <a href="login.php">sini</a>
</div>
</div>
</div>
</div>
</div>
</body>
</html>