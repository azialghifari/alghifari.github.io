<?php
include "header.php";
?>


     <?php
                $Id = $_GET['albumid'];
                $sq="SELECT * FROM album where album.albumid='$Id'";
                $re = mysqli_query($konek,$sq);
                $arr = mysqli_fetch_array($re);
?>
<div>
    <h1 class="text-center"><?= $arr['namaalbum']; ?></h1>
    <h4 class="text-center"><?= $arr['deskripsi']; ?></h4>
</div>

<div class="row mx-auto">
            <?php
                $id = $_GET['albumid'];
                $sql="SELECT * FROM album INNER JOIN foto ON album.albumid=foto.albumid where album.albumid='$id'";
                $res = mysqli_query($konek,$sql);
                while($data=mysqli_fetch_array($res)){
            ?>
            <div class="col-lg-3 col-sm-6 mt-3">
                <div class="card h-100" style="border-radius: 10px;">
                <img style="border-radius: 10px 10px 0 0;" src="gambar/<?= $data['lokasifile'];?>" class="card-img-top">
                <div class="card-body">
                    <p></p>
                    <h5 class="card-title"><?= $data['judulfoto'];?></h5>
                    <p class="card-text"><?= $data['deskripsi'];?></p>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><?= $data['tanggal'];?></small>
                </div>
                </div>
            </div>
            <?php } ?>
            </div>
    </div>
</div>






<?php
  include "footer.php";
?>