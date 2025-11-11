<?php
include '../includes/db_connect.php';

if (!isset($_GET['id'])) {
  header("Location: home.php");
  exit;
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM products WHERE id = $id");
if (!$result || $result->num_rows === 0) {
  echo "<p class='text-center mt-5'>❌ Product not found.</p>";
  exit;
}

$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($product['name']) ?> - Scentify</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../assets/css/product-detail.css">
</head>

<body>

  <div class="container py-5">
    <a href="home.php#shop" class="btn btn-outline-dark mb-4">&larr; Back</a>

    <div class="row align-items-center">
      <div class="col-md-6 mb-4 mb-md-0">
        <img src="../admin/uploads/<?= htmlspecialchars($product['image']) ?>"
          class="product-img shadow-sm"
          alt="<?= htmlspecialchars($product['name']) ?>">
      </div>

      <div class="col-md-6">
        <div class="product-details">
          <h1 class="fw-bold mb-3"><?= htmlspecialchars($product['name']) ?></h1>
          <h4 class="text-muted mb-4"><span class="fw-bold" style="color: #d4af37;">IDR<?= htmlspecialchars($product['price']) ?>K</span></h4>
          <p class="mb-4"><?= nl2br(htmlspecialchars($product['description'])) ?></p>

          <hr>
          <h5 class="fw-bold mb-3">Fragrance Notes</h5>
          <ul class="list-unstyled">
            <li><strong>Top Notes:</strong> <?= htmlspecialchars($product['top_notes'] ?? '-') ?></li>
            <li><strong>Middle Notes:</strong> <?= htmlspecialchars($product['middle_notes'] ?? '-') ?></li>
            <li><strong>Base Notes:</strong> <?= htmlspecialchars($product['base_notes'] ?? '-') ?></li>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-dark mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Add to 🛒Cart
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">:(</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    We're sorry, online shopping isn't available yet.
                    But you can still buy your favorite perfumes offline, just visit our store via Google Maps.
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <a href="https://maps.app.goo.gl/f51fykZB9zHyj9vp9" target="_blank"
                      rel="noopener noreferrer" class="btn btn-primary">Find Us on Google Maps</a>
                  </div>
                </div>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>