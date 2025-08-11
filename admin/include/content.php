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
				Kategori Produk
			</h5>
		</div>

		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10" style="width: 100%; justify-content: center;">
				<!-- Tombol "Semua Produk" -->
				<!-- Pastikan ini juga BUTTON jika Isotope.js hanya mendengarkan BUTTON -->
				<button
					class="btn btn-white stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 <?php echo ($id_kategori_filter === null) ? 'how-active1 kategori-btn-active' : ''; ?>"
					data-filter="*" style="border-radius: 50px !important;">
					Semua Produk
				</button>

				<!-- Tombol Kategori Dinamis -->
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
			<a href="Semua-Produk.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
				More Products
			</a>
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