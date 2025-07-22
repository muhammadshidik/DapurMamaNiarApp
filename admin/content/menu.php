<?php
require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php';

// Ambil semua data menu
$query = "SELECT * FROM menu_items ORDER BY id DESC";
$result = mysqli_query($config, $query);
?>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header ">
            <h4>Data user</h4>
        </div>
        <div class="card-body">
            <?php include 'admin/controller/alert-data-crud.php' ?>
            <a href="?page=add-menu" class="btn btn-primary mb-3">+ Tambah Menu</a>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Gambar</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td>
                                <img src="admin/content/uploads/Foto=<?= htmlspecialchars($row['image_url']) ?>" width="80" alt="Gambar Menu">
                            </td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['description']) ?></td>
                            <td>Rp<?= number_format($row['price'], 0, ',', '.') ?></td>
                            <td><?= $row['is_available'] ? 'Tersedia' : 'Habis' ?></td>
                            <td>
                                <a href="?page=add-menu&edit=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="?page=add-menu&delete=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus menu ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>