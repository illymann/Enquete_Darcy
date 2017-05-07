
<?php
//Connexion à la base de donnée
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=enquete','root','');//Connexion à la base de donnée
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//afficher les érreurs
	}
	catch (Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
     
//Récupération des entrées du formulaires 
  $login = $_GET['login'];
  $mdp=$_GET['mdp'];

  if(!empty($login) && !empty($mdp))//Si les champs ne sont pas vides
  {

    $req = "SELECT * FROM salarie WHERE login='$login' AND mdp='$mdp'";//Requête
    

    $resultat = $bdd->query($req)->fetch();

      if(empty($resultat))//Si le résultat est vide
      {
        echo "0";
      }             
      else//Sinon
      {         
        session_start();//Démarage de la session
        

        $_SESSION['id'] = $resultat['id'];//Affectation à la session le nom du compte
        $_SESSION['prenom'] = $resultat['prenom'];
        $_SESSION['login'] = $resultat ['login'];
        
        header('Location:Enquete_en_cours.php');
       
      }    
  }


 if(empty($login)){

    echo 'Veuillez saisir un identifiant'."<br/>";
  }if (empty($mdp)){

    echo 'Veuillez saisir un mot de passe';
  }
  ?>

  