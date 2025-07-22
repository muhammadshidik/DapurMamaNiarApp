<?php

require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php';

// Proteksi: hanya admin boleh akses
session_start();
if (!isset($_SESSION['id_level']) || $_SESSION['level'] !== 1) {
    echo "<script>alert('Akses ditolak.'); location.href='index.php';</script>";
    exit;
}

// Proses simpan menu
if (isset($_POST['submit'])) {
  $item_name = mysqli_real_escape_string($config, $_POST['item_name']);
  $description = mysqli_real_escape_string($config, $_POST['description']);
  $price = $_POST['price'];
  $is_available = isset($_POST['is_available']) ? 1 : 0;

  // Upload gambar
  $image = $_FILES['image']['name'];
  $tmp = $_FILES['image']['tmp_name'];
  $ext = pathinfo($image, PATHINFO_EXTENSION);
  $allowed = ['jpg', 'jpeg', 'png'];
  $new_name = 'menu_' . time() . '.' . $ext;

  if (!empty($image) && in_array(strtolower($ext), $allowed)) {
    move_uploaded_file($tmp, "../assets/images/" . $new_name);
  } else {
    $new_name = null; // gambar tidak diupload atau invalid
  }

  // Simpan ke database
  $query = "INSERT INTO menu_items (item_name, description, price, image_url, is_available)
            VALUES ('$item_name', '$description', '$price', '$new_name', '$is_available')";
  $insert = mysqli_query($config, $query);

  if ($insert) {
    echo "<script>alert('Menu berhasil ditambahkan'); window.location='manage_menu.php';</script>";
  } else {
    echo "<script>alert('Gagal menambahkan menu');</script>";
  }
}
?>

<div class="container mt-5">
  <h2>Tambah Menu Baru</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama Menu</label>
      <input type="text" name="item_name" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="description" class="form-control" rows="3" required></textarea>
    </div>
    <div class="mb-3">
      <label>Harga (Rp)</label>
      <input type="number" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Gambar Menu</label>
      <input type="file" name="image" class="form-control" accept=".jpg,.jpeg,.png">
    </div>
    <div class="form-check mb-3">
      <input type="checkbox" name="is_available" class="form-check-input" id="availCheck" checked>
      <label for="availCheck" class="form-check-label">Tersedia</label>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Simpan Menu</button>
    <a href="manage_menu.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>

