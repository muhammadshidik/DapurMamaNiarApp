<?php
require_once 'admin/controller/koneksi.php';
require_once 'admin/controller/functions.php';

$query = mysqli_query($config, "SELECT * FROM menu_items WHERE is_available = 1 ORDER BY RAND() LIMIT 3");
$featuredItems = mysqli_fetch_all($query, MYSQLI_ASSOC);
?>

<style>
  .hero-section {
    background: linear-gradient(135deg, #f8f9fa, #ffffff);
    padding: 60px 20px;
    border-radius: 20px;
    margin-bottom: 50px;
    text-align: center;
  }

  .hero-section h1 {
    font-size: 2.5rem;
    font-weight: bold;
    color: #2c3e50;
  }

  .hero-section p {
    font-size: 1.1rem;
    color: #555;
    margin-top: 10px;
  }

  .menu-image {
    height: 220px;
    object-fit: cover;
    width: 100%;
    border-top-left-radius: 12px;
    border-top-right-radius: 12px;
  }

  .menu-card {
    border: none;
    border-radius: 12px;
    transition: all 0.3s ease;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.05);
    background-color: var(--bs-card-bg, #fff);
  }

  .menu-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
  }

  .card-title {
    font-weight: 600;
    color: #333;
  }

  .card-text {
    font-size: 0.95rem;
    color: #666;
  }

  .menu-price {
    font-weight: bold;
    color: #28a745;
    margin-top: 10px;
  }

  .btn-order {
    margin-top: auto;
    background-color: #28a745;
    color: white;
    border-radius: 8px;
  }

  .btn-order:hover {
    background-color: #218838;
  }

  .section-title {
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
  }

  .section-subtitle {
    color: #888;
    font-size: 0.95rem;
  }

  .status-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    padding: 6px 12px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
    z-index: 10;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(4px);
  }

  .status-available {
    background-color: rgba(40, 167, 69, 0.9);
  }

  .status-unavailable {
    background-color: rgba(220, 53, 69, 0.9);
  }

  .card-img-wrapper {
    position: relative;
  }

  @media (prefers-color-scheme: dark) {
    .hero-section h1,
    .hero-section p,
    .card-title,
    .card-text,
    .section-title,
    .section-subtitle {
      color: #eee;
    }

    .menu-card {
      background-color: #1e1e1e;
      color: #fff;
    }

    .menu-price {
      color: #90ee90;
    }
  }
</style>

<div class="container mt-5">
  <!-- Hero Section -->
  <!-- Section Title -->
  <div class="text-center mb-4">
    <h2 class="section-title">Menu Terfavorit</h2>
    <p class="section-subtitle">Coba hidangan paling disukai pelanggan kami</p>
  </div>

  <!-- Featured Menu -->
  <div class="row">
    <?php foreach ($featuredItems as $item): ?>
      <div class="col-md-4 mb-4">
        <div class="card menu-card h-100">
          <!-- Gambar dan Status -->
          <div class="card-img-wrapper">
            <div class="status-badge <?= $item['is_available'] ? 'status-available' : 'status-unavailable'; ?>">
              <?= $item['is_available'] ? 'Tersedia' : 'Stok Habis'; ?>
            </div>
            <?php if (!empty($item['image_url'])): ?>
              <img src="admin/content/uploads/Foto/<?= $item['image_url']; ?>" class="menu-image" alt="<?= htmlspecialchars($item['name']); ?>">
            <?php else: ?>
              <img src="admin/content/uploads/Foto/default-food.jpg" class="menu-image" alt="Default Image">
            <?php endif; ?>
          </div>

          <!-- Deskripsi -->
          <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= htmlspecialchars($item['name']); ?></h5>
            <p class="card-text"><?= htmlspecialchars($item['description']); ?></p>
            <div class="menu-price">Rp <?= number_format($item['price'], 0, ',', '.'); ?></div>

            <?php if ($item['is_available']): ?>
              <a href="order.php" class="btn btn-order mt-3">Pesan Sekarang</a>
            <?php else: ?>
              <button class="btn btn-secondary mt-3" disabled>Stok Habis</button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
