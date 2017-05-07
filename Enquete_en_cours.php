<html>
<head>
<title>Enquete en cours </title>
<link rel="stylesheet" href="Style.css" />
<link rel="stylesheet" href="StyleEnqueteEC.css" />
<div id='Menu'>
<br><?php include('Menus.php'); ?>
</div>
</head>


<body>
<div id='titre'>
	<center>
		<h1> Faites votre choix </h1>
	</center>
	</div></br>


<?php //Connexion à la base de donnée


	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=Enquete','root','');//Connexion à la base de donnée
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//afficher les érreurs

	}
	catch (Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
?>

<?php

if (isset($_SESSION['login'])==false){
        echo "<script type=\'text/javascript\'>
        alert('Veuillez vous connecter!');                          
        </script>";
        header("location:index.php");
    }else{

//$req = ("SELECT * FROM question where dateDebut<=Current_date() and dateFin>=Current_date() 
   // and id not in(select idQuestion from reponse where idSalarie=".$_SESSION['id'].")");

//requete pour récupérer les questions dans la bdd
$req=("SELECT id, libelle, detail FROM question where dateFin >= Current_date()
and id not in(select idQuestion from reponse where idSalarie=".$_SESSION['id'].")");

//affectation des résultats retourner sous forme de tableau
$resultat = $bdd->query($req, PDO::FETCH_OBJ);
 
 //boucle pour circulé dans le tableau et afficher en suite les lignes qui nous intéressent
foreach($resultat as $ligne){
//insertion du html dans le php
	
	 echo "<center>";
     echo"<div class=QuestionsNeutre>";
	 //liens sera attribuer à chaque question vers la page question_S
     echo "<a  href='question_S.php?numQ=$ligne->id'>".$ligne->libelle."</a><br>";
	 echo "</div>";
	 echo "</center>";
	}
	}
?>
<center>
<h4> Si la page est vide c'est qu'il y a aucune enquête en cours </h4>
</center>



</body>
</html>