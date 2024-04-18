<?php
    // include "koneksi.php";

    // $id = $_GET['fotoid'];
    // $User = $_SESSION['UserID'];
    // $tanggallike = date("Y-m-d");

    // $sql = mysqli_query($konek, "select * from likefoto where fotoid='$id' and UserID='$User'");
    
    // if (mysqli_num_rows($sql) == 1) {
    //     header("location: home.php");
    // }else{
    //     $sql = mysqli_query($konek, "insert into likefoto values ('','$id','$User','$tanggallike')");
    //     header("location:home.php");
    // }
    ?>

<?php
include "koneksi.php";

$fotoId = $_GET["fotoid"];
$userId = $_SESSION["UserID"];
// dd($userId);

$query = "SELECT * FROM likefoto WHERE fotoid = '$fotoId' AND UserID = '$userId'";
$result = mysqli_query($konek, $query);

$row = mysqli_fetch_assoc($result);
$likeId = $row["likeid"];
// dd($likeId);

if (empty($row) === false) {

    $query = "DELETE FROM likefoto WHERE likeid = '$likeId'";
    mysqli_query($konek, $query);
    // dd($query);
    mysqli_affected_rows($konek);

} else {

    $tanggal = date('Y-m-d');
    $query = "INSERT INTO likefoto VALUES (NULL, '$fotoId', '$userId' , '$tanggal')";
    // dd($query);
    mysqli_query($konek, $query);

    mysqli_affected_rows($konek);

}

header("Location: home.php");