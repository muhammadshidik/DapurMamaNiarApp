<?php
require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php';

if (isset($_POST['submit'])) {
  $name = mysqli_real_escape_string($config, $_POST['name']);
  $description = mysqli_real_escape_string($config, $_POST['description']);
  $price = $_POST['price'];
  $is_available = isset($_POST['is_available']) ? 1 : 0;
} else if (isset($_GET['delete'])) {
  $idDelete = $_GET['delete'];
  $query = mysqli_query($config, "DELETE FROM menu_items WHERE id='$idDelete'");
  header("Location: ?page=menu&delete=success");
  die;
} else if (isset($_GET['edit'])) {
  $idEdit = $_GET['edit'];
  $queryEdit = mysqli_query($config, "SELECT * FROM menu_items WHERE id='$idEdit'");
  $rowEdit = mysqli_fetch_assoc($queryEdit);

  if (isset($_POST['edit'])) {
    $name = mysqli_real_escape_string($config, $_POST['name']);
    $description = mysqli_real_escape_string($config, $_POST['description']);
    $price = $_POST['price'];
    $is_available = isset($_POST['is_available']) ? 1 : 0;
    mysqli_query($config, "UPDATE menu_items SET name='$name', description='$description', price='$price', is_available='$is_available' WHERE id='$idEdit'");

    header("Location: ?page=dashboard&edit=success");
    die;
  }
} else if (isset($_POST['add'])) {

  $name = mysqli_real_escape_string($config, $_POST['name']);
  $description = mysqli_real_escape_string($config, $_POST['description']);
  $price = $_POST['price'];
  $is_available = isset($_POST['is_available']) ? 1 : 0;

  // Proses upload gambar
  $image_name = $_FILES['image']['name'];
  $image_tmp = $_FILES['image']['tmp_name'];
  $image_error = $_FILES['image']['error'];

  // Lokasi penyimpanan gambar
  $upload_dir = 'admin/content/uploads/Foto/';
  $image_url = ''; // Default jika gagal upload

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
        $image_url = $new_image_name;
      }
    }
  }

  // Simpan ke database
  $queryAdd = mysqli_query($config, "INSERT INTO menu_items (name, description, price, image_url, is_available) VALUES ('$name', '$description', '$price', '$image_url', '$is_available')");
  header("Location: ?page=menu&add=success");
  die;
}
?>
<div class="container mt-4">
  <div class="card shadow">
    <div class="card-header">
      <h3><?= isset($_GET['edit']) ? 'Edit' : 'Add' ?> Menu</h3>
    </div>
    <div class="card-body">
      <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Nama Menu</label>
          <input value="<?php echo isset($rowEdit['name']) ? $rowEdit['name'] : '' ?>" type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea id="editor" style="min-height:100px;" name="description" class="form-control" rows="3"><?php echo isset($rowEdit['description']) ? $rowEdit['description'] : '' ?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Harga (Rp)</label>
          <input value="<?php echo isset($rowEdit['price']) ? $rowEdit['price'] : '' ?>" type="number" name="price" class="form-control" min="1000" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Upload Gambar</label>
          <input value="<?php echo isset($rowEdit['image_url']) ? $rowEdit['image_url'] : '' ?>" type="file" name="image" class="form-control" id="validatedCustomFile" required accept=".jpg,.jpeg,.png">
        </div>
        <div class="form-check mb-3">
          <input type="checkbox" class="form-check-input" name="is_available" checked>
          <label class="form-check-label">Tersedia</label>
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