<?php
    require_once('template/header.php');
    require_once('lib/user.php');
    $errors = [];
    $messages = [];

    if (isset($_POST['loginUser'])) {
        $user = verifyLoginPassword($pdo, $_POST['email'], $_POST['password']);
        if ($user) {
            $_SESSION['user'] = ['email'=> $user['email']];
            header('location: index.php');
        } else {
            $errors[] = 'Problème lors de la connexion';
        }
    }
    
?>

<h1>Connexion</h1>

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
        <label class="form-label" for="email">E-mail</label>
        <input class="form-control" type="email" name="email" id="email">
    </div>
    <div class="form-group mb-3">
        <label class="form-label" for="password">Mot de passe</label>
        <input class="form-control" type="password" name="password" id="password">
    </div>
    <div class="form-group mb-3">
        <input type="submit" value="Se connecter" name="loginUser" class="btn btn-primary">
    </div>
</form>
  
<?php include('template/footer.php'); ?>