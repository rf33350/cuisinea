<?php
    require_once('template/header.php');
    require_once('lib/user.php');
    $errors = [];
    $messages = [];

    if (isset($_POST['addUser'])) {
        $res = addUser($pdo, $_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'] );
        var_dump($res);
        if ($res) {
            $messages[] = 'Le compte a bien été créé';
        } else {
            $errors[] = 'Infos de saisie incorrectes';
        }
    }
    
?>

<h1>Formulaire d'inscription</h1>

<?php foreach ($messages as $message) {?>
<div class="alert alert-info">
    <?= $message; ?>
</div>
<?php } ?>

<?php foreach ($errors as $error) {?>
<div class="alert alert-danger">
    <?= $error; ?>
</div>
<?php } ?>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group mb-3">
        <label class="form-label" for="first_name">Prénom</label>
        <input class="form-control" type="first_name" name="first_name" id="first_name" required>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="last_name">Nom</label>
        <input class="form-control" type="last_name" name="last_name" id="last_name" required>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="email">E-mail</label>
        <input class="form-control" type="email" name="email" id="email" required>
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="password">Mot de passe</label>
        <input class="form-control" type="password" name="password" id="password" required>
    </div>
    <div class="form-group mb-3">
        <input type="submit" value="Inscription" name="addUser" class="btn btn-primary">
    </div>
</form>
  
<?php include('template/footer.php'); ?>