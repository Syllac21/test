<?php
session_start();

require_once(__DIR__.'/isConnect.php');
require_once(__DIR__.'/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__.'/functions.php');

$postData=$_POST;
if(
    !is_numeric($postData['id'])||
    empty($postData['id'])
){
    echo'il n\'y a pas de recette à effacer';
    return;
}

$id=$postData['id'];

$deleteRecipeStatement = $mysqlClient -> prepare('DELETE FROM recipes WHERE recipe_id=:id');
$deleteRecipeStatement ->execute([
    'id'=>$id,
]);
redirectToUrl('index.php');
?>

