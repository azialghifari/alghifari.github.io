<?php
  include "header.php";
?>
<?php
if (isset($_POST['komentar'])) {

    $Id_Foto            = $_POST['fotoid'];
    $Id_User            = $_SESSION["UserID"];
    $Isi_Komentar       = $_POST["isikomentar"];
    $Tanggal_Komentar   = date("Y-m-d");

    $sql= "insert into komentarfoto values ('','$Id_Foto', '$Id_User','$Isi_Komentar','$Tanggal_Komentar')";
    $res = mysqli_query($konek,$sql) or die(mysqli_error($konek));
    
    if ($res){
        header("Location: komentar.php?fotoid=".$Id_Foto);
    }else{
        mysqli_error($konek);
    }
}
$Id_Foto2 = $_GET['fotoid'];
$sql="select * from foto where fotoid='".$Id_Foto2."'";
$hasil=mysqli_query($konek,$sql);
while ($data = mysqli_fetch_array($hasil)){
$album = $data['albumid'];
?>
<div class="row mb-5 mx-auto mt-2">
    <div class="col-lg-5">
        <div class="card" style="max-height:520px; overflow:auto;">
            <img src="gambar/<?= $data['lokasifile'];?>" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title" style=" font-size: 28px;"><?= $data['judulfoto'];?></h5>
                <p class="card-text"><?= $data['tanggalunggah'];?></p>
                <p class="card-text"><?= $data['deskripsifoto'];?></p>
    <?php }?>
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="card container" style="max-height:520px; overflow: auto;">
                    <h3 class="card-title text-center mt-3">Komentar</h3>

                    <input type="hidden" name="fotoid" value="<?=$data['fotoid'];?>">
    <?php
    $sql2= mysqli_query($konek,"select * from komentarfoto inner join user on komentarfoto.UserID = user.UserID where fotoid='$Id_Foto2'");
    $rows= mysqli_num_rows($sql2);
    if ($rows > 0) {
    while ($data2 = mysqli_fetch_array($sql2)){
    ?>  
                <div class="row bg-light mb-2 py-3 h-100" style="border-radius: 5px;">
                    <div class="col-12"><h6 class="card-title" ><?= $data2['Username'];?></h6></div>
                    <div class="col-12"><?= $data2['isikomentar'];?></div>
                    <div class="col-12"><a href="editkomentar.php?komentarid=<?php echo $data2['komentarid']; ?>">edit</a></div>
                    <div class="col-12"><a href="hapuskomentar.php?komentarid=<?= $data2['komentarid'];?>">hapus</a></div>
                </div>

    <?php }}else{?> 
                    <h2 class="text-center">Belum Ada Komentar rek</h2>
        <?php } ?>
        <form method="post">
            <div class="row">
            <input class="form-control" type="hidden" name="fotoid" value="<?= $Id_Foto2;?>">
            <div class="col-10"><input class="form-control" placeholder="Tambahkan Komentar" type="text" name="isikomentar"></div>
            <div class="col-2"><input class="btn btn-primary" value="Kirim" type="submit" name="komentar"></div>
            </div>
        </form>
        </div>
    </div>
</div>

<h4 class="text-center mt-5">Foto Lainnya</h4>
<div class="container-fluid"> 
    <div class="row mt-4 mb-5 g-2" data-masonry='{"percentPosition": true}'>
      <?php
        $sql="SELECT * FROM foto WHERE albumid='$album'";
        $res = mysqli_query($konek,$sql);  
        while($ta=mysqli_fetch_array($res)){
      ?>
        <div class="col-lg-3 col-md-6">
          <div class="card">
            <a href="home.php?fotoid=<?= $ta['fotoid'];?>">
                <img src="gambar/<?= $ta['lokasifile'];?>" class="card-img-top">
            </a>
            <div class="card-body">
              <h5 class="card-title"><?= $ta['judulfoto'];?></h5>
              <p class="card-text"><?= $ta['deskripsifoto'];?></p>
            </div>
            <div class="card-footer">
              <small class="text-muted"><?= $ta['tanggalunggah'];?></small>
            </div>
          </div>
        </div>
      <?php }?>
    </div>
  </div>

  <?php
  include "footer.php";
?>