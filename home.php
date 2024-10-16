<?php
 session_start();

  include_once("app/ProductController.php");
  $productController = new ProductController();
  $products = $productController->getAllProducts($_SESSION['api_token']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TAILWIND ES MEJOR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <!-- ETES ES EL SIDEBAR -->
      <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark text-white sidebar collapse">
        <div class="position-sticky">
          <h1>Sidebar</h1>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white active" aria-current="page" href="#">
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">
                Orders
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">
                Products
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#">
                Customers
              </a>
            </li>
          </ul>
        </div>
      </nav>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <!-- ESTE ES EL NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar scroll</a>
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

        <!-- Esto es lo del feature -->
        <div class="card mb-4 mt-4">
          <div class="row g-0">
                  <?php if (!empty($products)) : ?>
                      <?php foreach ($products as $product) : ?>
                          <div class="col">
                              <div class="card">
                                  <div class="card-body">
                                      <img class="d-block w-50 mx-auto" src="<?= $product->cover ?>">
                                      <h5 class="card-title pt-3"><?= $product->name ?></h5>
                                      <p class="card-text"><?= $product->description ?></p>
                                      <a href="details.php?id=<?= $product->id ?>" class="btn btn-dark" role="button" aria-pressed="true">Ver detalles</a>
                                  </div>
                              </div>
                          </div>
                      <?php endforeach; ?>
                  <?php else : ?>
                      <p>NO EXISTEN</p>
                  <?php endif; ?>                                    
          </div>
        </div>

        <h4>Historial de pedidos</h4>
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
            </tr>
          </tbody>
        </table>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
