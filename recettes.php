<?php
  require_once('template/header.php');
  require_once('lib/recipe.php'); 

  $sql = 'SELECT * FROM recipes ORDER BY id DESC';
  $query = $pdo->prepare($sql);
  $query->execute();
  $recipes = $query->fetchAll();
?>

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <h1>Liste des recettes</h1>
    </div>

    <div class="row">

      <?php 
        foreach ($recipes as $key => $recipe) { 
        include('template/recipe_partial.php');
        } 
      ?>

    </div>

  </div>
  
<?php require_once('template/footer.php'); ?>