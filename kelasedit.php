<?php
require '../tes.php';
require '../conn.php';

//tangkap get
$id= $_GET['id'];
// if(isset($_GET['id'])){
//     $id= $_GET['id'];
//   }else{
//     echo "<h1> Halaman tidak ditemukan</h1>";
//     exit;
//   }
//edit data
$edit = mysqli_query($conn, "SELECT * FROM kelas WHERE id= $id");
//ambil data
$result = mysqli_fetch_assoc($edit);
//ketika tombol edit diklik
if(isset($_POST['submitG'])){
    //tangkap name
    $kodKelas = $_POST['kodkelas'];
    $tahunAj = $_POST['thnajaran'];
    $kelas = $_POST['kelas'];
    $namaGuru = $_POST['namaG'];
    $status = $_POST['status'];
    //ambil dan rubah
    mysqli_query($conn, "UPDATE kelas SET kode_kelas= '$kodKelas',tahun_ajaran= '$tahunAj',kelas= '$kelas', nama_guru=$namaGuru, statuss= '$status' WHERE id=$id");
    //jika berhasil
    if(mysqli_affected_rows($conn) > 0){
        echo "<script>alert('data berhasil diubah!');
        document.location.href='kelas.php';</script>";

    }


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Edit </title>
</head>
<body>
<body>
<div class="container">
<h2>Edit Data Kelas</h2>
<form class="mt-4" method="post" action="">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="kodKel">Kode Kelas</label>
      <input type="text" name="kodkelas" class="form-control" id="kodKel" value="<?= $result['kode_kelas']?>">
    </div>
    <!-- select option tahun ajaran -->
    <div class="form-group col-md-6">
      <label>Tahun Ajaran </label>
    <select class="custom-select" name="thnajaran">
  <option selected>Pilih</option>
  <?php $array = [2010,2011,2012,2013,2014,2015,2016,2017,2018,2019];?>
  <?php foreach($array as $arr): ?>
  <option value="<?=$arr;?>" <?= $result['tahun_ajaran']==$arr ? "selected" : ""?>><?=$arr;?></option>
  <?php endforeach; ?>
  </select>
  </div>
    <!-- batas -->
    <!-- option -->
    <div class="form-group col-md-6">
      <label for="kelas">Kelas</label>
      <input type="text" name="kelas" class="form-control" id="kelas" value="<?= $result['kelas']?>">
    </div>
  <!-- batas -->

    <div class="form-group col-md-6">
      <label for="namaG">Nama Guru</label>
      <input type="text"  name="namaG" class="form-control" id="namaG" value="<?= $result['nama_guru']?>">
    </div>
    
    
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="status">Status</label>
      <input type="text" name="status" class="form-control" id="status" value="<?= $result['statuss']?>">
    </div>
   </div>
  
  <button type="submit" name="submitG" class="btn btn-primary">Edit data</button>
</form>
<!-- button back -->
<button type="button" class="btn btn-link mt-5 float-right" onclick="document.location.href='../tes.php';">Back</button>
</div>
<script src="../jquery/jquery.js"></script>
<script src="../sweetalert2.all.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>

</body>
</html>