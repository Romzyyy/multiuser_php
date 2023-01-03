<?php 
	session_start();
 
	if($_SESSION['level']!=="kepala_sekolah"){
		header("location:index.php?pesan=gagal");
	}
 
	?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mt-5 mb-5">Tambah Guru</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">NIP</label>
                <input type="text" class="form-control" name="nip">
            </div>
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat">
            </div>
            <div class="mb-3">
                <label class="form-label">Chose file</label>
                <input type="file" class="form-control" name="NamaFile">
            </div>
            <button type="submit" class="btn btn-primary" name="proses">simpan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>

</html>
<?php
include "../../koneksi.php";
if(isset($_POST['proses'])){
    $dir = "files/";
    $file_name = $_FILES['NamaFile']['name'];
    $ext = ['png'];
    $ext_file = explode('.', $file_name);
    $ext_file = strtolower(end($ext_file));
    if(!in_array($ext_file, $ext)){
  echo "<div class='d-flex justify-content-center'>
            <p class='text-center'>Hanya bisa upload png</p>
        </div>
        ";
    }else{
    $file = uniqid();
    $file .= '.';
    $file .= $ext_file;
    move_uploaded_file($_FILES['NamaFile']['tmp_name'], $dir.$file);
    mysqli_query($koneksi, "INSERT INTO guru set 
    nip = '$_POST[nip]',
    nama = '$_POST[nama]',
    alamat = '$_POST[alamat]',
    file = '$file'") or die(mysqli_error($koneksi));
    header("location:guru.php");
}
}

?>