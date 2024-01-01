<?php
session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

$postData=$_POST;

// validation du formulaire

if(
    empty($postData['title']) ||
    empty($postData['recipe'])||
    trim(strip_tags($postData['title'])) === '' ||
    trim(strip_tags($postData['recipe'])) === ''
    ){
    echo('tous les champs sont obligatoires');
    return;
}
$title=trim(strip_tags( $_POST['title']));
$recipe= trim(strip_tags( $_POST['recipe']));

$insertRecipe=$mysqlClient->prepare(' INSERT INTO recipes(title, recipe, author, is_enabled) VALUES (:title, :recipe, :author, :is_enabled)');
$insertRecipe->execute([
    'title'=>$title,
    'recipe'=>$recipe,
    'author'=>$_SESSION['LOGGED_USER']['email'],
    'is_enabled'=>1,
]);
