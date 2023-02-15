<?php
    require_once('template/header.php');
    require_once('lib/tools.php'); 
    require_once('lib/recipe.php'); 
    require_once('lib/category.php');
    
    if (!isset($_SESSION['user'])) {
        header('location: login.php');
    }

    $errors = [];
    $messages = [];

    $recipe = [
        'title' => '',
        'description' => '',
        'ingredients' => '',
        'instructions' => '',
        'category_id' => '',
    ];

    if (isset($_POST['saveRecipe'])) {
        $fileName = null;
        
        if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
            $checkImage = getimagesize($_FILES['file']['tmp_name']);

            if ($checkImage !== false) {

                $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
                move_uploaded_file($_FILES['file']['tmp_name'], _RECIPES_IMG_PATH_.$fileName);
                
            } else {
                $errors[] = 'L\'image n\'a pas été uploadé';
            }
        }

        if (!$errors) {
            $res = saveRecipe($pdo, $_POST['catégorie'], $_POST['title'], $_POST['description'], $_POST['ingredients'], $_POST['instructions'], $fileName);
            
            /*if ($res) {
                $messages[] = 'La recette a bien été sauvegardée';
            } else {
                $errors[] = 'La recette n\'a pas bien été sauvegardée';
            }*/
        }
        $recipe = [
            'title' => $_POST['title'],
            'description' => $_POST['description'],
            'ingredients' => $_POST['ingredients'],
            'instructions' => $_POST['instructions'],
            'category_id' => $_POST['catégorie'],
        ];
    }

    $categories = getCategories($pdo);

?>
    
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <h1>Ajouter une recette</h1>
        <?php foreach ($messages as $message) {?>
        <div class="alert alert-succes">
            <?= $message; ?>
        </div>
        <?php } ?>

        <?php foreach ($errors as $error) {?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
        <?php } ?>
    </div>

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label class="form-label" for="title">Titre de la recette</label>
            <input class="form-control" type="text" name="title" id="title" value="<?= $recipe['title']; ?>">
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="description">Description</label>
            <textarea class="form-control" name="description" id="description" cols="30" rows="5" ><?= $recipe['description']; ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="ingredients">Ingredients</label>
            <textarea class="form-control" name="ingredients" id="ingredients" cols="30" rows="5" ><?= $recipe['ingredients']; ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="instructions">Instructions</label>
            <textarea class="form-control" name="instructions" id="instructions" cols="30" rows="5"><?= $recipe['instructions']; ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="catégorie">Catégorie</label>
            <select name="catégorie" id="catégorie" class="form-select">
                <?php foreach ($categories as $category) {?> 
                <option value="<?= $category['id']; ?>" <?php if ($recipe['category_id'] == $category['id']) {echo 'selected = "selected"';} ?>><?= $category['name']; ?></option>
                <?php } ?>
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