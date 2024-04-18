<?php
include "header.php";
?>

<?php
if (isset($_POST['Tambah'])) {

    $judulfoto       = $_POST["judulfoto"];
    $deskripsifoto   = $_POST["deskripsifoto"];
    $albumid         = $_POST['albumid'];
    $tanggalunggah    = date("Y-m-d");
    $UserID          = $_SESSION["UserID"];


    $ekstensi =  array('png','jpg','jpeg','gif');
    $filename = $_FILES['lokasifile']['name'];
    $ukuran = $_FILES['lokasifile']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
    if(!in_array($ext,$ekstensi) ) {
        header("location: foto.php");
    }else{
        if($ukuran < 1044070){		
            $xx = $filename;
            move_uploaded_file($_FILES['lokasifile']['tmp_name'], 'gambar/'.$filename);
            mysqli_query($konek, "INSERT INTO foto VALUES('','$judulfoto','$deskripsifoto','$tanggalunggah','$xx','$albumid','$UserID')");
            header("location: foto.php");
        }else{
            header("location: home.php");
        }
    }
}
?>

<div class="card" style="width: 35%; margin-top:150px; margin-left:450px;">
    <div class="card-body">
        <form method="post" enctype="multipart/form-data">
            <h2 align="center">Tambah Foto</h2>
            <br>
            <div class="mb-3">
                <label class="form-label">Judul Foto</label>
                <input type="text" class="form-control" name="judulfoto" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <input type="text" class="form-control" name="deskripsifoto" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" class="form-control" name="lokasifile" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Album</label>
                <select name="albumid" class="form-control">
                    <option>pilih</option>
                <?php
                    $id = $_SESSION["UserID"];
                    $sql = mysqli_query($konek,"select * from album where UserID='$id'");
                    while($data = mysqli_fetch_array($sql)){
                ?>
                    <option value="<?=$data['albumid'];?>"><?= $data['namaalbum'];?></option>
                    
                <?php }  ?>
              
                </select>
            </div>
            <div class="mb-3">
                <input type="submit" name="Tambah" class="btn btn-primary" value="Tambah">
                <a class="btn btn-danger" href="foto.php?page=foto">Cancel</a>
            </div>
        </form>
    </div>
</div>


<?php
  include "footer.php";
?>