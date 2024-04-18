<?php
  include "header.php";


//   var_dump($_SESSION['UserID']);
//   die;

// var_dump($sesi);
// die;
?>

<?php
    
    if(isset($_POST['tambah'])){

            $namaalbum      =$_POST['namaalbum'];
            $deskripsi      =$_POST['deskripsi'];
            $tanggal        = date('y-m-d');
            $sesi           = $_SESSION["UserID"];

            $tambah = mysqli_query($konek,"INSERT INTO album VALUES ('', '$namaalbum', '$deskripsi', '$tanggal', '$sesi')");

            if ($tambah){
                header("location: album.php");
            }else{
                mysqli_error($konek);
            }
        }
    
?>


<form method="post" action="">
    <div class="container-sm pt-3 ">
    <h3>Tambah Data Album</h3>
    <div class="mb-3">
        <label for="namaalbum" class="form-label">Nama Album</label>
        <input type="text" name="namaalbum" class="form-control" id="namaalbum">
        <div id="namaalbum" class="form-text">Silahkan input nama album</div>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <input name="deskripsi" type="text" class="form-control" id="deskripsi">
    </div>
    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
</div>
</form>


<?php
  include "footer.php";
?>