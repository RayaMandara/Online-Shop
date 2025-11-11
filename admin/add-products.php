<?php
include '../includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $name        = $_POST['name'];
    $price       = $_POST['price'];
    $description = $_POST['description'];
    $top_notes    = $_POST['topnotes'];
    $middle_notes    = $_POST['middlenotes'];
    $base_notes    = $_POST['basenotes'];

    // Folder penyimpanan gambar
    $upload_dir = __DIR__ . "/uploads/";
    if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);

    // Upload gambar
    $productName = "";
    if (!empty($_FILES["image"]["name"])) {
        $productName = basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $upload_dir . $productName);
    }

    // Simpan ke database
    $sql = "INSERT INTO products (name, price, description, top_notes, middle_notes, base_notes, image)
            VALUES ('$name', '$price', '$description', '$top_notes', '$middle_notes', '$base_notes', '$productName')";

    if ($conn->query($sql)) {
        header("Location: add-products.php?success=1");
        exit;
    } else {
        echo '❌ Error: ' . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
<?php if (isset($_GET['success'])): ?>
    <p id="success-msg" style="color: green;">✅ Parfum berhasil ditambahkan!</p>
    <script>
        // Hapus parameter success dari URL setelah 2 detik
        setTimeout(() => {
            const url = new URL(window.location.href);
            url.searchParams.delete('success');
            window.history.replaceState({}, document.title, url);
        }, 2000);
    </script>
<?php endif; ?>


    <form action="add-products.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nama Parfum</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="description" class="form-control" rows="4"></textarea>
    </div>
    <div class="mb-3">
        <label>Top Notes</label>
        <input type="text" name="topnotes" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Middle Notes</label>
        <input type="text" name="middlenotes" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Base Notes</label>
        <input type="text" name="basenotes" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" step="0.01" name="price" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="image" class="form-control" accept="image/*" required>
    </div>
    <button type="submit" name="submit" class="btn btn-dark">Tambah Parfum</button>
    </form>
</body>

</html>