<style>
	.footer {
		background-color: #222;
		color: #eee;
		font-family: 'Poppins', sans-serif;
		padding: 40px 0;
	}

	.footer-container {
		max-width: 1200px;
		margin: auto;
		padding: 0 20px;
	}

	.footer-top {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-between;
		gap: 40px;
		margin-bottom: 30px;
	}

	.footer-left-content,
	.footer-right-content {
		flex: 1 1 300px;
	}

	.old-navbar-branding img {
		max-width: 160px;
		margin-bottom: 16px;
	}

	.footer-menu-group-wrapper,
	.footer-menu-group {
		margin-bottom: 20px;
	}

	.paragraph-medium-adaeda {
		color: #ccc;
		font-size: 14px;
		line-height: 1.6;
	}

	.footer .footer-menu-group .bold {
		font-weight: 600;
		color: #fff;
		margin-bottom: 8px;
	}

	.footer-link-list a {
		display: block;
		margin-bottom: 5px;
		color: #ccc;
		text-decoration: none;
	}

	.footer-link-list a:hover {
		color: #e67e22;
	}

	.footer-link-columns {
		display: flex;
		flex-wrap: wrap;
		gap: 40px;
		margin-bottom: 20px;
	}

	@media (max-width: 768px) {
		.footer-link-columns {
			flex-direction: column;
		}
	}

	.map-wrapper {
		width: 100%;
		aspect-ratio: 16/9;
		border-radius: 12px;
		overflow: hidden;
		border: 2px solid #e67e22;
	}

	.footer-bottom {
		display: flex;
		justify-content: space-between;
		flex-wrap: wrap;
		border-top: 1px solid #444;
		padding-top: 20px;
	}

	.footer-bottom-social a {
		margin-right: 12px;
		font-size: 18px;
		color: #ccc;
	}

	.footer-bottom-social a:hover {
		color: #e67e22;
	}

	.footer-love-icon {
		width: 16px;
		margin: 0 6px;
	}
</style>

<div class="footer">
	<div class="footer-container">
		<div class="footer-top">
			<!-- Logo & Info Katering -->
			<div class="footer-left-content">
				<div class="old-navbar-branding">
					<img src="admin/content/uploads/Foto/image.png" alt="Logo Dapur Mama Niar" class="kulina-logo" loading="lazy">
				</div>
				<div class="footer-menu-group-wrapper">
					<div class="footer-menu-group">
						<div class="paragraph-medium-adaeda bold">Kantor Pusat</div>
						<p class="paragraph-medium-adaeda">
							Jl. Muhammad Dahlan No. 28, RT. 010, RW.007, Kel. Pejaten Timur, Kec. Pasar Minggu, Kota Jakarta Selatan, 12510
						</p>
					</div>
					<div class="footer-menu-group">
						<div class="paragraph-medium-adaeda bold">Layanan Pengaduan Konsumen</div>
						<p class="paragraph-medium-adaeda">
							Direktorat Jenderal Perlindungan Konsumen dan Tertib Niaga Kementerian Perdagangan Republik Indonesia<br>
							WhatsApp Ditjen PKTN: +628531111010
						</p>
					</div>
				</div>
			</div>

			<!-- Bantuan & Hubungi Kami (Sejajar) + Lokasi -->
			<div class="footer-right-content">
				<div class="footer-link-columns">
					<!-- Bantuan -->
					<div class="footer-menu-group">
						<div class="paragraph-medium-adaeda bold">Bantuan</div>
						<div class="footer-link-list">
							<a href="#">Cara Pemesanan</a>
							<a href="#">Kebijakan Refund</a>
							<a href="#">Syarat & Ketentuan</a>
							<a href="#">FAQ</a>
						</div>
					</div>

					<!-- Hubungi Kami -->
					<div class="footer-menu-group">
						<div class="paragraph-medium-adaeda bold">Hubungi Kami</div>
						<div class="footer-link-list">
							<a href="tel:081234567890">0812-3456-7890</a>
							<a href="mailto:dapurmamaniar@gmail.com">dapurmamaniar@gmail.com</a>
						</div>
					</div>
				</div>

				<!-- Lokasi -->
				<div class="footer-menu-group">
					<div class="paragraph-medium-adaeda bold">Lokasi Kami</div>
					<div class="map-wrapper">
						<iframe
							src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.853186316902!2d106.84405977504706!3d-6.28302266150072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f26c07fbebbb%3A0xac3c1be61b315996!2sJl.%20Muhamad%20Dahlan%20No.28%2C%20RT.10%2FRW.7%2C%20Pejaten%20Timur%2C%20Ps.%20Minggu%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2012510!5e0!3m2!1sen!2sid!4v1754054410236!5m2!1sen!2sid"
							width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy">
						</iframe>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer Bottom -->
		<div class="p-t-40">
			<div class="flex-c-m flex-w p-b-18 footer-bottom-social" style="justify-content: center; align-items: center; gap: 12px; flex-wrap: wrap;">
				<p class="paragraph-medium-adaeda footer-bottom-follow m-b-0" style="margin: 0; font-size: 1px;">Ikuti kami</p>
				<a href="#" class="fs-20 cl7 hov-cl1 trans-04" style="font-size: 24px;">
					<i class="fa fa-facebook"></i>
				</a>
				<a href="#" class="fs-20 cl7 hov-cl1 trans-04" style="font-size: 24px;">
					<i class="fa fa-instagram"></i>
				</a>
				<a href="#" class="fs-20 cl7 hov-cl1 trans-04" style="font-size: 24px;">
					<i class="fa fa-whatsapp"></i>
				</a>
			</div>

			<p class="stext-107 cl6 txt-center" style="text-align:center;">
				&copy; <script>
					document.write(new Date().getFullYear());
				</script> Dapur Mama Niar. All rights reserved.
			</p>
		</div>

	</div>
</div>