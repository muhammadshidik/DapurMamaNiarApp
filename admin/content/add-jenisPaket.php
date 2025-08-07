<?php
require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php';

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($config, $_POST['nama_paket']);
  $deskripsi = mysqli_real_escape_string($config, $_POST['deskripsi']);
} else if (isset($_GET['delete'])) {
  $idDelete = $_GET['delete'];
  $query = mysqli_query($config, "DELETE FROM paket_catering WHERE id='$idDelete'");
  header("Location: ?page=jenisPaket&delete=success");
  die;
} else if (isset($_GET['edit'])) {
  $idEdit = $_GET['edit'];
  $queryEdit = mysqli_query($config, "SELECT * FROM paket_catering WHERE id='$idEdit'");
  $rowEdit = mysqli_fetch_assoc($queryEdit);

  if (isset($_POST['edit'])) {
    $nama_paket = mysqli_real_escape_string($config, $_POST['nama_paket']);
    $deskripsi = mysqli_real_escape_string($config, $_POST['deskripsi']);
    mysqli_query($config, "UPDATE paket_catering SET nama_paket='$nama_paket', deskripsi='$deskripsi' WHERE id='$idEdit'");
    header("Location: ?page=jenisPaket&edit=success");
    die;
  }
} else if (isset($_POST['add'])) {
  $nama_paket = mysqli_real_escape_string($config, $_POST['nama_paket']);
  $deskripsi = mysqli_real_escape_string($config, $_POST['deskripsi']);
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
  $queryAdd = mysqli_query($config, "INSERT INTO paket_catering (nama_paket, deskripsi, gambar) VALUES ('$nama_paket', '$deskripsi', '$gambar')");
  header("Location: ?page=jenisPaket&add=success");
  die;
}
?>
<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header">
      <h3><?= isset($_GET['edit']) ? 'Edit' : 'Add' ?> Paket</h3>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Nama</label>
          <input value="<?php echo isset($rowEdit['nama_paket']) ? $rowEdit['nama_paket'] : '' ?>" type="text" name="nama_paket" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea id="editor" style="min-height:100px;" name="deskripsi" class="form-control" rows="3"><?php echo isset($rowEdit['deskripsi']) ? $rowEdit['deskripsi'] : '' ?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Upload Gambar</label>
          <input name="gambar" value="<?php echo isset($rowEdit['gambar']) ? $rowEdit['gambar'] : '' ?>" type="file" name="image" class="form-control" id="validatedCustomFile" required accept=".jpg,.jpeg,.png">
        </div>
        <div class="">
          <button type="submit" class="btn btn-primary btn-s"
            name="<?php echo isset($_GET['edit']) ? 'edit' : 'add' ?>">
            <?php echo isset($_GET['edit']) ? 'Simpan' : 'Add' ?>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>