<html>
<head>
  <title>UJIKOM</title>
</head>
<body>
<h1 align = "center" > Tambah Data Buku</h1>
  <form method="post" action="save.php" enctype="multipart/form-data">
  <table cellpadding="8">
  <tr>
    <td>No</td>
    <td><input type="text" name="nis"></td>
  </tr>
  <tr>
    <td>Judul</td>
    <td><input type="text" name="nama"></td>
  </tr>
  <tr>
    <td>Pengarang</td>
    <td>
    <input type="text" name="jenis_kelamin"></td>
    </td>
  </tr>
  <tr>
    <td>Penerbit</td>
    <td><textarea name="jurusan"></textarea></td>
  </tr>
  <tr>
    <td>Foto</td>
    <td><input type="file" name="foto"></td>
  </tr>
  </table>
  
  <hr>
  <input type="submit" value="Simpan">
  <a href="index.php"><input type="button" value="Batal"></a>
  </form>
</body>
</html>