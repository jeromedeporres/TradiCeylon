<?php 
include '../parts/header.php';  
include '../models/products.php';
include_once '../models/categories.php';
include '../controllers/headerCtrl.php';
include '../controllers/allProductsCtrl.php';
?>
  <div class="container">
    <div class="row">
          <?php foreach ($productDetails as $products){ ?>
            <div class="card col-md-3 col-sm-12 mr-4 ml-5 mb-2">
              <img class="card-img-top" src="<?= $products->image ?>" alt="Card image cap">
              <div class="card-body">
                <p class="card-title font-weight-bold"><?= $products->productName ?></p>
                  <p class="font-weight-light"><?= $products->description ?></p>
                  <p class="font-weight-light font-italic">REF: <?= $products->productReference ?></p>
                  <p class="card-text">€<?= $products->price ?></p>
              </div>
                <button type="button" class="btn btn-outline-primary btn-sm">Ajouter au panier</button>
              <div class="card-footer">
                <small class="text-muted">disponibilité</small>
              </div>
              </div>
      <?php }?>
    </div>
  </div>
<?php include '../parts/footer.php' ?>