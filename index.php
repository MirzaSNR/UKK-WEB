<html>
<head>
  <title>UJIKOM</title>
</head>
<body>
  <h1 align = "center" >Data Buku</h1>
  <a href="form_save.php"><input type="button" value="Tambah Data"></a>
  <table border="1" width="100%">
  <tr>
    <th>Foto</th>
    <th>No</th>
    <th>Judul</th>
    <th>pengarang</th>
    <th>penerbit</th>
    <th colspan="2">Aksi</th>
  </tr>
  <?php
  // Load file koneksi.php
  include "koneksi.php";
  // Buat query untuk menampilkan semua data siswa
  $sql = $pdo->prepare("SELECT * FROM siswa");
  $sql->execute(); // Eksekusi querynya
  while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
    echo "<tr>";
    echo "<td><img src='images/".$data['foto']."' width='100' height='100'></td>";
    echo "<td>".$data['nis']."</td>";
    echo "<td>".$data['nama']."</td>";
    echo "<td>".$data['jenis_kelamin']."</td>";
    echo "<td>".$data['jurusan']."</td>";
    echo "<td><a href='form_edit.php?id=".$data['id']."'>Ubah</a></td>";
    echo "<td><a href='delete.php?id=".$data['id']."'>Hapus</a></td>";
    echo "</tr>";
  }
  ?>
  </table>
</body>
</html>