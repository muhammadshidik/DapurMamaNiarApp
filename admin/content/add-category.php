<?php
require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php';

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($config, $_POST['nama_kategori']);
  $deskripsi_kategori = mysqli_real_escape_string($config, $_POST['deskripsi_kategori']);
} else if (isset($_GET['delete'])) {
  $idDelete = $_GET['delete'];
  $query = mysqli_query($config, "DELETE FROM kategori WHERE id='$idDelete'");
  header("Location: ?page=category&delete=success");
  die;
} else if (isset($_GET['edit'])) {
  $idEdit = $_GET['edit'];
  $queryEdit = mysqli_query($config, "SELECT * FROM kategori WHERE id='$idEdit'");
  $rowEdit = mysqli_fetch_assoc($queryEdit);

  if (isset($_POST['edit'])) {
    $nama_kategori = mysqli_real_escape_string($config, $_POST['nama_kategori']);
    $deskripsi_kategori = mysqli_real_escape_string($config, $_POST['deskripsi_kategori']);
    mysqli_query($config, "UPDATE kategori SET nama_kategori='$nama_kategori', deskripsi_kategori='$deskripsi_kategori' WHERE id='$idEdit'");

    header("Location: ?page=category&edit=success");
    die;
  }
} else if (isset($_POST['add'])) {

  $nama_kategori = mysqli_real_escape_string($config, $_POST['nama_kategori']);
  $deskripsi_kategori = mysqli_real_escape_string($config, $_POST['deskripsi_kategori']);

  // Proses upload gambar
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_error = $_FILES['image']['error'];

  // Lokasi penyimpanan gambar
  $upload_dir = 'admin/content/uploads/Foto/';
  $gambar_kategori = ''; // Default jika gagal upload

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
        $gambar_kategori = $new_image_name;
      }
    }
  }

  // Simpan ke database
  $queryAdd = mysqli_query($config, "INSERT INTO kategori (nama_kategori, deskripsi_kategori, gambar_kategori) VALUES ('$nama_kategori', '$deskripsi_kategori', '$gambar_kategori')");
  header("Location: ?page=category&add=success");
  die;
}
?>
<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header">
      <h3><?= isset($_GET['edit']) ? 'Edit' : 'Add' ?> Kategori</h3>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Nama Kategori</label>
          <input value="<?php echo isset($rowEdit['nama_kategori']) ? $rowEdit['nama_kategori'] : '' ?>" type="text" name="nama_kategori" class="form-control" required>
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