<?php
    include "koneksi.php";
    $pesan="";
if( isset($_POST["login"])){


    $username = $_POST['Username'];
    $password = md5($_POST['Password']);
    
    $result = mysqli_query($konek, "SELECT * FROM user WHERE Username = '$username' and Password = '$password'");

    //cek username
    if(mysqli_num_rows($result) > 0){

    //cek password
    $row = mysqli_fetch_assoc($result);
      
    $_SESSION["UserID"]    = $row["UserID"];
    $_SESSION["Username"]    = $row["Username"];
    $_SESSION["Password"]    = $row["Password"];
    
    header("Location: home.php");

    }else{
        mysqli_error($konek);
        // $pesan="<div class='alert alert-danger'><strong>ERORR!</strong>Username atau password anda salah</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<div class="container mt-5 w-100">
        <div class="row">
            <div class="col-12 col-sm-8 col-md-6 m-auto">
                <div class="card">
                    <div class="card-body">  
    <h1>Halaman Login</h1>
        <br>
        <?php
            echo $pesan;
            if($pesan){
                echo "<br>";
            }
        ?>
    <form action="" method="post">
    <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" name="Username" class="form-control" id="username">
    </div>
    <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" name="Password" class="form-control" id="Password">
    </div>
       
    <div class="mt-2">
    <button type="submit" name="login" class="btn btn-primary w-100">login</button>
    </div>


</form>
Anda belum punya akun? Registrasi di <a href="register.php">sini</a>
</div>
</div>
</div>
</div>
</div>
</body>
</html>