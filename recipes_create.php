<?php session_start();?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>site de recette - ajout de recette</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div>
            <?php require_once(__DIR__ . '/header.php'); ?>
            <h1>Nouvelle recette</h1>
            <form action="submit_new_recipe.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label"> Nom de la recette</label>
                    <input type="text" name="title" class="form-text" id="title">
                </div>
                
                <div class="mb-3">
                    <label for="recipe" class="form-label"> écrivez la recette</label>
                    <textarea class="form-control" placeholder="votre recette" id="recipe" name="recipe"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </body>
</html>