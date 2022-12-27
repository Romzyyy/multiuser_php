<?php
session_start();

if($_SESSION['level']!=="guru"){
    header("location:index.php?pesan=gagal");
}

include "../../koneksi.php";
$sql = mysqli_query($koneksi, "select * from matapelajaran where id='$_GET[kode]'");
$data = mysqli_fetch_array($sql);
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
    <div class="container-fluid w-25 mt-5">
        <h1 class="text-center mt-5 mb-5">Ubah Mapel</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Mata pelajaran</label>
                <input type="text" class="form-control" name="mapel" value="<?php echo $data['mapel'];?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <input type="text" class="form-control" name="hari" value="<?php echo $data['hari'];?>">
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
        mysqli_query($koneksi,"update matapelajaran set 
        mapel = '$_POST[mapel]',
        hari = '$_POST[hari]'
        where id = '$_GET[kode]'")or die (mysqli_error($koneksi));
        echo "<p class='width-100 text-center mt-5'>Data telah tersimpan</p>";
        header("location:mapel.php");
    }
?>