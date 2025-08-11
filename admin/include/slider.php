<?php
// produk.php - Halaman untuk menampilkan daftar produk dengan filter kategori dinamis

// Pastikan path ke file config dan fungsi Anda benar
require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php'; // Jika Anda memiliki fungsi lain yang relevan
$query = "SELECT * FROM banner ORDER BY id DESC";
$result = mysqli_query($config, $query);
?>
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<?php while ($rowBanner = mysqli_fetch_assoc($result)) : ?>
				<div class="item-slick1" style="background-image: url(admin/content/uploads/Foto/<?= $rowBanner['gambar'] ?: 'default-food.jpg'; ?>);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
									<?= isset($rowBanner['judul']) ? $rowBanner['judul'] : 'Tanpa Judul'; ?>
								</span>
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-104 cl2 p-t-22 p-b-40 respon1">
									<?= isset($rowBanner['deskripsi']) ? $rowBanner['deskripsi'] : ''; ?>
								</h2>
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Pesan Sekarang
								</a>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>


<script>
	function orderNow() {
		const tanggal = document.getElementById("tanggal").value;
		const jam = document.getElementById("jam").value;
		const jumlah = document.getElementById("jumlah").value;

		if (!tanggal || !jam || jumlah <= 0) {
			alert("Harap lengkapi semua data pemesanan.");
			return;
		}

		alert(`Pemesanan untuk ${jumlah} orang pada ${tanggal}, jam ${jam}`);
		// Tambahkan logika pengiriman data di sini
	}
</script>