<?php
  require_once('template/header.php');
  require_once('lib/recipe.php');

  $recipes = getRecipes($pdo, _HOME_RECIPES_LIMIT_);
?>

    <div class="container col-xxl-8 px-4 py-5">
      <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
          <img src="assets/images/logo-cuisinea.jpg" class="d-block mx-lg-auto img-fluid" alt="Logo Cuisinea" width="350" loading="lazy">
        </div>
        <div class="col-lg-6">
          <h1 class="display-5 fw-bold lh-1 mb-3">Cuisinea - Recettes de cuisine</h1>
          <p class="lead">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis hic perspiciatis, similique qui eum eaque. Earum, beatae soluta suscipit, officiis quo alias modi praesentium dolores ipsum iure sequi inventore ipsam?</p>
          <div class="d-grid gap-2 d-md-flex justify-content-md-start">
            <a href="recettes.php">
              <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Voir nos recettes</button>
            </a>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <h2>Nos dernières recettes</h2>
      <?php 
        foreach ($recipes as $key => $recipe) { 
        include('template/recipe_partial.php');
        } 
      ?>

    </div>

  </div>
  
<?php include('template/footer.php'); ?>