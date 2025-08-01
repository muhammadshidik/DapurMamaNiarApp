<?php
require_once './admin/controller/koneksi.php';
require_once 'admin/controller/functions.php';

// Mengambil data produk beserta nama kategorinya dengan JOIN
$query = "SELECT produk.*, kategori.nama_kategori 
          FROM produk 
          JOIN kategori ON produk.id_kategori = kategori.id 
          ORDER BY produk.id DESC";
$result = mysqli_query($config, $query);

?>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h4>Data Menu</h4>
        </div>
        <div class="card-body">
            <?php include 'admin/controller/alert-data-crud.php'; // Semicolon added 
            ?>
            <a href="?page=add-produk" class="btn btn-primary mb-3 btn-sm">Tambah produk</a>

            <table class="table table-borderless table-hover mt-3 datatable "  id="myTable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Nama Kategori</th>
                        <th>Stok</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    // Check if there are any rows returned
                    if (mysqli_num_rows($result) > 0) :
                        while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row['nama_produk']) ?></td>
                                <td><?= htmlspecialchars($row['deskripsi']) ?></td>
                                <td><?= htmlspecialchars($row['harga']) ?></td>
                                <td><?= htmlspecialchars($row['nama_kategori']) ?></td>
                                <td><?= htmlspecialchars($row['stok']) ?></td>
                                <td>
                                    <?php
                                    // Construct the image path
                                    $imagePath = 'admin/content/uploads/Foto/' . htmlspecialchars($row['gambar']);
                                    // Check if the image file exists, otherwise use a default placeholder
                                    if (!file_exists($imagePath) || empty($row['gambar'])) {
                                        $imagePath = 'admin/content/uploads/Foto/default-food.jpg'; // Path to a default image
                                    }
                                    ?>
                                    <img src="<?= $imagePath ?>" width="80" alt="<?= htmlspecialchars($row['nama_produk']) ?>">
                                </td>
                                <td>
                                    <a href="?page=add-produk&edit=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="?page=add-produk&delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus menu ini?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endwhile;
                    else : ?>
                        <tr>
                            <td colspan="8" class="text-center">Data Tidak Ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
