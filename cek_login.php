<?php 
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
 
	$data = mysqli_fetch_assoc($login);
	if($data['level']=="siswa"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "siswa";
		header("location:siswa/halaman_siswa.php");
	}else if($data['level']=="guru"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "guru";
		header("location:guru/halaman_siswa/siswa.php");
	}else if($data['level']=="kepala_sekolah"){
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "kepala_sekolah";
		header("location:kepala_sekolah/halaman_guru/guru.php");
	}else{
	header("location:index.php?pesan=gagal");
	}	
 
?>