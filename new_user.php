<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>site de recette - nouvel utilisateur</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div>
            <?php require_once(__DIR__ . '/header.php'); ?>
            <h1>Votre compte</h1>
            <form action="submit_new_user.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="full_name" class="form-label"> Votre nom complet</label>
                    <input type="text" name="full_name" class="form-text" id="title">
                </div>
                <div class="mb-3">
                    <label for="age" class="form-label"> Votre âge</label>
                    <input type="number" name="age" class="form-text" id="age">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="you@exemple.com">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </body>
</html>