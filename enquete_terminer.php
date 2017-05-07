<html>
<head> 
<script type="text/javascript" src="Javascript.js"></script>

<link rel="stylesheet" href="StyleQuestionT.css" />
<link rel="stylesheet" href="Style.css" />
<div id='Menu'>
<br><?php include('Menus.php'); ?>
</head>
</div>

<body>
<center>
	<div id='titre'>
<h1> Sélectionnez une question qui vous intéresse </h1>
	</div></br>
</center>


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
//requete pour récupere les questions ou la date de fin est inférieur à la date du jour
 $req = ("SELECT * FROM question where dateFin < Current_date()");//Requête

//affectation des résultats retourner sous forme de tableau
$resultat = $bdd->query($req, PDO::FETCH_OBJ);
 
 //boucle pour circulé dans le tableau et afficher en suite les lignes qui nous intéressent
foreach($resultat as $ligne){//echo "<a href='question.php?numQ=$ligne->id'>".$ligne->libelle."</a><br>";
echo"<center>";
echo"<div class='Stats'>";   
echo "<a href='Statistique.php?NumQ=$ligne->id'>".$ligne->libelle."</a><br>";
echo"</div>";   
echo "</center>";
}
	}
?>




</body>
</html>