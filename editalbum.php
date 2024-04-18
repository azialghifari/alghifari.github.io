<?php include "header.php"; ?>

<?php
$id = $_GET['albumid'];
$sqledit = mysqli_query($konek, "SELECT * FROM album WHERE albumid='$id'");
$e = mysqli_fetch_array($sqledit);
?>

<form method="post" action="">
    <div class="container-sm pt-3">
    <h3>Edit Data Album</h3>

    <input type="hidden" name="albumid" class="form-control" value="<?= $e['albumid']; ?>">
    <div class="mb-3">
        <label for="namaalbum" class="form-label">Nama Album</label>
        <input type="text" name="namaalbum" class="form-control" id="namaalbum" value="<?= $e['namaalbum']; ?>">
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <input name="deskripsi" type="text" class="form-control" id="deskripsi" value="<?= $e['deskripsi']; ?>">
    </div>
    <div class="mb-3">
        <label  class="form-label">Tanggal</label>
        <input name="tanggal" type="text" class="form-control" value="<?= $e['tanggal']; ?>">
    </div>
    <button type="submit" class="btn btn-warning" name="edit">Konfirmasi</button>
</div>
</form>


<?php
if(isset($_POST['edit'])){
    //variabel dari elemen form
    $albumid       = $_POST['albumid'];
    $namaalbum     = $_POST['namaalbum'];
    $deskripsi     = $_POST['deskripsi'];
    $tanggal       = date('y-m-d');

    
    //proses edit album
        $edit = mysqli_query($konek, "UPDATE album SET namaalbum = '$namaalbum', deskripsi = '$deskripsi', tanggal = '$tanggal' WHERE albumid='$albumid'");

        if(!$edit){
            echo "edit data gagal!!";
        }else{
            header('location: album.php');
        }
    }
      



?>

<?php include "footer.php"; ?>