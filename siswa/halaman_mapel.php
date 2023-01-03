<?php 
	session_start();
 
	if($_SESSION['level']!=="siswa"){
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
            <a class="navbar-brand" href="#">KURSUS/siswa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="halaman_siswa.php">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mapel</a>
                    </li>
                    <li class="nav-item">
                        <a type="submit" class="btn btn-dark" href="../logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class=" mt-5">
        <h1 class="text-center mt-5 mb-5">MATAPELAJARAN</h1>
        <div class="container position-relative">
            <table class="table position-absolute top-0 start-50 translate-middle-x mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Mata pelajaran</th>
                        <th scope="col">Hari</th>
                    </tr>
                </thead>
                <?php
            include "../koneksi.php";
            $no = 1;
            $data = mysqli_query($koneksi, "select * from matapelajaran")or die (mysqli_error($koneksi));
            while ($tampil = mysqli_fetch_array($data)){
              echo" <tbody>
              <tr>
                  <th class='align-middle'>$no</th>
                  <td class='align-middle'>$tampil[mapel]</td>
                  <td class='align-middle'>$tampil[hari]</td>             
              </tr>
          </tbody>";
          $no++;
            }
            ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>