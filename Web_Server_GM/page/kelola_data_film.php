<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
                        <div class="w-50 mx-auto border p-3 mt-5 mb-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Kelola Data Film</h1>
                            </div>
                            <form action="proses.php" method ="post" enctype="multipart/form-data">                           
                            <label for="Judul" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="text" id="judul" name="judul">                            
                            </div>

                            <label for="Judul" class="col-sm-2 col-form-label">Sutradara</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="text" id="sutradara" name="sutradara">                            
                            </div>

                            <label for="Judul" class="col-sm-2 col-form-label">Durasi</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="text" id="Durasi" name="durasi">                            
                            </div>

                            <label for="Judul" class="col-sm-2 col-form-label">Genre</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="text" id="genre" name="genre">                            
                            </div>

                            <label for="Judul" class="col-sm-2 col-form-label">Sinopsis</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="text" id="sinopsis" name="sinopsis">                            
                            </div>

                            <label for="Judul" class="col-sm-2 col-form-label">Aktor</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="text" id="aktor" name="aktor">                            
                            </div>

                            <label for="Judul" class="col-sm-2 col-form-label">Poster</label>
                            <div class="col-sm-10">
                            <input class="form-control" type="file" id="formFile" name="poster">
                            </div>
                            
                            <div class="col-sm-10 mb-3">
                                <?php
                                if (isset($_GET['edit'])) {
                                    echo "<button type='submit' class='btn btn-primary mb-3 mt-3 p-2' name='btnProses' value='edit'>Simpan Perubahan</button>";
                                } else {
                                    echo "<button type='submit' class='btn btn-primary mb-3 mt-3 p-2' name='btnProses' value='tambah'>Tambah Data</button>";
                                }                               
                                ?>
                           
</div>
                            </form>
                </div>
</div>
</div>
</div>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
