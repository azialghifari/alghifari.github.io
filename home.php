<?php
  include "header.php";
?>
    <div class="row mx-auto mt-4">
    <?php
    $username = $_SESSION['Username'];
      $sql="SELECT * FROM album INNER JOIN foto ON album.albumid=foto.albumid";
      $res = mysqli_query($konek,$sql);  
      while($data=mysqli_fetch_array($res)){
    ?>
      <div class="col-lg-3 col-md-6 m -auto">
        <div class="card">
          <img src="gambar/<?= $data['lokasifile'];?>" class="card-img-top">
          <div class="card-body">
            <h5 class="card-title"><?= $data['judulfoto'];?></h5>
            <p class="card-text"><?= $data['deskripsifoto'];?></p>
          </div>
          <?php
            $Id = $data['fotoid'];
            $sql1 = mysqli_query($konek, "select * from likefoto where fotoid = '$Id'");
            $dd = mysqli_num_rows($sql1);
          ?>
          <p class="mx-auto">
            <a class="btn btn-light border" href="likefoto.php?fotoid=<?php echo $data['fotoid']; ?>" style="width:145px;">Like <?php if($dd>0){echo $dd;}?></a>
            <a href="komentar.php?fotoid=<?php echo $data['fotoid']; ?>" class="btn btn-light border" style="width:120px;">Komentar</a>
          </p>
          <div class="card-footer">
            <small class="text-muted"><?= $data['tanggalunggah'];?></small>
          </div>
        </div>
      </div>
    <?php }?>
    </div>

<?php
  include "footer.php";
?>