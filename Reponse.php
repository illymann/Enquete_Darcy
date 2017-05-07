<?php
//Récuperer les valeurs dans le formulaire avec les valeurs O ou N.
//inserer dans la bdd


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

session_start();//Démarage de la session
if (isset($_SESSION['login'])==false){
        echo "<script type=\'text/javascript\'>
        alert('Veuillez vous connecter!');                          
        </script>";
        header("location:index.php");
    }else{
//On droit posséder toutes les information nécessaire a l'ajout des données dans la table

$rep = $_GET['choix'];//récupère le choix dans l'url
$login = $_SESSION['login'];//Récupère le login en foction de la session démarrer
$numQ = $_GET['numQ']; //Récupère le Numéro de la question en fonction de la session ouverte

//Récupere id en foction du login
$reqIDS= ("SELECT id FROM salarie  WHERE login = '$login'");
$resultat1 = $bdd->query($reqIDS, PDO::FETCH_OBJ);//on transforme le résultat de la requête en objet pdo statement

//On boucle pour convertir l'objet PDO en chaine de ccaractère STRING
foreach  ($resultat1 as $row) {
    
	$ids = $row->id;
	
  }
 
//inserer les valeurs a la table reponse
$sql = ("INSERT INTO reponse (idSalarie, idQuestion, reponseON) values ('$ids','$numQ','$rep')");
$resultat2 =$bdd->exec($sql);//On execute la requet INSERT



echo 'La requete à été ajouter';

header('Location:Enquete_terminer.php');
	}

?>