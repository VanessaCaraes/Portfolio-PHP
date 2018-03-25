<?php


//Je me connecte à la base de donnée

 

include '../basededonnee/bdd_connection.php';

//Requête qui va me permettre d'aller chercher les messages dans la bdd

$query = $pdo->prepare('

SELECT 
		Name,
		Mail,
		Content,
		Subject,
		CreationTimeStamp
FROM 
		Contacts 
	');

$query->execute();

$messages = $query->fetchAll();

//une vérification des éléments reçus avec mon var_dump
//var_dump($messages);




//Affichage du template 
$template = '../template/receivecontact';

include '../template/layout.phtml';

?>