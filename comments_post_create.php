<?php
session_start();

require_once(__DIR__ . '/isConnect.php');
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');


/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

if(
    empty($postData['recipe_id']) ||
    !is_numeric($postData['recipe_id']) ||
    trim(strip_tags($postData['comment']))===''||
    empty($postData['review']) ||
    !is_numeric($postData['review'])
){
    echo 'il n\' est pas possible de faire un commentaire';
    return;
}

$recipe_id=$postData['recipe_id'];
$comment=trim(strip_tags($postData['comment']));
$review=(int)$postData['review'];

$insertComment=$mysqlClient->prepare('INSERT INTO comments(recipe_id, comment, user_id, review) VALUES (:recipe_id, :comment, :user_id, :review)');
$insertComment->execute([
    'recipe_id'=>$recipe_id,
    'comment'=>$comment,
    'user_id'=>$_SESSION['LOGGED_USER']['user_id'],
    'review'=>$review,
]);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Création de commentaire</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container">

    <?php require_once(__DIR__ . '/header.php'); ?>
        <h1>Commentaire ajouté avec succès !</h1>

        <div class="card">
            <div class="card-body">
                <p class="card-text"><b>Votre commentaire</b> : <?php echo strip_tags($comment); ?></p>
            </div>
        </div>
    </div>
    <?php require_once(__DIR__ . '/footer.php'); ?>
</body>
</html>

redirectToUrl('index.php');


?>
