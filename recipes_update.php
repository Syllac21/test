<?php 
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');


$getData=$_GET;

if (empty($getData['id']) || !is_numeric($getData['id'])){
    echo('il faut un identifiant pour modifier la recette');
    return;
}

$retrieveRecipeStatement=$mysqlClient->prepare('SELECT * FROM recipes WHERE recipe_id=:id');
$retrieveRecipeStatement->execute([
    'id'=>$getData ['id'],
]);
$recipe=$retrieveRecipeStatement->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>site de recette - modificaiton de recette</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="d-flex flex-column min-vh-100">
        <div class="container">
            <?php require_once(__DIR__ . '/header.php'); ?>
            <h1>Modifier la recette</h1>
            <form action="recipes_post_update.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3 visually-hidden">
                    <label for="id" class="form-label">identifiant de la recette</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo($getData['id']); ?>">
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label"> Nom de la recette</label>
                    <input type="text" name="title" class="form-text" id="title" aria-describedby="title-help" value="<?php echo($recipe['title']);?>">
                    <div id="title-help" class="form-text">Choisissez bien votre titre</div>
                </div>
                <div class="mb-3">
                    <label for="recipe" class="form-label"> écrivez la recette</label>
                    <textarea class="form-control" placeholder="votre recette" id="recipe" name="recipe"><?php echo($recipe['recipe']);?> </textarea>
                </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </body>
</html>