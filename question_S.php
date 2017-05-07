<html>
<head>
	<link rel="stylesheet" href="StyleQuestionS.css" />
<link rel="stylesheet" href="Style.css" />
<title>Question selectionné </title>
</head>


<body>
	<div id='titre'>
	<center>
<h1> Répondez à la question suivante: </h1>
   </center>
</div>
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

session_start();
if (isset($_SESSION['login'])==false){
        echo "<script type=\'text/javascript\'>
        alert('Veuillez vous connecter!');                          
        </script>";
        header("location:index.php");
    }else{
$numQ = $_GET['numQ'];
//requete pour récupérer les questions dans la bdd
$req="SELECT * FROM question where id=$numQ";

//affectation des résultats retourner sous forme de tableau
$resultat = $bdd->query($req, PDO::FETCH_OBJ);
 
 //boucle pour circulé dans le tableau et afficher en suite les lignes qui nous intéressent
foreach($resultat as $ligne){//echo "<a href='question.php?numQ=$ligne->id'>".$ligne->libelle."</a><br>";
	echo"<div class='question' id='Ques'>";
	echo"<center>";

    echo "<h2>".$ligne->libelle."</h2>";
    echo "<h3>".$ligne->detail."</h3>";

	echo"</center>";
	echo"</div>";
}
	}

//il faut que je récupère le numéro de la question et l'nevoyer a nouveau
?>
<!--bouton radio oui et non + submit-->
<Center>
<form method="GET" action="Reponse.php">

<input type="radio" id="choixOui" name="choix" value="O"/> 
<label for="choixOui">Oui</label>
<input type="radio" id="choixNon" name="choix" value="N" />  
<label for="choixNon">Non</label>


<!--Envoie de l'id de la question aussi à la page reponse.php-->
<input type="hidden" name="numQ" value="<?php echo $numQ; ?>">
<input type="submit" value="Valider" id="valid" />

</form>
</center>


</body>


