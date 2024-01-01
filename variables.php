<?php

$usersStatement=$mysqlClient->prepare('SELECT * FROM users');
$usersStatement->execute();
$users =$usersStatement->fetchAll();

$recipesStatement=$mysqlClient->prepare('SELECT * FROM recipes');
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();
?>