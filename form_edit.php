<html>
<head>
  <title>UJIKOM</title>
</head>
<body>
<h1 align = "center" >Ubah Data Buku</h1>
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  // Ambil data NIS yang dikirim oleh index.php melalui URL
  $id = $_GET['id'];
  // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
  $sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
  $sql->bindParam(':id', $id);
  $sql->execute(); // Eksekusi query insert
  $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
  ?>
  <form method="post" action="edit.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
    <table cellpadding="8">
      <tr>
        <td>No</td>
        <td><input type="text" name="nis" value="<?php echo $data['nis']; ?>"></td>
      </tr>
      <tr>
        <td>Judul</td>
        <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
      </tr>
      <tr>
        <td>Pengarang</td>

         <td><input type="text" name="jenis_kelamin" value="<?php echo $data['jenis_kelamin']; ?>"></td>

      </tr>
      <tr>
        <td>Penerbit</td>
        <td><textarea name="jurusan"><?php echo $data['jurusan']; ?></textarea></td>
      </tr>
      <tr>
        <td>Foto</td>
        <td>
          <input type="file" name="foto">
        </td>
      </tr>
    </table>
    <hr>
    <input type="submit" value="Ubah">
    <a href="index.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>