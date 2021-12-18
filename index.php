<?php
session_start();
if(!$_SESSION['mdp']){
    header('location:connextion.php');
}
?>
 <!DOCTYPE html>
<html>
  <head>
    <title>Home </title>
     <meta charset ="utf-8"> 
	</head> 
	<body>
    <a href="membres.php">Afficher tous les membres</a>
    <a href="publier-article.php">publier un nouvel article </a>
    <a href="articles.php">afficher tous les articles  </a>
</body>
</html> 