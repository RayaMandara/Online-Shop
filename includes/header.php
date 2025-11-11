<?php include 'db_connect.php'; ?>
<link rel="icon" href="../assets/images/etc/logo.png">
<link rel="stylesheet" href="../assets/css/style.css">

<nav class="navbar navbar-expand-lg navbar-dark fixed-top custom-navbar scrolled">
  <div class="container">
    <img src="../assets/images/etc/logo.png" style="width: 80px; margin-left: 20px;" alt="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#shop">Collection</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">More</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" href="#">Contact</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="https://maps.app.goo.gl/f51fykZB9zHyj9vp9"
                target="_blank" rel="noopener noreferrer">Maps</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>



<!-- Modal for Contact -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="https://api.web3forms.com/submit" method="POST">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Contact Us</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="access_key" value="f50819ae-9de7-4137-8fd9-12062ec525ed">
          <div class="mb-3">
            <label for="sender-name" class="col-form-label">Sender's Name:</label>
            <input type="text" class="form-control" name="name" id="sender-name" required>
          </div>
          <div class="mb-3">
            <label for="sender-email" class="col-form-label">Sender's Email :</label>
            <input type="email" class="form-control" name="email" id="sender-email" required>
          </div>
          <div class="mb-3">
            <label for="sender-message" class="col-form-label">Message:</label>
            <textarea class="form-control" name="message" id="sender-message" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Send message</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.custom-navbar');
    if (window.scrollY > 100) navbar.classList.add('navbar-shrink');
    else navbar.classList.remove('navbar-shrink');
  });

  window.addEventListener("pageshow", function(event) {
    if (event.persisted) {
      window.location.reload();
    }
  });
</script>