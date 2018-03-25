<!--On va afficher les articles sur cette page-->

<?php 
//affichage du template


//si il n'y a pas de projet à afficher il faut renvoyer vers l'accueil

/*if(!array_key_exists('projet_Id', $_GET)){

	header('Location: indin.php');

	exit();
}*/


   

// je vais me connecter à la bdd pour aller chercher l'article
//connexion à la base de donnée

include '../basededonnee/bdd_connection.php'; 

//requête qui va me permettre d'aller chercher les articles enregistré dans la bdd

$query = $pdo->prepare('

SELECT 
		
		Title,
		Description,
		MailAddress,
		NickName_Author,
		LastName_Author,
		CreationTimeStamp
FROM 
	Projets

	');



$query->execute();
$projets = $query->fetchAll();?>


<?php $template = '../template/portfolio';
include '../template/layout.phtml'; 
?>





