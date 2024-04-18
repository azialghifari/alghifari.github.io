<?php
  include "header.php";
?>

    <div class="container-sm pt-4">
    <div class="card mb-4">
          <div class="card-header py-3">
            <!-- Tombol tambah album -->
            <a href="tambahalbum.php" type="submit" class="btn btn-primary">Tambah</a>
          </div>
            <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered" id="tabel_album" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama</th>
                          <th>Deskripsi</th>
                          <th>Tanggal</th>
                          <th width="15%">Aksi</th>
                        </tr>
                        <?php
                            $id_user    =$_SESSION["UserID"]; 
                           $sql = mysqli_query ($konek, "SELECT * FROM album where UserID ='$id_user' ");
                           $no=0;
                           while($data = mysqli_fetch_array($sql)){ 
                            $no++;?>
                           
                        <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $data ['namaalbum'];?></td>
                          <td><?php echo $data ['deskripsi'];?></td>
                          <td><?php echo $data ['tanggal'];?></td>
                          <td>
                          <a class="btn btn-warning" href="editalbum.php?albumid=<?= $data['albumid']?>"><i class="fa-solid fa fa-pencil"></i></a>
                          <a class="btn btn-danger" href="hapusalbum.php?albumid=<?= $data ['albumid'] ?>"><i class="fa-solid fa fa-trash"></i></a>
                          <a href="fotoalbum.php?albumid=<?php echo $data['albumid']; ?>" class="btn btn-light border" style="width:97px;">lihat</a>
                          </td>
                        </tr>
                        <?php } ?>
                       
                          
                      </thead>
                      <tbody>
                         
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php
  include "footer.php";
?>