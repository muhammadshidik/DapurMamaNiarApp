<header>
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

    <div class="wrap-menu-desktop ">
      <nav class="limiter-menu-desktop container">

        <!-- Logo desktop -->
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
              <a href="Tentang.php">Tentang Kami</a>
            </li>

            <li>
              <a href="Kontak.php">Hubungi Kami</a>
            </li>
          </ul>
        </div>

        <!-- Menu desktop -->
        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m">
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
        <a href="Tentang.php">Tentang Kami</a>
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
        <img src="tmp/images/icons/icon-close2.png" alt="CLOSE">
      </button>

      <form class="wrap-search-header flex-w p-l-10">
        <button class="flex-c-m trans-04">
          <i class="zmdi zmdi-search"></i>
        </button>
        <input class="plh3" type="text" name="search" placeholder="Cari apa yang ingin dibantu..">
      </form>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</header>
<script>
  // Tambahkan kode ini di dalam tag <script> di file produk.php
  document.addEventListener('DOMContentLoaded', function() {
    // Fungsi untuk mendapatkan parameter dari URL
    function getUrlParameter(name) {
      name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
      var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
      var results = regex.exec(location.search);
      return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    const idKategoriDariUrl = getUrlParameter('id_kategori');

    if (idKategoriDariUrl) {
      // Temukan tombol filter yang sesuai
      const filterButton = document.querySelector(`.filter-tope-group button[data-filter=".category-${idKategoriDariUrl}"]`);

      if (filterButton) {
        // Simulasikan klik pada tombol filter
        filterButton.click();

        // Gulir halaman ke elemen kategori produk
        const targetElement = document.querySelector('.p-b-10 h5.ltext-102');
        if (targetElement) {
          targetElement.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
          });
        }
      }
    }
  });
</script>