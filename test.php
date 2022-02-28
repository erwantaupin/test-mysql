<?php

try
{
	// On se connecte à MySQL
	$mysqlClient = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table recipes
$sqlQuery = 'SELECT * FROM jeux';
$recipesStatement = $mysqlClient->prepare($sqlQuery);
$recipesStatement->execute();
$recipes = $recipesStatement->fetchAll();
$f = fopen('data.txt', 'a+');



// On affiche chaque recette une à une
foreach ($recipes as $recipe) {
?>
    <p><?php echo $recipe['titre_jeux']; ?></p>
    <p><?php echo $recipe['synopsis']; ?></p>
    <p><?php echo $recipe['notes_des_journalistes']; ?></p>
    <p><?php echo $recipe['notes_des_joueurs']; ?></p>
<?php
}