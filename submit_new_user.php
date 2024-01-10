<?php

session_start();
require_once(__DIR__ . '/config/mysql.php');
require_once(__DIR__ . '/databaseconnect.php');
require_once(__DIR__ . '/variables.php');
require_once(__DIR__ . '/functions.php');

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
$postData = $_POST;

if(
    empty($postData['email']) ||
    empty($postData['full_name']) ||
    empty($postData['age']) ||
    empty($postData['password']) ||
    !filter_var($postData['email'], FILTER_VALIDATE_EMAIL) ||
    !filter_var($postData['age'], FILTER_VALIDATE_INT)
){
    echo 'tous les champs ne sont pas remplis correctement';
    return;
}
$email=trim(strip_tags($postData['email']));
$full_name=trim(strip_tags($postData['full_name']));
$age=trim(strip_tags($postData['age']));
$password=trim(strip_tags($postData['password']));

$insertUser=$mysqlClient->prepare('INSERT INTO users(email, full_name, age, password) VALUES (:email, :full_name, :age, :password)'); 
$insertUser->execute([
    'email'=>$email,
    'full_name'=>$full_name,
    'age'=>$age,
    'password'=>$password,
]);

redirectToUrl('login.php');
?>