<?php 
function query($query) {
  global $koneksi;
  $result = mysqli_query($koneksi, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function tambah($data) {
  global $koneksi;

  $nama_mahasiswa = htmlspecialchars($data["nama_mahasiswa"]);
  $nim_mahasiswa = htmlspecialchars($data["nim_mahasiswa"]);
  $jurusan_mahasiswa = htmlspecialchars($data["jurusan_mahasiswa"]);
  $alamat_mahasiswa = htmlspecialchars($data["alamat_mahasiswa"]);
  
  $query = "INSERT INTO mahasiswa VALUES
          ('', '$nama_mahasiswa', '$nim_mahasiswa', '$jurusan_mahasiswa', '$alamat_mahasiswa')
            ";
  mysqli_query($koneksi, $query);
  return mysqli_affected_rows($koneksi);
}

function ubah($data) {
  global $koneksi;

  $id = $data["id"];

  $nama_mahasiswa = htmlspecialchars($data["nama_mahasiswa"]);
  $nim_mahasiswa = htmlspecialchars($data["nim_mahasiswa"]);
  $jurusan_mahasiswa = htmlspecialchars($data["jurusan_mahasiswa"]);
  $alamat_mahasiswa = htmlspecialchars($data["alamat_mahasiswa"]);

  $query = "UPDATE mahasiswa SET
                    nama_mahasiswa = '$nama_mahasiswa',
                    nim_mahasiswa = '$nim_mahasiswa',
                    jurusan_mahasiswa = '$jurusan_mahasiswa',
                    alamat_mahasiswa = '$alamat_mahasiswa'
                    WHERE id = $id
            ";
            mysqli_query($koneksi, $query);
            return mysqli_affected_rows($koneksi);
}

function hapus($id) {
  global $koneksi;
  mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = $id");
  return mysqli_affected_rows($koneksi);
}


?>