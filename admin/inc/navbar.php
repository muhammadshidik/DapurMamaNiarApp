  <?php
    require_once 'admin/controller/koneksi.php';
    // Memanggil file yang berisi fungsi-fungsi tambahan
    require_once 'admin/controller/functions.php';
    $navbarID = $_SESSION['id'];
    $queryNavbar = mysqli_query($config, "SELECT * FROM user WHERE id = '$navbarID'");
    $dataNavbar = mysqli_fetch_assoc($queryNavbar);
    ?>
  <nav class="navbar navbar-expand-lg navbar-light bg-white flex-row border-bottom shadow">
      <div class="container-fluid">
          <a class="navbar-brand mx-lg-1 mr-0" href="./index.html">
              <img src="admin/content/uploads/Foto/dpn.png" alt="Logo" style="height: 52px; width: 52px; margin-right: 10px;">
              <span class="bold fs-5 text-body">Dapur Mama Niar</span>
          </a>
          <button class="navbar-toggler mt-2 mr-auto toggle-sidebar text-muted">
              <i class="fe fe-menu navbar-toggler-icon"></i>
          </button>
          <div class="navbar-slide bg-white ml-lg-4" id="navbarSupportedContent">
              <a href="#" class="btn toggle-sidebar d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
                  <i class="fe fe-x"><span class="sr-only"></span></i>
              </a>
              <ul class="navbar-nav mr-auto">
                  <?php if ($dataNavbar['id_level'] == 1) : ?>
                      <li class="nav-item">
                          <a class="nav-link" href="hello.php">
                              <span class="ml-lg-2">Beranda</span>
                              <!-- <span class="badge badge-pill badge-primary">New</span> -->
                          </a>
                      </li>
                      <li class="nav-item dropdown">
                          <a href="#" id="ui-elementsDropdown" class="dropdown-toggle nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="ml-lg-2">Menu admin</span>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="ui-elementsDropdown">
                              <a class="nav-link pl-lg-2" href="?page=user">
                                  <span class="ml-1" <?= (isset($_GET['page']) && in_array($_GET['page'], ['user', 'add-user'])) ? 'class="active"' : '' ?>>Menu User</span>
                              </a>
                              <a class="nav-link pl-lg-2" href="?page=level">
                                  <span class="ml-1" <?= (isset($_GET['page']) && in_array($_GET['page'], ['level', 'add-level'])) ? 'class="active"' : '' ?>>Menu Role</span>
                              </a>
                              <a class="nav-link pl-lg-2" href="?page=pelanggan">
                                  <span class="ml-1" <?= (isset($_GET['page']) && in_array($_GET['page'], ['pelanggan', 'add-pelanggan'])) ? 'class="active"' : '' ?>>Data Pelanggan
                                  </span>
                              </a>
                                  <a class="nav-link pl-lg-2" href="?page=produk">
                                  <span class="ml-1" <?= (isset($_GET['page']) && in_array($_GET['page'], ['produk', 'add-produk'])) ? 'class="active"' : '' ?>>Data Produk Makanan
                                  </span>
                              </a>
                              </a>
                                  <a class="nav-link pl-lg-2" href="?page=category">
                                  <span class="ml-1" <?= (isset($_GET['page']) && in_array($_GET['page'], ['category', 'add-category'])) ? 'class="active"' : '' ?>>Data Kategori Makanan
                                  </span>
                              </a>
                                </a>
                                  <a class="nav-link pl-lg-2" href="?page=jenisPaket">
                                  <span class="ml-1" <?= (isset($_GET['page']) && in_array($_GET['page'], ['jenisPaket', 'add-jenisPaket'])) ? 'class="active"' : '' ?>>Data Paket Makanan
                                  </span>
                              </a>
                          </div>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="?page=menu">
                              <span class="ml-lg-2">Transaksi</span>
                              <span class="badge badge-pill badge-primary"></span>
                          </a>
                      </li>
                      <li class="nav-item dropdown more">
                          <a class="dropdown-toggle more-horizontal nav-link" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="ml-2 sr-only">More</span>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="moreDropdown">
                              <li class="nav-item dropdown">
                                  <a class="dropdown-toggle nav-link pl-lg-2" href="#" data-toggle="collapse" id="pagesDropdown" aria-expanded="false">
                                      <span class="ml-1">Pages</span>
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="pagesDropdown">
                                      <a class="nav-link pl-lg-2" href="./page-orders.html">
                                          <span class="ml-1">Orders</span>
                                      </a>
                                      <a class="nav-link pl-lg-2" href="./page-timeline.html">
                                          <span class="ml-1">Timeline</span>
                                      </a>
                                      <a class="nav-link pl-lg-2" href="./page-invoice.html">
                                          <span class="ml-1">Invoice</span>
                                      </a>
                                      <a class="nav-link pl-lg-2" href="./page-404.html">
                                          <span class="ml-1">Page 404</span>
                                      </a>
                                      <a class="nav-link pl-lg-2" href="./page-500.html">
                                          <span class="ml-1">Page 500</span>
                                      </a>
                                      <a class="nav-link pl-lg-2" href="./page-blank.html">
                                          <span class="ml-1">Blank</span>
                                      </a>
                                  </ul>
                              </li>
                              <li class="nav-item dropdown">
                                  <a class="dropdown-toggle nav-link pl-lg-2" href="#" data-toggle="collapse" id="authDropdown" aria-expanded="false">
                                      <span class="ml-1">Authentication</span>
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="authDropdown">
                                      <a class="nav-link pl-lg-2" href="./auth-login.html"><span class="ml-1">Login 1</span></a>
                                      <a class="nav-link pl-lg-2" href="./auth-login-half.html"><span class="ml-1">Login 2</span></a>
                                      <a class="nav-link pl-lg-2" href="./auth-register.html"><span class="ml-1">Register</span></a>
                                      <a class="nav-link pl-lg-2" href="./auth-resetpw.html"><span class="ml-1">Reset Password</span></a>
                                      <a class="nav-link pl-lg-2" href="./auth-confirm.html"><span class="ml-1">Confirm Password</span></a>
                                  </ul>
                              </li>
                              <li class="nav-item dropdown">
                                  <a class="dropdown-toggle nav-link pl-lg-2" href="#" data-toggle="collapse" id="layoutsDropdown" aria-expanded="false">
                                      <span class="ml-1">Layouts</span>
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="layoutsDropdown">
                                      <a class="nav-link pl-lg-2" href="./index.html"><span class="ml-1">Default</span></a>
                                      <a class="nav-link pl-lg-2" href="./index-horizontal.html"><span class="ml-1">Top Navigation</span></a>
                                      <a class="nav-link pl-lg-2" href="./index-boxed.html"><span class="ml-1">Boxed</span></a>
                                  </ul>
                              </li>
                          </ul>
                      </li>
              </ul>
          </div>
          <form class="form-inline ml-md-auto d-none d-lg-flex searchform text-muted">
              <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Cari.." aria-label="Search">
          </form>
          <ul class="navbar-nav d-flex flex-row mr-2">
              <li class="nav-item mr-2">
                  <a class="nav-link text-muted my-2" href="./#" id="modeSwitcher" data-mode="dark">
                      <i class="fe fe-sun fe-16"></i>
                  </a>
              </li>
              <li class="nav-item mr-2">
                  <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                      <i class="fe fe-grid fe-16"></i>
                  </a>
              </li>
              <li class="nav-item nav-notif mr-2">
                  <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
                      <i class="fe fe-bell fe-16"></i>
                      <span class="dot dot-md bg-success"></span>
                  </a>
              </li>
              <li class="nav-item dropdown ml-lg-0">
                  <a class="nav-link dropdown-toggle text-muted" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="avatar avatar-sm mt-2">
                          <img src="<?= !empty($rowNav['profile_picture']) && file_exists('admin/img/profile_picture/' . $rowNav['profile_picture']) ? 'admin/img/profile_picture/' . $rowNav['profile_picture'] : 'https://placehold.co/100' ?> " alt="..." class="avatar-img rounded-circle">
                      </span>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                      <li class="nav-item">
                          <a class="nav-link pl-3" href="#">Settings</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link pl-3" href="?page=my-profile">Profile</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link pl-3" href="#">Activities</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link pl-3" href="index.php">Keluar</a>
                      </li>
                  </ul>
              </li>
          <?php endif; ?>
          </ul>
      </div>
  </nav>