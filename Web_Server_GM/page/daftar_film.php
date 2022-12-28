<!-- Begin Page Content -->
<?php
   include "php/config.php";
   ?>
<!-- DataTales -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Daftar film</h6>
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>No</th>
                  <th>Id.Film</th>
                  <th>Judul Film</th>
                  <th>Sutradara</th>
                  <th>Durasi</th>
                  <th>Genre</th>
                  <th>Sinopsis</th>
                  <th>Aktor</th>
                  <th>Poster</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <?php
               $query="SELECT * FROM film";
               $sql=mysqli_query($conn,$query);
               $no=1;
               while($data=mysqli_fetch_array($sql)){
               ?>
            <tbody>
               <tr>
                  <th scope="row"><?php echo $no;?></th>
                  <td><?php echo $data['Id_film'];?></td>
                  <td><?php echo $data['Judul'];?></td>
                  <td><?php echo $data['Sutradara'];?></td>
                  <td><?php echo $data['Durasi'];?></td>
                  <td><?php echo $data['Genre'];?></td>
                  <td><?php echo $data['Sinopsis'];?></td>
                  <td><?php echo $data['Aktor'];?></td>
                  <td><img src="img/<?php echo $data['Poster'];?>" alt="img" style="width:100px;"></td>
                  <td><a href="page/kelola_data_film.php?edit=<?php echo $data['Id_film']; ?>">
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" value='edit' class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                     </svg></a>
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                     </svg>
                  </td>
               </tr>
               <?php
                  $no++;
                  ?>
               <?php
                  }
                  ?>
            </tbody>
         </table>
         <a href="page/kelola_data_film.php?tambah" Stype="button" class="btn btn-outline-primary mb-3 mt-3" name="btnTambah">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
               <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
            </svg>
            Tambah
                </a>
      </div>
   </div>
</div>
</div>
</div>
<!-- End of Main Content -->