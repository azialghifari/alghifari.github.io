<?php
    include "header.php";
?>

<?php
if (isset($_POST['edit'])) {

    $Id_Komentar        = $_POST['komentarid'];
    $Isi_Komentar       = $_POST["isikomentar"];
    $Tanggal_Komentar   = date("Y-m-d");

    $sql= "update komentarfoto set isikomentar='$Isi_Komentar',tanggalkomentar='$Tanggal_Komentar' where komentarid='$Id_Komentar'";
    $res = mysqli_query($konek,$sql) or die(mysqli_error($konek));
    
    if ($res){
        $sql2 = mysqli_query($konek, "select * from komentarfoto where komentarid='$Id_Komentar'");
        $row = mysqli_fetch_array($sql2);
        header("Location: home.php?page=komentar&fotoid=".$row["fotoid"]);
    }else{
        mysqli_error($konek);
    }
}
?>

<div class="card mx-auto mt-5 col-lg-4 col-md-10">
    <div class="card-body">
        <form method="post" style="width: 100%;">
            <h2 align="center">Edit Komentar</h2>
            <?php
            $Id_Komentar2 = $_GET['komentarid'];
            $sql="select * from komentarfoto where komentarid='$Id_Komentar2'";
            $hasil=mysqli_query($konek,$sql);
            while ($data = mysqli_fetch_array($hasil)):
            ?>
            <div class="mb-3">
                <input type="hidden" class="form-control" name="komentarid" value="<?php echo $data['komentarid']?>" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Isi Komentar</label>
                <input type="text" class="form-control" name="isikomentar" value="<?php echo $data['isikomentar']?>" required>
            </div>
            <div class="mb-3">
                <input type="submit" name="edit" class="btn btn-primary" value="ubah">
                <a class="btn btn-danger" href="home.php?page=album">Cancel</a>
            </div>
            <?php endwhile; ?>
        </form>
    </div>
</div>

<?php
    include "footer.php";
?>