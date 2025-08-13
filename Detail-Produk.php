<?php
// product-detail.php - Halaman untuk menampilkan detail produk

// Pastikan path ke file config dan fungsi Anda benar
require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php'; // Jika Anda memiliki fungsi lain yang relevan
include 'admin/include/css.php'; // Menyertakan file CSS

// --- Logika PHP untuk Detail Produk ---

// Inisialisasi variabel untuk menampung data produk
$produk = null;

// Periksa apakah ada parameter 'id' di URL dan apakah nilainya valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
	$id_produk = $_GET['id'];

	// Query untuk mengambil detail produk berdasarkan ID
	// Menggunakan Prepared Statement untuk mencegah SQL Injection
	$queryprodukDetail = "SELECT p.id, p.nama_produk, p.deskripsi, p.harga, p.gambar, p.stok, k.nama_kategori, k.id as kategori_id
                          FROM produk p
                          JOIN kategori k ON p.id_kategori = k.id
                          WHERE p.id = ?";

	$rowprodukDetail = mysqli_prepare($config, $queryprodukDetail);

	if ($rowprodukDetail) {
		mysqli_stmt_bind_param($rowprodukDetail, "i", $id_produk); // "i" untuk integer
		mysqli_stmt_execute($rowprodukDetail);
		$result_produk_detail = mysqli_stmt_get_result($rowprodukDetail);

		// Ambil hasil kueri
		if ($result_produk_detail && mysqli_num_rows($result_produk_detail) > 0) {
			$produk = mysqli_fetch_assoc($result_produk_detail);
		}
		mysqli_stmt_close($rowprodukDetail);
	} else {
		// Log error jika prepared statement gagal
		error_log("Gagal menyiapkan statement untuk detail produk: " . mysqli_error($config));
	}
}
// --- Logika PHP untuk Produk Terkait ---
$produk_terkai = [];
if ($produk) {
	$id_kategori_terkait = $produk['kategori_id'];
	$id_produk_utama = $produk['id'];

	$sql_produk_terkait = "SELECT id, nama_produk, harga, gambar
                           FROM produk
                           WHERE id_kategori = ? AND id != ?
                           ORDER BY RAND() LIMIT 4"; // Ambil 4 produk acak dari kategori yang sama

	$stmt_terkait = mysqli_prepare($config, $sql_produk_terkait);

	if ($stmt_terkait) {
		mysqli_stmt_bind_param($stmt_terkait, "ii", $id_kategori_terkait, $id_produk_utama);
		mysqli_stmt_execute($stmt_terkait);
		$result_terkait = mysqli_stmt_get_result($stmt_terkait);

		if ($result_terkait) {
			while ($row_terkait = mysqli_fetch_assoc($result_terkait)) {
				$produk_terkait[] = $row_terkait;
			}
		}
		mysqli_stmt_close($stmt_terkait);
	} else {
		error_log("Gagal menyiapkan statement untuk produk terkait: " . mysqli_error($config));
	}
}
// Tutup koneksi database di akhir skrip
mysqli_close($config);

// Jika produk tidak ditemukan, arahkan pengguna kembali ke halaman produk.
if ($produk === null) {
	header("Location: produk.php");
	exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="admin/content/uploads/Foto/dpn.png" type="image/x-icon">
	<title>Produk detail | Dapur Mama Niar </title>
</head>

<body class="animsition">
	<!-- Header -->
	<?php include 'admin/include/header.php' ?>
	<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
	</div>

	<div class="container p-t-100">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg align-items-center" style="display: flex;">
		<a href="Beranda.php" class="stext-109 cl8 hov-cl1 trans-04">
			Beranda
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="Semua-Produk.php" class="stext-109 cl8 hov-cl1 trans-04">
			Produk
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span <?php echo htmlspecialchars($produk['kategori_id']); ?> class="stext-109 cl8 hov-cl1 trans-04 text-dark">
			<?php echo htmlspecialchars($produk['nama_kategori']); ?>
			<i class="fa fa-angle-right m-l-9 m-r-10"></i>
		</span>

		<span class="stext-109 cl4">
			<?php echo htmlspecialchars($produk['nama_produk']); ?>
		</span>
	</div>
</div>


	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="admin/content/uploads/Foto/<?php echo $produk['gambar']; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="admin/content/uploads/Foto/<?php echo $produk['gambar']; ?>" alt="IMG-PRODUCT">
										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="admin/content/uploads/Foto/<?php $produk['gambar']; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<span class="text-dark"><?php echo $produk['nama_produk']; ?></span>
						</h4>

						<span class="mtext-106 cl2">
							Rp.<?php echo number_format($produk['harga'], 0, ',', '.'); ?> / Box
						</span>
						<hr>
						<ul class="mtext-100 cl2">
							<li><b>Kategori :</b> <?php echo $produk['nama_kategori']; ?> </li>
							<li><b>Status Produk :</b> <span class="text-success"><?php echo $produk['stok']; ?></span></li>
							<li><b>Jumlah pesan minimal :</b> 10 Box</li>
							<li><b>Jumlah pesan maksimal :</b> 200 Box</li>
							<li class="mtext-100 cl2 mt-3">
								<b>Deskripsi :</b>
							</li>
							<li class="stext-102 cl3 p-t-23 js-modal-desc">
								<span><?php echo $produk['deskripsi']; ?></span>
							</li>
						</ul>

						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<button onclick="pesanSekarang()"
										class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
										Pesan Sekarang
									</button>
								</div>

								<script>
									function pesanSekarang() {
										// Buka WhatsApp di tab baru
										window.open(
											'https://wa.me/6289684758768?text=Halo%20admin%2C%20saya%20ingin%20pesan%20produk%20ini',
											'_blank'
										);

										// Langsung redirect tab sekarang ke halaman semua produk
												window.history.back();; // ganti sesuai URL daftar semua produk
									}
								</script>

							</div>
						</div>

						<div class="flex-w flex-m p-l-100 p-t-40 respon7">
						</div>
					</div>
				</div>
			</div>

			<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
				<span class="stext-107 cl6 p-lr-25">
					Kategori: <?php echo $produk['nama_kategori']; ?>
				</span>
			</div>
	</section>

	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Produk Terkait
				</h3>
			</div>

			<div class="wrap-slick2">
				<div class="slick2">
					<?php if (!empty($produk_terkait)): ?>
						<?php foreach ($produk_terkait as $relate_item): ?>
							<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
								<div class="block2">
									<div class="block2-pic hov-img0">
										<img src="admin/content/uploads/Foto/<?php echo htmlspecialchars($relate_item['gambar']); ?>" alt="IMG-PRODUCT">
										<a href="Detail-Produk.php?id=<?php echo htmlspecialchars($relate_item['id']); ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
											Lihat Detail
										</a>
									</div>
									<div class="block2-txt flex-w flex-t p-t-14">
										<div class="block2-txt-child1 flex-col-l ">
											<a href="Detail-Produk.php?id=<?php echo htmlspecialchars($relate_item['id']); ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
												<?php echo htmlspecialchars($relate_item['nama_produk']); ?>
											</a>
											<span class="stext-105 cl3">
												Rp.<?php echo number_format($relate_item['harga'] * 1000, 0, ',', '.'); ?>
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
						<?php endforeach; ?>
					<?php else: ?>
						<div class="col-12 text-center">
							<p class="stext-106 cl6">Tidak ada produk terkait ditemukan.</p>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>



	<?php include 'admin/include/footer.php' ?>

	<a href="https://wa.me/6289684758768" target="_blank" class="btn-wa-float" title="Hubungi via WhatsApp">
		<span class="symbol-btn-wa">
			<i class="zmdi zmdi-whatsapp"></i>
		</span>
	</a>

	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
	</div>

	<script src="tmp/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="tmp/vendor/animsition/js/animsition.min.js"></script>
	<script src="tmp/vendor/bootstrap/js/popper.js"></script>
	<script src="tmp/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="tmp/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<script src="tmp/vendor/slick/slick.min.js"></script>
	<script src="tmp/js/slick-custom.js"></script>
	<script src="tmp/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() {
			$(this).magnificPopup({
				delegate: 'a',
				type: 'image',
				gallery: {
					enabled: true
				},
				mainClass: 'mfp-fade'
			});
		});
	</script>
	<script src="tmp/vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addcart-detail').on('click', function() {
			var nameProduct = $('.js-name-detail').html();
			swal(nameProduct, "is added to cart !", "success");
		});
	</script>
	<script src="tmp/vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function() {
			$(this).css('position', 'relative');
			$(this).css('overflow', 'hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});
			$(window).on('resize', function() {
				ps.update();
			})
		});
	</script>
	<script src="tmp/js/main.js"></script>
	<style>
		.js-modal-desc {
			border: 1px solid #ccc;
			/* Warna garis */
			border-radius: 8px;
			/* Sudut membulat */
			padding: 15px;
			/* Ruang dalam */
			background-color: #f9f9f9;
			/* Warna latar belakang */
			font-size: 15px;
			/* Ukuran teks */
			line-height: 1.6;
			/* Spasi baris */
			margin-top: 10px;
		}
	</style>
</body>

</html>