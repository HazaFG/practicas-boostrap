<div class="col-12 col-lg-6 col-xl-4 mb-4">
  <div class="card product-card shadow-lg border-0 rounded">
    <div class="position-relative">
      <a href="<?= BASE_PATH . 'products/' . $product->slug ?>">
        <img src="<?= $product->cover ?>" alt="Product image" class="img-fluid rounded-top" style="height: 220px; width: 100%; object-fit: cover;" />
      </a>
      <div class="position-absolute top-0 end-0 p-2">
        <div class="form-check prod-likes">
          <input type="checkbox" class="form-check-input" />
          <i data-feather="heart" class="prod-likes-icon text-danger"></i>
        </div>
      </div>
    </div>

    <div class="card-body">
      <a href="<?= BASE_PATH . 'products/' . $product->slug ?>" class="text-decoration-none">
        <h5 class="prod-content text-dark mb-1"><?= $product->name ?></h5>
      </a>
      <div class="d-flex align-items-center justify-content-between mt-2 mb-2">
        <h4 class="text-primary"><b>$<?= $product->presentations[0]->price[0]->amount ?></b></h4>
        <div class="d-flex align-items-center text-muted">
          <i class="ph-duotone ph-star text-warning me-1"></i> 4.5 <small>/ 5</small>
        </div>
      </div>

      <div class="d-flex justify-content-between align-items-center mt-3">
        <a href="<?= BASE_PATH . 'products/' . $product->slug ?>" class="btn btn-outline-primary btn-sm">
          <i class="ph-duotone ph-eye"></i> View
        </a>
        <button class="btn btn-outline-success btn-sm">Add to Cart</button>
        <button class="btn btn-outline-danger btn-sm" onclick="deleteProduct(this)" data-id="<?= $product->id ?>" data-product='<?= json_encode($product) ?>'>Delete</button>
        <a class="btn btn-outline-warning btn-sm" href="<?= BASE_PATH ?>products/edit/<?= $product->slug ?>">Edit</a>
      </div>
    </div>
  </div>
</div>
