<div class="sec-banner bg0 p-t-80 p-b-50">
	<div class="container">
		<div class="p-b-10">
			<h5 class="ltext-102 cl5">
				Pilihan Paket
			</h5>
			<br>

		</div>

		<div class="row">
			<?php if ($rowJeniss && mysqli_num_rows($rowJeniss) > 0): ?>
				<?php foreach ($rowJeniss as $rowJenis): ?>
					<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
						<!-- Block1 -->
						<div class="block1 wrap-pic-w">
							<img src="admin/content/uploads/Foto/<?= $rowJenis['gambar'] ?: 'default-food.jpg'; ?>" alt="IMG-BANNER">

							<a href="product.html" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
								<div class="block1-txt-child1 flex-col-l">
									<span class="block1-name ltext-102 trans-04 p-b-8">
										<?php echo isset($rowJenis['nama_paket']) ? $rowJenis['nama_paket'] : 'Duarrr' ?>
									</span>

									<span class="block1-info stext-102 trans-04">
										<?php echo isset($rowJenis['deskripsi']) ? $rowJenis['deskripsi'] : '' ?>
									</span>
								</div>

								<div class="block1-txt-child2 p-b-4 trans-05">
									<div class="block1-link stext-101 cl0 trans-09">
										Info Lengkap
									</div>
								</div>
							</a>
						</div>
					</div>
				<?php endforeach ?>
			<?php else: ?>
				<div class="col-12 text-center">
					<p class="stext-106 cl6">Tidak ada paket yang ditemukan untuk kategori ini.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>