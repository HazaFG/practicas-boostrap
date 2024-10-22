<?php
session_start();
include_once("app/ProductController.php");

if (isset($_GET['slug'])) {
    $slug = $_GET['slug'];
    $productController = new ProductController();
    
    //buscar por slug 
    $product = $productController->getProductBySlug($slug, $_SESSION['api_token']);

    if ($product) {
        $price = $product->presentations[0]->price[0]->amount;
    } else {
        echo "Producto no encontrado.";
        exit;
    }
} else {
    echo "Producto no encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles del Producto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar collapse">
        <div class="position-sticky">
          <h1>Sidebar</h1>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">Products</a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Main content -->
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Detalles del Producto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
              </ul>
              <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
            </div>
          </div>
        </nav>

        <!-- Product details section -->
        <?php if ($product): ?>
        <div class="card mb-4 mt-4">
          <div class="row g-0">
            <div id="carouselExampleIndicators" class="carousel slide col-md-6">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="<?= $product->cover ?>" class="d-block w-100" alt="<?= $product->name ?>" style="width: 100%; height: 400px; object-fit: cover;">
                  </div>
                  <!-- Puedes agregar más imágenes si es necesario -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
            </div>                                      

            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title"><?= $product->name ?></h5>
                <p class="card-text"><?= $product->description ?></p>
                <h3><?= $price ?> MXN</h3>
                <a href="checkout.php?slug=<?= urlencode($product->slug) ?>" class="btn btn-primary">Comprar ahora</a>
              </div>                                   
          </div>
        </div>
        <?php else: ?>
        <p>Producto no encontrado.</p>
        <?php endif; ?>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
