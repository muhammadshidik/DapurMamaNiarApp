<?php
// produk.php - Halaman untuk menampilkan daftar produk dengan filter kategori dinamis

// Pastikan path ke file config dan fungsi Anda benar
require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php'; // Jika Anda memiliki fungsi lain yang relevan

// --- Logika PHP untuk Kategori ---
// Query untuk mengambil semua kategori beserta deskripsi dan gambarnya
$sql_kategori = "SELECT id, nama_kategori FROM kategori ORDER BY nama_kategori ASC";
$result_kategori = mysqli_query($config, $sql_kategori);

// --- Logika PHP untuk Produk ---
$id_kategori_filter = null;
$nama_kategori_display = "Semua Produk"; // Default jika tidak ada kategori yang dipilih

// Periksa apakah ada parameter id_kategori di URL
if (isset($_GET['id_kategori']) && is_numeric($_GET['id_kategori'])) {
	$id_kategori_filter = $_GET['id_kategori'];

	// Ambil nama kategori untuk ditampilkan (menggunakan prepared statement untuk keamanan)
	$sql_nama_kategori = "SELECT nama_kategori FROM kategori WHERE id = ?";
	$stmt_nama_kategori = mysqli_prepare($config, $sql_nama_kategori);

	if ($stmt_nama_kategori) {
		mysqli_stmt_bind_param($stmt_nama_kategori, "i", $id_kategori_filter); // "i" untuk integer
		mysqli_stmt_execute($stmt_nama_kategori);
		$result_nama_kategori = mysqli_stmt_get_result($stmt_nama_kategori);

		if ($result_nama_kategori && mysqli_num_rows($result_nama_kategori) > 0) {
			$row_nama_kategori = mysqli_fetch_assoc($result_nama_kategori);
			$nama_kategori_display = htmlspecialchars($row_nama_kategori['nama_kategori']);
		}
		mysqli_stmt_close($stmt_nama_kategori);
	} else {
		error_log("Gagal menyiapkan statement untuk nama kategori: " . mysqli_error($config));
	}
}

// Query untuk mengambil produk (menggunakan prepared statement untuk keamanan)
// Join dengan tabel kategori untuk mendapatkan nama kategori
$sql_produk = "SELECT p.id, p.nama_produk, p.deskripsi, p.harga, p.gambar, p.stok, k.nama_kategori, k.id as kategori_id
               FROM produk p
               JOIN kategori k ON p.id_kategori = k.id";

if ($id_kategori_filter) {
	// Jika ada id_kategori, filter produk berdasarkan id_kategori
	$sql_produk .= " WHERE p.id_kategori = ?";
}
$sql_produk .= " ORDER BY p.nama_produk ASC";
// Urutkan produk

$stmt_produk = mysqli_prepare($config, $sql_produk);

if ($stmt_produk) {
	if ($id_kategori_filter) {
		mysqli_stmt_bind_param($stmt_produk, "i", $id_kategori_filter); // "i" untuk integer
	}
	mysqli_stmt_execute($stmt_produk);
	$result_produk = mysqli_stmt_get_result($stmt_produk);
} else {
	error_log("Gagal menyiapkan statement untuk produk: " . mysqli_error($config));
	$result_produk = false;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Produk | Dapur Mama Niar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="admin/content/uploads/Foto/dpn.png" type="image/x-icon">
	<?php include 'admin/include/css.php' ?>

<body class="animsition">

	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<marquee behavior="scroll" direction="left" scrollamount="5">
							Informasi Penting : Alamat yang tercantum pada website, adalah alamat official dari delimacatering.com. Untuk info, visit, dan tester, silahkan kunjungi di Jl. Jendral Sudirman No.28 RT.001/013, Kranji, Bekasi Barat, Bekasi 17135, atau menghubungi kontak Telepon/Whatsapp : 0821 2866 0702.
						</marquee>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					<div class="logo">
						<img src="admin/content/uploads/Foto/dpn.png" alt="IMG-LOGO" style="height: 52px; width: 52px; margin-right: 10px;">
						<span class="active menu bold text-body">Dapur Mama Niar</span>
					</div>
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="Beranda.php">Beranda</a>
							</li>

							<li class="active-menu">
								<a href="produk.php">Pilihan Produk</a>
								<ul class="sub-menu">
									<li><a href="produk.php?id_kategori=1">Catering Harian</a></li>
									<li><a href="produk.php?id_kategori=2">Nasi Kotak</a></li>
									<li><a href="produk.php?id_kategori=3">Prasmanan</a></li>
								</ul>
							</li>

							<li>
								<a href="Tentang.php">Tentang Kami</a>
							</li>

							<li>
								<a href="Kontak.php">Hubungi Kami</a>
							</li>
						</ul>
					</div>
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>

						<a href="#" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
					</div>
				</nav>
			</div>
		</div>
		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="tmp/images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="tmp/images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="tmp/images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('tmp/images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			Produk
		</h2>
	</section>
	<!-- Content page -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h5 class="ltext-102 cl5">
					Kategori Produk
				</h5>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<!-- Tombol "Semua Produk" -->
					<!-- Pastikan ini juga BUTTON jika Isotope.js hanya mendengarkan BUTTON -->
					<button class="btn btn-white stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php echo ($id_kategori_filter === null) ? 'how-active1 kategori-btn-active' : ''; ?>" data-filter="*" style="border-radius: 50px !important;">
						Semua Produk
					</button>
					<?php
					// Pastikan $result_kategori sudah ada dari bagian PHP di atas
					if (mysqli_num_rows($result_kategori) > 0) {
						while ($row_kategori = mysqli_fetch_assoc($result_kategori)) {
							// Tentukan apakah kategori ini sedang aktif
							$is_active = ($id_kategori_filter == $row_kategori['id']) ? 'how-active1 kategori-btn-active' : '';

							// Kunci perubahan: Menggunakan <button> daripada <a>
							echo '<button type="button" '; // Gunakan type="button" agar tidak submit form
							echo 'class="btn btn-white stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 ' . $is_active . '" ';
							echo 'data-filter=".category-' . htmlspecialchars($row_kategori['id']) . '" '; // Penting untuk Isotope.js
							echo 'style="border-radius: 50px !important;">';
							echo htmlspecialchars($row_kategori['nama_kategori']);
							echo '</button>';
						}
					}
					?>
				</div>
				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Sortir
					</div>

					<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
						<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
						<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						Cari
					</div>
				</div>

				<!-- Search product -->
				<div class="dis-none panel-search w-full p-t-10 p-b-15">
					<div class="bor8 dis-flex p-l-15">
						<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
							<i class="zmdi zmdi-search"></i>
						</button>

						<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
							placeholder="Search">
					</div>
				</div>
				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sort By
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Default
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Popularity
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Average rating
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Newness
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: Low to High
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										Price: High to Low
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Harga
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										All
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$0.00 - $50.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$50.00 - $100.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$100.00 - $150.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$150.00 - $200.00
									</a>
								</li>

								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04">
										$200.00+
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Tags
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<a href="#"
									class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Fashion
								</a>

								<a href="#"
									class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Lifestyle
								</a>

								<a href="#"
									class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Denim
								</a>

								<a href="#"
									class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Streetstyle
								</a>

								<a href="#"
									class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
									Crafts
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div id="produk-container" class="row isotope-grid">
				<?php if ($result_produk && mysqli_num_rows($result_produk) > 0): ?>
					<?php while ($row_produk = mysqli_fetch_assoc($result_produk)): ?>
						<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item category-<?php echo htmlspecialchars($row_produk['kategori_id']); ?>">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="admin/content/uploads/Foto/<?php echo htmlspecialchars($row_produk['gambar']); ?>"
										alt="IMG-PRODUCT">

									<!-- Tombol langsung ke detail -->
									<a href="Detail-Produk.php?id=<?php echo $row_produk['id']; ?>"
										class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
										Lihat Detail
									</a>
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l">
										<p class="stext-104 cl4 p-b-6">
											<?php echo htmlspecialchars($row_produk['nama_produk']); ?>
										</p>
										<span class="stext-105 cl3">
											Rp.<?php echo number_format($row_produk['harga'] * 1000, 0, ',', '.'); ?>
										</span>
									</div>
									<style>
									/* Perbesar ukuran ikon shopping cart */
									.icon-cart {
										font-size: 24px;
										/* Ubah ukuran sesuai kebutuhan, contoh: 24px */
										color: #333;
										/* Optional: ubah warna jika perlu */
									}
								</style>
								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="Detail-Produk.php?id=<?php echo $row_produk['id']; ?>" class="btn">
										<i class="zmdi zmdi-shopping-cart"></i>
									</a>
								</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php else: ?>
					<div class="col-12 text-center">
						<p class="stext-106 cl6">Tidak ada produk yang ditemukan untuk kategori ini.</p>
					</div>
				<?php endif; ?>
			</div>
			<?php
			// Tutup prepared statement dan koneksi database
			if (isset($stmt_produk)) {
				mysqli_stmt_close($stmt_produk);
			}
			if (isset($stmt_nama_kategori)) {
				mysqli_stmt_close($stmt_nama_kategori);
			}
			mysqli_close($config);
			?>

	</section>


	<!-- Footer -->
	<?php include 'admin/include/footer.php' ?>

	<!-- Tombol WhatsApp mengambang -->
	<a href="https://wa.me/6289684758768" target="_blank" class="btn-wa-float" title="Hubungi via WhatsApp">
		<span class="symbol-btn-wa">
			<i class="zmdi zmdi-whatsapp"></i>
		</span>
	</a>
	<style>
		.btn-wa-float {
			position: fixed;
			bottom: 20px;
			left: 20px;
			/* ganti dari right ke left */
			z-index: 99;
			background-color: #25D366;
			color: white;
			width: 50px;
			height: 50px;
			border-radius: 50%;
			text-align: center;
			box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
			display: flex;
			align-items: center;
			justify-content: center;
			transition: background-color 0.3s;
		}

		.btn-wa-float:hover {
			background-color: #1ebc5b;
			text-decoration: none;
		}

		.symbol-btn-wa i {
			font-size: 24px;
			line-height: 1;
		}
	</style>
	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<?php include 'admin/include/js.php' ?>
</body>

</html>