 <?php
session_start();
$bdd=new PDO('mysql:host=localhost;dbaname=projet_php_s','root','root');
if(!$_SESSION['mdp']){
    header('location:connextion.php');
}
 ?> 
 <!DOCTYPE html>
<html>
  <head>
    <title>Afficheer les membres </title>
     <meta charset ="utf-8"> 
	</head> 
	<body>
    <!--afficher tous les membres-->
    <?php
      $recupUsers=$bdd->query('select * from members');
      while($user=$recupUsers->fetch()){
    ?>
     <p><?= $user['pseudo'];?><a href="bannir.php?id=<?= $user['id'];?>" style="color:blue;text-decoration:none;"> bannir le membre </a> </p>
        <?php  
      }

    ?> 


    <!-- fin d'afficher tous les membres-->
</body>
</html> 