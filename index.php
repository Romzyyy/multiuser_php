<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-secondary fixed-top">
        <div class="container w-75 font-monospace">
            <a class="navbar-brand fw-normal fs-4" href="#">Kursus</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#siswa">Siswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#guru">Guru</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#mapel">Mapel</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card text-light">
        <img src="assets/gambar.jpeg" class="card-img align-middle" alt="..." style="height: 500px;">
        <div class="card-img-overlay d-flex align-items-center justify-content-center flex-column">
            <h2 class="card-title fs-1">MADRASAH IBTIDAIYAH</h2>
            <h1 class="card-title fs-1">MIFTAHUL HUDA</h1>
            <h3 class="card-title fs-1">Gedang-gedang Batuputih</h3>
        </div>
    </div>
    </div>
    <div class="container-fluid mt-5" id="siswa">
        <h1 class="text-center mt-5 mb-5 font-monospace">Data Siswa</h1>
        <div class="container w-75">
            <table class="table mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Foto</th>
                    </tr>
                </thead>
                <?php
            include "koneksi.php";
            $no = 1;
            $data = mysqli_query($koneksi, "select * from siswa")or die (mysqli_error($koneksi));
            while ($tampil = mysqli_fetch_array($data)){
              echo" <tbody>
              <tr>
                  <th class='align-middle'>$no</th>
                  <td class='align-middle'>$tampil[nama_siswa]</td>
                  <td class='align-middle'>$tampil[kelas]</td>
                  <td class='align-middle'>$tampil[alamat_siswa]</td>
                  <td class='align-middle' style='width:10%'><img class='rounded' style='width:70px; height:70px' src='guru/halaman_siswa/files/$tampil[file]'></td>             
              </tr>
          </tbody>";
          $no++;
            }
            ?>
            </table>
        </div>
    </div>
    <div class="container-fluid mt-5" id="guru">
        <h1 class="text-center mt-5 mb-5 font-monospace">Data guru</h1>
        <div class="container w-75">
            <table class="table mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Foto</th>
                    </tr>
                </thead>
                <?php
            include "koneksi.php";
            $no = 1;
            $data = mysqli_query($koneksi, "select * from guru")or die (mysqli_error($koneksi));
            while ($tampil = mysqli_fetch_array($data)){
              echo" <tbody>
              <tr>
                  <th class='align-middle'>$no</th>
                  <td class='align-middle'>$tampil[nip]</td>
                  <td class='align-middle'>$tampil[nama]</td>
                  <td class='align-middle'>$tampil[alamat]</td>
                  <td class='align-middle' style='width:10%'><img class='rounded' style='width:70px; height:70px' src='kepala_sekolah/halaman_guru/files/$tampil[file]'></td>            
              </tr>
          </tbody>";
          $no++;
            }
            ?>
            </table>
        </div>
    </div>
    <div class="container-fluid mt-5" id="mapel">
        <h1 class="text-center mt-5 mb-5 font-monospace">MATAPELAJARAN</h1>
        <div class="container w-75">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Mata pelajaran</th>
                        <th scope="col">Hari</th>
                    </tr>
                </thead>
                <?php
            include "koneksi.php";
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
    <div class="card text-center mt-5">
        <div class="card-body">
            <h5 class="card-title">make with &hearts; by romzy</h5>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>