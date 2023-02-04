<?php
  require_once('template/header.php');
  require_once('lib/tools.php'); 
  require_once('lib/recipe.php'); 

  if (isset($_POST['saveRecipe'])) {
    saveRecipe($pdo, $_POST['catégorie'], $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], null);
}

?>

    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
      <h1>Ajouter/Modifier une recette</h1>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label class="form-label" for="title">Titre de la recette</label>
            <input class="form-control" type="text" name="title" id="title">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="ingredients">Ingredients</label>
            <textarea class="form-control" name="ingredients" id="ingredients" cols="30" rows="5"></textarea>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="instructions">Instructions</label>
            <textarea class="form-control" name="instructions" id="instructions" cols="30" rows="5"></textarea>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="catégorie">Catégorie</label>
            <select name="catégorie" id="catégorie" class="form-select">
                <option value="1">Entrée</option>
                <option value="2">Plat</option>
                <option value="3">Déssert</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="file">Image</label>
            <input type="file" name="file" id="file">
        </div>
        <div class="form-group mb-3">
            <input type="submit" value="Enregistrer" name="saveRecipe" class="btn btn-primary">
        </div>
    </form>

  </div>
  
<?php require_once('template/footer.php'); ?>