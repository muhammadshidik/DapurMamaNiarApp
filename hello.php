<?php
// Memulai session agar bisa menggunakan $_SESSION
session_start();

// Membuat session ID baru dan menghapus session ID lama untuk meningkatkan keamanan (mencegah session fixation)
session_regenerate_id();

// Mengaktifkan output buffering (penyimpanan output sementara sebelum dikirim ke browser)
ob_start();

// Membersihkan output buffer, menghapus semua isi buffer (jika ada output sebelumnya)
ob_clean();

// Memanggil file koneksi ke database
require_once 'admin/controller/koneksi.php';

// Memanggil file yang berisi fungsi-fungsi tambahan
require_once 'admin/controller/functions.php';

// Mengecek apakah session 'id' kosong (belum login atau session habis)
if (empty($_SESSION['id'])) {
	// Jika belum login, arahkan pengguna ke halaman logout (biasanya akan diarahkan ke login page lagi)
	header('Location: admin/controller/logout.php');
}

// Query untuk mengambil semua menu item yang tersedia, diurutkan berdasarkan nama
$query = mysqli_query($config, "SELECT * FROM paket_catering ORDER BY id ASC");
$rowJeniss = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="admin/content/uploads/Foto/dpn.png" type="image/x-icon">
	<title>Beranda - Dapur Mama Niar</title>
	<?php include 'admin/include/css.php' ?>
</head>

<body class="animsition">
	<!-- Header -->
	<?php include 'admin/include/header.php' ?>
	<!-- Cart -->

	<?php include 'admin/include/chart.php' ?>
	<!-- Slider -->

	<?php include 'admin/include/slider.php' ?>

	<!-- Banner -->

	<?php include 'admin/include/banner.php' ?>

	<!-- Product -->
	<?php include 'admin/include/content.php' ?>


	<!-- Footer -->
	<?php include 'admin/include/footer.php' ?>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>
		<?php include 'admin/include/modal.php' ?>
	</div>

	<?php include 'admin/include/js.php' ?>
</body>

</html>