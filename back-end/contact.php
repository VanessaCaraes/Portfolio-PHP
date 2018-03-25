<?php 


//je me connecte à la BDD
if(!empty($_POST)){ //Evite les erreurs de php en cas de formulaire vide

include '../basededonnee/bdd_connection.php';

//Je déclare des variables

$name = $_POST['name'];
$mail = $_POST['mail'];
$content = $_POST['content'];
$subject = $_POST['subject'];

// Réalisation de la requête qui va insérer les éléments dans la BDD

$query = $pdo->prepare('

INSERT INTO Contacts

			(Name,
			Mail,
			Subject,
			Content,
			CreationTimeStamp)

VALUES
			(?, ?, ?, ?, NOW())


	');

//j'éxécute la requête

$query->execute([$name, $mail, $subject, $content]);

//Les informations sont désormais dans la BDD
}

$template ='../template/contact';

include "../template/layout.phtml";

?>