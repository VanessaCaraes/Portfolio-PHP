<?php



//Je me connecte à la base de donnée j'appelle le fichier BDDconnexion 


if(!empty($_POST)){ //fin des erreurs en cas de formulaire vide 

include'../basededonnee/bdd_connection.php'; 

// Je déclare des variables
	$title = $_POST['title'];
	 $description= $_POST['description'];
	 $mailaddress= $_POST['mailaddress'];
	 $nickname_author = $_POST['nickname_author'];
	 $lastname_author = $_POST['lastname_author'];

//je réalise la requête qui va insérer les éléments dans ma base de donnée

$query = $pdo->prepare("

	INSERT INTO Projets

	( Title, Description, MailAddress, NickName_Author, LastName_Author, CreationTimeStamp)
	VALUES
	(?, ?, ?, ?, ?, NOW())
	");

//J'exécute la requête

$query->execute([$title, $description, $mailaddress, $nickname_author, $lastname_author]);

// Les nouvelles informations sont désormais enregistrées dans la base de donnée

}


$template = '../template/ad_portfolio';

include '../template/layout.phtml';

 ?>