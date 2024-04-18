<?php
    include "koneksi.php";

    $Id_Komentar = $_GET['komentarid'];

    $sql1 = mysqli_query($konek, "select * from komentarfoto where komentarid='$Id_Komentar'");
    
    $sql = mysqli_query($konek, "DELETE FROM komentarfoto WHERE komentarid='$Id_Komentar'");

    $data = mysqli_fetch_array($sql1);
    
    if($sql){
        header("Location: home.php?page=komentar&fotoid=".$data["fotoid"]);
    }else{
        mysqli_error($konek);
    }
?>