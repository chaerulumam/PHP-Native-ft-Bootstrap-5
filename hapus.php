<?php 

require_once "koneksi.php";
require_once "functions.php";

$id = $_GET["id"];

if (hapus ($id) > 0 ) {
  echo "<script>
          alert('data berhasil di hapus!');
          document.location.href = 'index.php?page=1';
        </script>";
} else {
  echo "<script>
          alert('data gagal di hapus!');
          document.location.href = 'index.php?page=1';
        </script>";
}

?>