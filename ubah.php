<?php 

require_once "koneksi.php";
require_once "functions.php";

$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];

if (isset($_POST["submit"] ) ) {

	// alert untuk penanda apakah data berhasil di tambah
	if (ubah($_POST) > 0 ) {
		echo "<script>
				alert('data sukses diperbarui!');
				document.location.href = 'index.php?page=1';
				</script>
				";
	} else {
		echo "<script>
				alert('data gagal diperbarui!');
				document.location.href = 'index.php?page=1';
				</script>
				";
	}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Ubah Data Mahasiswa</title>
  </head>
  <body>
    
    <div class="container">
      <div class="jumbotron">
      <h4>Ubah Data Mahasiswa</h4>

      <form action="" method="POST">
      <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">

        <ul>
          <li>
            <label for="nama_mahasiswa">Nama Mahasiswa : </label>
            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="<?= $mhs["nama_mahasiswa"]; ?>">
          </li> <br>
          <li>
            <label for="nim_mahasiswa">NIM : </label>
            <input type="text" name="nim_mahasiswa" id="nim_mahasiswa" value="<?= $mhs["nim_mahasiswa"]; ?>">
          </li> <br>
          <li>
            <label for="jurusan_mahasiswa">Jurusan : </label>
            <input type="text" name="jurusan_mahasiswa" id="jurusan_mahasiswa" value="<?= $mhs["jurusan_mahasiswa"]; ?>">
          </li> <br>
          <li>
            <label for="alamat_mahasiswa">Alamat : </label>
            <input type="text" name="alamat_mahasiswa" id="alamat_mahasiswa" value="<?= $mhs["alamat_mahasiswa"]; ?>">
          </li> <br>
          <li>
            <button type="submit" name="submit">Simpan Perubahan</button>
          </li>
        </ul>

      </form>
      </div>
    </div>

    


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
