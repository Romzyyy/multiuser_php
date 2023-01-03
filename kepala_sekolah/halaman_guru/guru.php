<?php 
	session_start();
 
	if($_SESSION['level']!=="kepala_sekolah"){
		header("location:index.php?pesan=gagal");
	}
 
	?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">KURSUS/kepala_sekolah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../halaman_siswa/halaman_siswa.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a type="submit" class="btn btn-dark" href="../../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="mt-5">
        <h1 class="text-center mt-5 mb-5">Data guru</h1>
        <div class="container position-relative">
            <a class="btn btn-success" href="tambah_guru.php" role="button">Add New</a>
            <div class="table-responsive">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Foto</th>
                            <th scope="col text-center">Action</th>
                        </tr>
                    </thead>
                    <?php
            include "../../koneksi.php";
            $no = 1;
            $data = mysqli_query($koneksi, "select * from guru")or die (mysqli_error($koneksi));
            while ($tampil = mysqli_fetch_array($data)){
              echo" <tbody>
              <tr>
                  <th class='align-middle'>$no</th>
                  <td class='align-middle'>$tampil[nip]</td>
                  <td class='align-middle'>$tampil[nama]</td>
                  <td class='align-middle'>$tampil[alamat]</td>
                  <td class='align-middle' style='width:10%'><img class='rounded' style='width:70px; height:70px' src='files/$tampil[file]'></td>
                  <td class='align-middle' style='width:20%'>
                  <a class='btn btn-primary' href='ubah_guru.php?kode=$tampil[id]' role='button'>Edit</a>
                  <a class='btn btn-danger' href='?kode=$tampil[id]' role='button'>Delete</a>
                  </td>              
              </tr>
          </tbody>";
          $no++;
            }
            ?>
                </table>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
include "../../koneksi.php";
if(isset($_GET['kode'])){
mysqli_query($koneksi, "delete from guru where id='$_GET[kode]'");
header("location:guru.php");
}
?>