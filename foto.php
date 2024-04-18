<?php
include "header.php";
?>

    
<a href="tambahfoto.php" type="submit" class="btn btn-primary">Tambah</a>

<div class="row mx-auto">
            <?php
                $Id = $_SESSION['UserID'];
                $sql="SELECT * FROM foto WHERE UserID='$Id'";
                $res = mysqli_query($konek,$sql);
                while($data=mysqli_fetch_array($res)){
            ?>
            <div class="col-lg-3 col-md-6 mt-3">
                <div class="card">
                <img src="gambar/<?= $data['lokasifile'];?>" class="card-img-top pan h-100">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['judulfoto'];?></h5>
                    <p class="card-text"><?= $data['deskripsifoto'];?></p>
                </div>
                <p class="mx-auto">
                    <a class="btn btn-light border" href="editfoto.php?fotoid=<?php echo $data['fotoid']; ?>" style="width:145px;">Edit</a>
                    <a onclick="return confirm('Anda Yakin? Data Akan Di Hapus?')" href="hapusfoto.php?fotoid=<?php echo $data['fotoid']; ?>" class="btn btn-light border" style="width:145px;">Hapus</a>
                </p>
                <div class="card-footer">
                    <small class="text-muted"><?= $data['tanggalunggah'];?></small>
                </div>
                </div>
            </div>
            <?php } ?>
            </div>




<?php
  include "footer.php";
?>