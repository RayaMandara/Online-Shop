<?php
include '../includes/db_connect.php';

// --- Konfigurasi pagination ---
$limit = 3; // jumlah produk per halaman
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Ambil total produk
$totalResult = $conn->query("SELECT COUNT(*) AS total FROM products");
$totalRows = $totalResult->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $limit);

// Ambil produk sesuai halaman aktif
$products = $conn->query("SELECT * FROM products ORDER BY id LIMIT $limit OFFSET $offset");
?>
<style>
  /* === Scentify Pagination Style === */
.pagination {
  --bs-pagination-color: #000;
  --bs-pagination-bg: #fff;
  --bs-pagination-border-color: #ccc;
  --bs-pagination-hover-color: #fff;
  --bs-pagination-hover-bg: #000;
  --bs-pagination-hover-border-color: #000;
  --bs-pagination-active-color: #fff;
  --bs-pagination-active-bg: #222;
  --bs-pagination-active-border-color: #222;
  border-radius: 10px;
}


</style>

<body>
  <section class="shop-section py-5" style="margin-top: 80px;" id="shop">
    <div class="container">
      <h2 class="text-center mb-5 fw-bold">Our Collection</h2>
      <div class="row g-4 justify-content-center">

        <?php if ($products && $products->num_rows > 0): ?>
          <?php while ($row = $products->fetch_assoc()): ?>
            <div class="col-md-4 col-sm-6">
              <div class="card shadow-sm border-0">
                <img src="../admin/uploads/<?= $row['image'] ?>"
                  class="card-img-top"
                  alt="<?= $row['name'] ?>"
                  style="height: 400px; object-fit: cover;">
                <div class="card-body text-center">
                  <h5 class="card-title fw-bold p-3"><?= $row['name'] ?></h5>
                  <a href="product-detail.php?id=<?= $row['id'] ?>" class="btn btn-dark">View Details</a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else: ?>
          <p class="text-center">No products found.</p>
        <?php endif; ?>
      </div>

      <!-- Pagination -->
      <nav aria-label="Page navigation example" class="mt-5">
        <ul class="pagination justify-content-center">
          <!-- Tombol Sebelumnya -->
          <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $page - 1 ?>#shop" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>

          <!-- Nomor Halaman -->
          <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
              <a class="page-link" href="?page=<?= $i ?>#shop"><?= $i ?></a>
            </li>
          <?php endfor; ?>

          <!-- Tombol Berikutnya -->
          <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
            <a class="page-link" href="?page=<?= $page + 1 ?>#shop" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>

        </ul>
      </nav>
    </div>
  </section>
</body>