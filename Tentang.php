<!DOCTYPE html>
<html lang="en">

<head>
	<title>Tentang Kami | Dapur Mama Niar</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="admin/content/uploads/Foto/logo-dapur-mama-niar.png" type="image/x-icon">
	<?php include 'admin/include/css.php' ?>
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
</head>

<body class="animsition">

	<!-- Header -->
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
						<img src="admin/content/uploads/Foto/logo-dpn1.png" alt="IMG-LOGO">
					</div>
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="Beranda.php">Beranda</a>
							</li>

							<li>
								<a href="Semua-Produk.php">Produk Kami</a>
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
					</div>
				</nav>
			</div>
		</div>
		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<img src="admin/content/uploads/Foto/logo-dpn1.png" alt="IMG-LOGO">
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
					<a type="button" href="index.php" class="btn btn-outline-white" style=" border-radius: 50px !important;">
						Masuk untuk login
					</a>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">

			<ul class="main-menu-m">
				<li>
					<a href="Beranda.php">Beranda</a>
				</li>
				<li>
					<a href="Semua-Produk.php">Produk Kami</a>
				</li>
				<li>
					<a href="Kontak.php">Hubungi Kami</a>
				</li>
			</ul>
		</div>

		<!-- mobile -->
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
			Tentang Kami
		</h2>
	</section>


	<!-- Content page -->
	<section class="bg0 p-t-75 p-b-120">
		<div class="container">
			<div class="row p-b-148">
				<div class="col-md-7 col-lg-8">
					<div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Untuk Rasa Kami Juara
						</h3>

						<p class="stext-113 cl6 p-b-26">
							Kekayaan kuliner Nusantara selalu menjadi sumber inspirasi yang tak pernah habis bagi industri makanan di Indonesia. Semangat inilah yang melahirkan Dapur Mama Niar, sebuah unit usaha katering yang membawa cita rasa rumahan dengan sentuhan profesional.

							Nama Mama Niar dipilih sebagai bentuk penghormatan terhadap sosok ibu yang menjadi inspirasi utama dalam memasak—dengan penuh cinta, perhatian, dan resep warisan keluarga. Setiap hidangan yang kami sajikan lahir dari pengalaman, rasa, dan kehangatan dapur rumah.

							Dapur Mama Niar mengkhususkan diri dalam layanan katering menu tradisional Indonesia, baik untuk kebutuhan personal maupun korporat. Kami melayani berbagai jenis acara seperti pernikahan, syukuran, ulang tahun, hingga acara kantor dan kegiatan pemerintahan di wilayah Jakarta, Bogor, Depok, Tangerang, dan Bekasi.

							Dengan pengalaman dalam menyediakan ribuan porsi setiap harinya, Dapur Mama Niar dikenal karena rasa masakannya yang autentik dan konsisten. Kami berkomitmen menjaga kualitas bahan, kebersihan proses produksi, serta rasa yang selalu menggugah selera—karena kami percaya, makanan yang baik dimulai dari niat yang tulus.

							Mari rasakan kelezatan sajian khas Indonesia dari Dapur Mama Niar — masakan rumah, rasa juara.
						</p>
						<p class="stext-113 cl6 p-b-26">
							Anda punya pertanyaan? Kunjungi kami di dapur mama niar, jl.Muhammad Dahlan, RT.10, RW.07, Kel. Pejaten Timur, kec. Pasar Minggu, Jakarta Selatan atau hubungi kami di (+1) 96 716 6879
						</p>

					</div>
				</div>

				<div class="col-11 col-md-5 col-lg-4 m-lr-auto">
					<div class="how-bor1 ">
						<div class="hov-img0">
							<img src="tmp/images/about-01.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="order-md-2 col-md-7 col-lg-8 p-b-30">
					<div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
						<h3 class="mtext-111 cl2 p-b-16">
							Misi Kami
						</h3>

						<p class="stext-113">
							Di Dapur Mama Niar, kami memiliki misi untuk:

							1. Menghadirkan cita rasa Nusantara yang otentik ke setiap meja makan,
							dengan resep turun-temurun yang diracik penuh cinta dan ketelitian.

							2. Menjadi mitra kuliner terpercaya untuk kebutuhan pribadi,
							keluarga, perusahaan, hingga instansi pemerintahan, dengan
							layanan katering yang berkualitas, higienis, dan tepat waktu.

							3. Mendukung pelestarian kuliner Indonesia melalui inovasi menu yang tetap
							menghormati tradisi dan kekayaan rasa dari berbagai daerah di Tanah Air.

							4. Memberikan pengalaman kuliner yang memuaskan, baik dari rasa, penyajian,
							hingga layanan pelanggan — karena kepuasan Anda adalah semangat kami.
						</p>

						<div class="bor16 p-l-29 p-b-9 m-t-22">
							<p class="stext-114 cl6 p-r-40 p-b-11">
								Creativity is just connecting things. When you ask creative people how they did something, they feel a little guilty because they didn't really do it, they just saw something. It seemed obvious to them after a while.
							</p>

							<span class="stext-111 cl8">
								- Steve Job’s
							</span>
						</div>
					</div>
				</div>

				<div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
					<div class="how-bor2">
						<div class="hov-img0">
							<img src="tmp/images/about-02.jpg" alt="IMG">
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



	<!-- Footer -->
	<?php include 'admin/include/footer.php' ?>
	<a href="https://wa.me/6281234567890" target="_blank" class="btn-wa-float" title="Hubungi via WhatsApp">
		<span class="symbol-btn-wa">
			<i class="zmdi zmdi-whatsapp"></i>
		</span>
	</a>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!--===============================================================================================-->
	<script src="tmp/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="tmp/vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="tmp/vendor/bootstrap/js/popper.js"></script>
	<script src="tmp/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="tmp/vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function() {
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
	<!--===============================================================================================-->
	<script src="tmp/vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<!--===============================================================================================-->
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
	<!--===============================================================================================-->
	<script src="tmp/js/main.js"></script>

</body>

</html>