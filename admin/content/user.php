<?php
include 'admin/controller/administrator-validation.php';
$queryData = mysqli_query($config, "SELECT user.id, user.username, user.email, level.level_name FROM user LEFT JOIN level ON user.id_level = level.id ORDER BY user.id_level ASC, user.updated_at DESC");
?>
<div class="container">
<div class="card shadow">
    <div class="card-header ">
        <h4>Data user</h4>
    </div>
    <div class="card-body">
        <?php include 'admin/controller/alert-data-crud.php' ?>
        <div align="right" class="button-action">
            <a href="?page=tambah-user" class="btn btn-primary btn-sm"><i class='bx bx-plus bx-22px'>Tambah user</i></a>
        </div>
        <table  id="myTable"  class="table table-borderless table-hover  mt-3 datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($rowData = mysqli_fetch_assoc($queryData)) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= isset($rowData['username']) ? $rowData['username'] : '-' ?></td>
                          <td><?= isset($rowData['email']) ? $rowData['email'] : '-' ?></td>
                        <td>
                            <a href="?page=tambah-user&edit=<?php echo $rowData['id'] ?>">
                                <button class="btn btn-secondary btn-sm">
                                  Ubah
                                </button>
                            </a>
                            <a onclick="return confirm ('Apakah anda yakin akan menghapus data ini?')"
                                href="?page=tambah-user&delete=<?php echo $rowData['id'] ?>">
                                <button class="btn btn-danger btn-sm">
                                   Hapus
                                </button>
                            </a>
                        </td>
                    </tr>
                <?php endwhile; // End While 
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>