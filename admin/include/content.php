<?php

require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php'; // Jika Anda memiliki fungsi lain yang relevan

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
$sql_produk .= " ORDER BY p.nama_produk ASC LIMIT 4";
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


<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="p-b-10">
			<h5 class="ltext-102 cl5">
				Daftar Makanan
			</h5>
		</div>


		<div id="produk-container" class="row isotope-grid mt-4">
			<?php if ($result_produk && mysqli_num_rows($result_produk) > 0): ?>
				<?php while ($row_produk = mysqli_fetch_assoc($result_produk)): ?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item category-<?php echo htmlspecialchars($row_produk['kategori_id']); ?>">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="admin/content/uploads/Foto/<?php echo htmlspecialchars($row_produk['gambar']); ?>"
									alt="IMG-PRODUCT">

								<!-- Tombol langsung ke detail -->


								<button onclick="window.open('Detail-Produk.php?id=<?php echo $row_produk['id']; ?>')"
									class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" ?>
									Lihat Detail
								</button>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l">
									<p class="stext-104 cl4 p-b-6">
										<?php echo htmlspecialchars($row_produk['nama_produk']); ?>
									</p>
									<span class="stext-105 cl3">
										Rp.<?php echo number_format($row_produk['harga'], 0, ',', '.'); ?>
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

		<!-- Load more -->
		<div class="flex-c-m flex-w w-full p-t-45">
			<button onclick="window.open('Semua-Produk.php')" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				Lebih Banyak
			</button>
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