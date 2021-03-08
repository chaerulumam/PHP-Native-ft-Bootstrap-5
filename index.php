<?php 
require_once "koneksi.php";
require_once "functions.php";

// pagination

// konfigurasi
$pagination = 4;
$total = count(query("SELECT * FROM mahasiswa"));
$totalPage = ceil($total / $pagination);
$active = ( isset($_GET["page"])) ? $_GET["page"] : 0;
$awalData = ($pagination * $active) - $pagination;


$mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $pagination");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Data Mahasiswa</title>
  </head>
  <body>

    <!-- Table Mahasiswa -->
    <div class="container">
      <div class="jumbotron">
      <h3>Data Mahasiswa</h3>
    
        <div class="row mb-3">
        <div class="col-lg-6">
        <a href="tambah.php">Tambah Data Baru</a>
        </div>
      </div>
      <table class="table table-dark table-hover table-bordered">
        <thead class="table-info text-center">
          <tr>
            <th scope="col">No</th>
            <th scope="col">Action</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Alamat</th>
          </tr>
        </thead>
        <tbody>
        <?php $i = $awalData + 1; ?>
        <?php foreach ($mahasiswa as $mhs ) : ?>
          <tr>
            <td><?= $i; ?></td>
            <td class="text-center"><a href="ubah.php?id=<?= $mhs["id"]; ?>">Ubah</a> | 
                <a href="hapus.php?id=<?= $mhs["id"]; ?>">Hapus</a></td>
            <td><?= $mhs["nama_mahasiswa"]; ?></td>
            <td class="text-center"><?= $mhs["nim_mahasiswa"]; ?></td>
            <td class="text-center"><?= $mhs["jurusan_mahasiswa"]; ?></td>
            <td><?= $mhs["alamat_mahasiswa"]; ?></td>
          </tr>
        </tbody>
          <?php $i++; ?>
          <?php endforeach; ?>
      </table>
      
      </div>
    <!-- navigasi -->
    <?php if( $active > 1 ) : ?>
        <a href="?page=<?= $active - 1; ?>">&laquo;</a>
    <?php endif; ?>

    <?php for( $i = 1; $i <= $totalPage; $i++) : ?>
      
      <?php if ( $i == $active) : ?>
          <a href="?page=<?= $i; ?>" style="font-weight: bold; color:brown;"><?= $i; ?></a>
      <?php else : ?>
          <a href="?page=<?= $i; ?>"><?= $i; ?></a> 
      <?php endif; ?>

    <?php endfor; ?>

    <?php if( $active < $totalPage ) : ?>
        <a href="?page=<?= $active + 1; ?>">&raquo;</a>
    <?php endif; ?>

    <!-- akhir navigasi -->
    </div>
    <!-- AKhir Table Mahasiswa -->



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->

    
  </body>
</html>