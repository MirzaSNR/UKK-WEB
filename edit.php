<?php
// Load file koneksi.php
include "koneksi.php";
// Ambil data ID yang dikirim oleh form_ubah.php melalui URL
$id = $_GET['id'];
// Ambil Data yang Dikirim dari Form
$nis = $_POST['nis'];
$nama = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$jurusan = $_POST['jurusan'];
// Ambil data foto yang dipilih dari form
$foto = $_FILES['foto']['name'];
$tmp = $_FILES['foto']['tmp_name'];

if(empty($foto)){ 
  $sql = $pdo->prepare("UPDATE siswa SET nis=:nis, nama=:nama, jenis_kelamin=:jk, jurusan=:jurusan WHERE id=:id");
  $sql->bindParam(':nis', $nis);
  $sql->bindParam(':nama', $nama);
  $sql->bindParam(':jk', $jenis_kelamin);
  $sql->bindParam(':jurusan', $jurusan);
  $sql->bindParam(':id', $id);
  $execute = $sql->execute(); // Eksekusi / Jalankan query
  if($sql){ 
    // Jika Sukses, Lakukan :
    header("location: index.php"); // Redirect ke halaman index.php
  }else{
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='form_edit.php'>Kembali Ke Form</a>";
  }
}else{
  $fotobaru = date('dmYHis').$foto;
  $path = "images/".$fotobaru;
  // Proses upload
  if(move_uploaded_file($tmp, $path)){ 
  
    $sql = $pdo->prepare("SELECT foto FROM siswa WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute(); // Eksekusi query insert
    $data = $sql->fetch(); 
    if(is_file("images/".$data['foto'])) 
      unlink("images/".$data['foto']);
   
    $sql = $pdo->prepare("UPDATE siswa SET nis=:nis, nama=:nama, jenis_kelamin=:jk, jurusan=:jurusan, foto=:foto WHERE id=:id");
    $sql->bindParam(':nis', $nis);
    $sql->bindParam(':nama', $nama);
    $sql->bindParam(':jk', $jenis_kelamin);
    $sql->bindParam(':jurusan', $jurusan);
    $sql->bindParam(':foto', $fotobaru);
    $sql->bindParam(':id', $id);
    $execute = $sql->execute(); 
    if($sql){ 
      header("location: index.php"); 
    }else{

      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='form_edit.php'>Kembali Ke Form</a>";
    }
  }else{

    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_edit.php'>Kembali Ke Form</a>";
  }
}
?>