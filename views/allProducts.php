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
              <img class="card-img-top" id="imageProducts" src="<?= $products->image ?>"alt="Card image cap" height="250" width="400">
              <div class="card-body">
                <p class="card-title font-weight-bold"><?= $products->productName ?> (REF: <?= $products->productReference ?> )</p>
                  <p class="font-weight-light"><?= htmlspecialchars_decode($products->description) ?></p>
                  <!--<p class="font-weight-light">REF: <?= $products->productReference ?></p>-->
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
  <i class="fas fa-caret-square-up" onclick="toTopFunction()" id="btnGoToTop" title="Retour en haut"></i>
<?php include '../parts/footer.php' ?>