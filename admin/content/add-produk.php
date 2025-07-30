<?php
require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php';

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($config, $_POST['nama_produk']);
  $deskripsi = mysqli_real_escape_string($config, $_POST['deskripsi']);
  $harga = floatval($_POST['harga']);
  $stok = intval($_POST['stok']);
} else if (isset($_GET['delete'])) {
  $idDelete = $_GET['delete'];
  $query = mysqli_query($config, "DELETE FROM produk WHERE id='$idDelete'");
  header("Location: ?page=produk&delete=success");
  die;
} else if (isset($_GET['edit'])) {
  $idEdit = $_GET['edit'];
  $queryEdit = mysqli_query($config, "SELECT * FROM produk WHERE id='$idEdit'");
  $rowEdit = mysqli_fetch_assoc($queryEdit);

  if (isset($_POST['edit'])) {
    $nama_produk = mysqli_real_escape_string($config, $_POST['nama_produk']);
    $deskripsi = mysqli_real_escape_string($config, $_POST['deskripsi']);
    $harga = floatval($_POST['harga']);
    $stok = intval($_POST['stok']);
    $id_kategori = intval($_POST['id_kategori']);

    mysqli_query($config, "UPDATE produk SET nama_produk='$nama_produk', deskripsi='$deskripsi', harga='$harga', id_kategori='$id_kategori', stok='$stok' WHERE id='$idEdit'");
    header("Location: ?page=produk&edit=success");
    die;
  }
} else if (isset($_POST['add'])) {
  $nama_produk = mysqli_real_escape_string($config, $_POST['nama_produk']);
  $deskripsi = mysqli_real_escape_string($config, $_POST['deskripsi']);
  $harga = floatval($_POST['harga']);
  $stok = intval($_POST['stok']);
  $id_kategori  = intval($_POST['id_kategori']);
  // Proses upload gambar
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_error = $_FILES['image']['error'];

  // Lokasi penyimpanan gambar
  $upload_dir = 'admin/content/uploads/Foto/';
  $gambar = ''; // Default jika gagal upload

  if ($image_error === 0) {
    $allowed_ext = ['jpg', 'jpeg', 'png', 'gif'];
    $ext = strtolower(pathinfo($image_name, PATHINFO_EXTENSION));

    if (in_array($ext, $allowed_ext)) {
      $new_image_name = uniqid('menu_', true) . '.' . $ext;
      $upload_path = $upload_dir . $new_image_name;

      // Buat folder jika belum ada
      if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
      }

      // Upload file ke folder
      if (move_uploaded_file($image_tmp, $upload_path)) {
        $gambar = $new_image_name;
      }
    }
  }

  // Simpan ke database
  $queryAdd = mysqli_query($config, "INSERT INTO produk (nama_produk, deskripsi, harga, id_kategori, stok, gambar) VALUES ('$nama_produk', '$deskripsi', '$harga', '$id_kategori', '$stok', '$gambar')");
  header("Location: ?page=produk&add=success");
  die;
}
// Ambil data kategori (pastikan queryCategory didefinisikan)
$queryCategory = mysqli_query($config, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
?>
<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header">
      <h3><?= isset($_GET['edit']) ? 'Edit' : 'Add' ?> Produk</h3>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Nama Produk</label>
          <input type="text" name="nama_produk" class="form-control" required value="<?= $rowEdit['nama_produk'] ?? '' ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea id="editor" name="deskripsi" class="form-control" rows="3" style="min-height:100px;"><?= $rowEdit['deskripsi'] ?? '' ?></textarea>
        </div>

        <div class="form-group mb-3">
          <label for="simple-select2">Kategori</label>
          <select class="form-control select2" id="simple-select2">
            <optgroup label="Pilih Kategori">
                <?php while ($kategori = mysqli_fetch_assoc($queryCategory)) : ?>
              <option value="<?= $kategori['id'] ?>"<?= (isset($rowEdit['id_kategori']) && $rowEdit['id_kategori'] == $kategori['id']) ? 'selected' : '' ?>>
                <?= $kategori['nama_kategori'] ?>
              </option>
            </optgroup>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Harga</label>
          <input type="number" name="harga" class="form-control" required value="<?= $rowEdit['harga'] ?? '' ?>">
        </div>
        <div class="mb-3">
          <label class="form-label">Stok</label>
          <input type="number" name="stok" class="form-control" required value="<?= $rowEdit['stok'] ?? '' ?>">
        </div>
        <div class="form-group mb-3">
          <label for="customFile">Upload Gambar</label>
          <div class="custom-file">
            <input name="image" type="file" class="custom-file-input" id="customFile" accept=".jpg,.jpeg,.png" <?= isset($_GET['edit']) ? '' : 'required' ?>>
            <label class="custom-file-label" for="customFile">Choose file</label>
            <?php if (!empty($rowEdit['gambar'])): ?>
              <small class="text-muted">Gambar saat ini: <?= $rowEdit['gambar'] ?></small>
            <?php endif; ?>
          </div>
        </div>
        <div>
          <button type="submit" class="btn btn-primary" name="<?= isset($_GET['edit']) ? 'edit' : 'add' ?>">
            <?= isset($_GET['edit']) ? 'Simpan Perubahan' : 'Tambah Produk' ?>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>