<!DOCTYPE html>
<html lang="en">

<head>
	<title>Hubungi Kami | Dapur Mama Niar</title>
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
									<li><a href="Semua-Produk.php?id_kategori=1">Catering Harian</a></li>
									<li><a href="produk.php?id_kategori=2">Nasi Kotak</a></li>
									<li><a href="produk.php?id_kategori=3">Prasmanan</a></li>
								</ul>
							</li>

							<li>
								<a href="Tentang.php">Tentang Kami</a>
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
			Hubungi Kami
		</h2>
	</section>
	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form>
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Kirimkan Pesan kepada Kami
						</h4>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Alamat email kamu">
							<img class="how-pos4 pointer-none" src="tmp/images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Apa yang bisa kami bantu?"></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Kirim
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Alamat
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Jl. Muhammad Dahlan, No.28, RT.10, RW.007, Kel. Pejaten Timur, Kec. Pasar Minggu, Jakarta Selatan. 12510
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Ayo Bicara
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								+62 896-8475-8768
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Email Kami
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								dapurmamaniar@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Map -->
	<div class="map">
		<div class="size-303" id="google_map" data-map-x="40.691446" data-map-y="-73.886787" data-pin="admin/content/uploads/Foto/image.png" data-scrollwhell="0" data-draggable="1" data-zoom="11"></div>
	</div>



	<!-- Footer -->
	<?php include 'admin/include/footer.php' ?>

	<a href="https://wa.me/6289684758768" target="_blank" class="btn-wa-float" title="Hubungi via WhatsApp">
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
	<script src="https://maps.googleapis.com/maps/api/js?key="></script>
	<script src="tmp/js/map-custom.js"></script>
	<!--===============================================================================================-->
	<script src="tmp/js/main.js"></script>

</body>

</html>