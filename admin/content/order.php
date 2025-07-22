<?php
require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php';

// Menangani penambahan item ke keranjang
if (isset($_POST['add_to_cart'])) {
  $item_id = $_POST['item_id'];
  $item_name = $_POST['item_name'];
  $price = $_POST['price'];
  $quantity = $_POST['quantity'];

  $cart_item = [
    'item_id' => $item_id,
    'item_name' => $item_name,
    'price' => $price,
    'quantity' => $quantity
  ];

  $_SESSION['cart'][] = $cart_item;
}
?>

<div class="container mt-5">
  <h2 class="mb-4">Keranjang Pesanan Anda</h2>

  <?php if (!empty($_SESSION['cart'])): ?>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Menu</th>
          <th>Harga</th>
          <th>Jumlah</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total = 0;
        foreach ($_SESSION['cart'] as $item):
          $subtotal = $item['price'] * $item['quantity'];
          $total += $subtotal;
        ?>
          <tr>
            <td><?= htmlspecialchars($item['item_name']); ?></td>
            <td>Rp <?= number_format($item['price'], 0, ',', '.'); ?></td>
            <td><?= $item['quantity']; ?></td>
            <td>Rp <?= number_format($subtotal, 0, ',', '.'); ?></td>
          </tr>
        <?php endforeach; ?>
        <tr>
          <th colspan="3" class="text-end">Total</th>
          <th>Rp <?= number_format($total, 0, ',', '.'); ?></th>
        </tr>
      </tbody>
    </table>

    <h4 class="mt-4">Informasi Pengiriman</h4>
    <form action="../process/order_process.php" method="post">
      <div class="mb-3">
        <label>Tanggal Pengiriman</label>
        <input type="date" name="delivery_date" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Waktu Pengiriman</label>
        <input type="time" name="delivery_time" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Alamat Lengkap</label>
        <textarea name="delivery_address" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
        <label>Catatan Tambahan (Opsional)</label>
        <textarea name="notes" class="form-control"></textarea>
      </div>
      <button type="submit" name="submit_order" class="btn btn-primary">Konfirmasi dan Pesan</button>
    </form>
  <?php else: ?>
    <div class="alert alert-info">Keranjang Anda masih kosong.</div>
  <?php endif; ?>
</div>


