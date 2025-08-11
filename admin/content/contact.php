<?php
$query = mysqli_query($config, "SELECT * FROM contacts ORDER BY id DESC");
$row = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $queryDelete = mysqli_query($config, "DELETE FROM contacts WHERE id='$id'");
    header("location:contact.php?hapus=berhasil");
}
?>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header">
            <h4>Data Kategori</h4>
        </div>
        <div class="card-body">
            <?php include 'admin/controller/alert-data-crud.php'; // Semicolon added 
            ?>

            <table id="table" class="table table-borderless table-hover mt-3 datatable">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Pesan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                    foreach ($row as $key => $data): ?>
                        <tr>
                            <!-- <td><?= $i++ ?></td> -->
                            <td><?= $key + 1 ?></td>
                            <td><?= $data['name'] ?></td>
                            <td><?= $data['email'] ?></td>
                            <td><?= $data['message'] ?></td>
                            <td><a href="?page=balas-pesan&idpesan=<?php echo $data['id'] ?>" class="btn btn-success btn-sm">Balas Pesan</a>
                                <a href="?page=contact&delete=<?= $data['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin hapus menu ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>