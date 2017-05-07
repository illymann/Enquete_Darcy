<html>
	<head>
		<meta charset="utf-8">
		 <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		 <meta name="viewport" content="width=device-width, initial-scale=1">-->

		<!--<link rel="stylesheet" href="Style.css" type="text/css"/>
		<link rel="stylesheet" href="StyleGraphe1.css" type="text/css"/>-->

		<script src="jquery-2.1.4.min.js"></script>
		<script src="Chart.js"></script>
		<script src="Javascript.js"></script>
		
		<div id='Menu'>
		<br><?php include('Menus.php'); ?>
		</div>
	</head>
	<body>
	

	
		

<div id='titre'>
	<center>		
		<h1>
			Voici les stats de la question
		</h1>
	</center>
</div>

<?php
//Connexion BDD

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

//session_start();//démarage session
if (isset($_SESSION['login'])==false){
        echo "<script type=\'text/javascript\'>
        alert('Veuillez vous connecter!');                          
        </script>";
        header("location:index.php");
    }else{
//Numérique de la question
$numQ = $_GET['NumQ'];



//requequete pour sélectionner les questions 
    $req = "SELECT * FROM question WHERE id='$numQ'";//Requête

    $req2= "SELECT reponseON,idQuestion FROM reponse WHERE idQuestion='$numQ'";

	


    //affectation des résultats retourner sous forme de tableau
$resultat = $bdd->query($req, PDO::FETCH_OBJ);
$resultat1 = $bdd->query($req2, PDO::FETCH_OBJ);

//initialise les variables
 		$RepOui =0;
		$RepNon =0;
		$total =0;
 //boucle pour circulé dans le tableau et afficher en suite les lignes qui nous intéressent
foreach($resultat as $ligne){//echo "<a href='question.php?numQ=$ligne->id'>".$ligne->libelle."</a><br>";
//on affiche le libelle de la question en cours
	echo"<div id='Ques'>";
	echo "<center>";
	echo "<h2>".$ligne->libelle."</h2>";

//on affiche les détails de la question en cours
    echo "<h3>".$ligne->detail."</h3>";
	echo "</center>";
	echo"</div>";
	foreach($resultat1 as $ligne2){
		

//on crée une condition si il y a un O dans la colonne réponse on incrémente repOui sinon repNON
		if($ligne2->reponseON =='O'){

				++$RepOui ;
		}
		else
        {
            ++$RepNon ;
        }
		
		$total = $RepNon+$RepOui;
		
}


//calcul du pourcentage de oui
$pourcentageO = round($RepOui * 100/ $total,0);

$pOui = $pourcentageO;


//calcul du pourcentage de non
 
$pourcentageN = round($RepNon * 100/ $total,0);

$pNon = $pourcentageN;

		
}
	}
?>
	<input type= "hidden" id="pourcentageO" value ="<?php echo $pOui;?>"/>
	<input type= "hidden" id="pourcentageN" value ="<?php echo $pNon;?>"/>
	
<!--<graph 1> -->
</br>
<center>
<canvas id="mycanvas" width="256" height="256"></canvas>
</center>


</body>

</html>