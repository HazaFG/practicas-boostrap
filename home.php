<?php
if (!isset($_SESSION)) {
	session_start();
}
  include_once("app/ProductController.php");
  $productController = new ProductController();
  $products = $productController->getAllProducts($_SESSION['api_token']);
  include_once("app/BrandController.php");
  $brandController = new BrandController();
  $brands = $brandController->get();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TAILWIND ES MEJOR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
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

        <!-- Botón para abrir la ventana modal -->
        <button type="button" class="btn btn-info flex float-end m-5" data-bs-toggle="modal" data-bs-target="#loginModal">
            Añadir
        </button>

        <!-- Ventana modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Agregar un producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="app/ProductController.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10 pb-4">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Lavadora perrona" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10 pb-4">
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="lavadora-perrona" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                            <div class="col-sm-10 pb-4">
                                <textarea class="form-control" id="description" name="description" placeholder="Este producto cuenta con cierta característica" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="features" class="col-sm-2 col-form-label">Features</label>
                            <div class="col-sm-10 pb-4">
                                <textarea class="form-control" id="features" name="features" placeholder="..." rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group custom-file pb-4">
                            <input type="file" class="custom-file-input" id="cover" name="cover" lang="es">
                            <label class="custom-file-label" for="cover">Seleccionar Archivo</label>
                        </div>
                        <select class="form-control">
                          <?php if (isset($brands) && count($brands)): ?>
                          <?php foreach ($brands as $brand): ?>
                          <option value="<?= $brand->id ?>">
                            <?= $brand->name ?>
                          </option>
                          <?php endforeach ?>
                          <?php endif ?>
                          
                        </select>
                        <button type="submit" class="btn btn-primary">Guardar producto</button>
                    </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Ventana modal PERO PARA EDITAR -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Editar un producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form method="POST" action="app/ProductController.php" enctype="multipart/form-data">
                      <input type="hidden" name="_method" value="PUT"> <!-- Simula el método PUT -->
                      <input type="hidden" name="action" value="update"> <!-- Campo oculto para la acción -->
                      <div class="form-group row">
                          <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                          <div class="col-sm-10 pb-4">
                              <input type="hidden" id="productId" name="productId">
                              <input type="text" class="form-control" id="name" name="name" placeholder="Edita aqui" required>
                          </div>
                      </div>
                        <div class="form-group row">
                            <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10 pb-4">
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="lavadora-perrona" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-2 col-form-label">Descripción</label>
                            <div class="col-sm-10 pb-4">
                                <textarea class="form-control" id="description" name="description" placeholder="Este producto cuenta con cierta característica" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="features" class="col-sm-2 col-form-label">Features</label>
                            <div class="col-sm-10 pb-4">
                                <textarea class="form-control" id="features" name="features" placeholder="..." rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="form-group custom-file pb-4">
                            <input type="file" class="custom-file-input" id="cover" name="cover" lang="es">
                            <label class="custom-file-label" for="cover">Seleccionar Archivo</label>
                        </div>

                        <select class="form-control">
                          <?php if (isset($brands) && count($brands)): ?>
                          <?php foreach ($brands as $brand): ?>
                          <option value="<?= $brand->id ?>">
                            <?= $brand->name ?>
                          </option>
                          <?php endforeach ?>
                          <?php endif ?>
                          
                        </select>
                        <button type="submit" class="btn btn-primary">Guardar producto</button>
                      </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Esto es lo del feature -->
        <div class="card mb-4 mt-4">
            <?php if (!empty($products)) : ?>
                <div class="container">
                    <div class="row">
                        <?php foreach ($products as $index => $product) : ?>
                            <!-- Crear nueva fila después de cada 5 productos -->
                            <?php if ($index > 0 && $index % 5 == 0) : ?>
                                </div><div class="row">
                            <?php endif; ?>

                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <img class="d-block w-50 mx-auto" src="<?= $product->cover ?>" alt="<?= $product->name ?>">
                                        <h5 class="card-title pt-3"><?= $product->name ?></h5>
                                        <p class="card-text"><?= $product->description ?></p>
                                        <!-- Botón para ver detalles -->
                                        <a href="details.php?slug=<?= urlencode($product->slug) ?>" class="btn btn-dark mb-2" role="button" aria-pressed="true">Ver detalles</a>
                                        <!-- Botones de editar y eliminar -->
                                        <div class="d-flex justify-content-between">
                                            <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal">Editar</a>
                                            <a href="delete.php?id=<?= $product->id ?>" class="btn btn-danger btn-borrar">Borrar</a>
                                            </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else : ?>
                <p>NO EXISTEN</p>
            <?php endif; ?>
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
