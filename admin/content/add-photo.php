<?php
include 'admin/controller/administrator-validation.php';
// Letakkan semua logika PHP di bagian atas agar lebih rapi.
$pesan_sukses = "";
$pesan_error = "";
$path_gambar_tampil = "";

// 1. Cek apakah tombol 'upload' ditekan & ada file yang dipilih
if (isset($_POST['upload']) && isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    
    // 2. Tentukan folder tujuan upload
    $target_dir = "uploads/";

    // Pastikan folder 'uploads' ada, jika tidak, coba buat.
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    // 3. Ambil nama file asli dengan aman menggunakan basename()
    $namaBerkas = basename($_FILES["file"]["name"]);
    
    // 4. Buat path tujuan lengkap (folder + nama file)
    $tujuanFile = $target_dir . $namaBerkas;

    // 5. Pindahkan file dari lokasi sementara ke tujuan akhir
    //    Format yang benar: move_uploaded_file(DARI, KE)
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $tujuanFile)) {
        
        // Jika berhasil, siapkan pesan dan path gambar untuk ditampilkan
        $pesan_sukses = "File <b>" . htmlspecialchars($namaBerkas) . "</b>, Berhasil di Upload.";
        $path_gambar_tampil = $tujuanFile; // Path ini akan digunakan di tag <img>

    } else {
        $pesan_error = "Maaf, terjadi error saat memindahkan file.";
    }

} elseif (isset($_POST['upload'])) {
    $pesan_error = "Tidak ada file yang dipilih atau terjadi error saat upload.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Gambar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-header">Form Upload Gambar</div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="fileInput" class="form-label"> Ambil Gambar :</label>
                            <input class="form-control" type="file" name="file" id="fileInput" required>
                        </div>
                       <div class="mb-3">
                            <input class="btn btn-success" type="submit" name="upload" value="Simpan">
                        </div>
                    </form>
                    
                    <hr>

                    <?php if ($pesan_sukses): ?>
                        <div class="alert alert-success">
                            <?= $pesan_sukses ?>
                        </div>
                        <img src="<?= htmlspecialchars($path_gambar_tampil) ?>" class="img-fluid rounded" alt="Gambar yang diupload">
                    <?php endif; ?>

                    <?php if ($pesan_error): ?>
                        <div class="alert alert-danger">
                            <?= $pesan_error ?>
                        </div>
                    <?php endif; ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>