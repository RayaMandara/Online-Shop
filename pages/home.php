<?php include '../includes/db_connect.php'; ?>
<?php include '../includes/header.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scentify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=GFS+Didot&family=Mystery+Quest&family=Orbitron:wght@400..900&family=Roboto:wght@400;500;700;900&family=Titan+One&display=swap" rel="stylesheet">
  </head>
  <body>

<main>
<header class="hero-section d-flex align-items-center justify-content-center text-center" id="home">
  <div class="hero-content text-white">
    <h1 class="display-4 fw-bold">Discover Your Signature Scent</h1>
    <p class="lead">Discover the finest fragrances that captivate every moment.</p>
    <a href="#shop" class="btn btn-light btn-lg mt-3 fw-bold">Our Collection</a>
  </div>
</header>


<section id="about" class="py-5" style="background-color: #0b0b0b; color: #f5f5f5;">
  <div class="container-fluid px-4 px-md-5"> <!-- container-fluid biar full width -->
    <div class="row justify-content-center align-items-center g-5">
      
      <!-- Gambar -->
      <div class="col-md-5 text-center">
        <img src="../assets/images/etc/about.jpg" 
             alt="About Scentify" 
             class="img-fluid rounded-3 shadow-lg"
             style="max-height: 450px; object-fit: cover;">
      </div>

      <!-- Teks -->
      <div class="col-md-5 text-md-start text-center">
        <h2 class="fw-bold mb-3" style="font-family: 'GFS Didot', serif; color: #d4af37;">
          About <span style="color: #fff;">Scentify</span>
        </h2>
        <p class="lead" style="line-height: 1.8;">
          At <strong>Scentify</strong>, we believe that fragrance is more than just a scent,
          it's an expression of identity, memory, and emotion.  
          Each bottle we create is designed to capture elegance, confidence,
          and timeless sophistication in every drop.
        </p>
        <p style="line-height: 1.8;">
          Founded with passion for artisanal perfume craftsmanship, Scentify
          combines luxury ingredients and modern design to bring you scents that
          not only linger but tell your story.
        </p>
        <a href="#shop" class="btn btn-outline-light mt-3" 
           style="border: 2px solid #d4af37; font-weight: 600;">
          Explore Our Collection
        </a>
      </div>
    </div>
  </div>
</section>
<?php include 'shop.php' ?>
</main>








</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
<?php include '../includes/footer.php'; ?>

