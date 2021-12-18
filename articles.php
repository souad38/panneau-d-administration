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
    <title>afficher tous les articles </title>
     <meta charset ="utf-8"> 
	</head> 
	<body>
    <?php
    $recupArticles =$bdd->query('select * from articles');
    while($article=$recupArticles->fetch()){
        ?>  
        <div class="article" style="border: 1px solid black;">
            <h1><?=$article['titre'];   ?> </h1>
            <br>
            <p><?=$article['contenu'];   ?> </p>
            <a href="supprimer-article.php?id=<?=$article['id']; ?>">
            <button style="color:white; background-color:red;margin:button 10px;">Supprimer l'article </button></a>
            <a href="modifier-article.php?id=<?=$article['id']; ?>">
            <button style="color:white; background-color:teal;margin:button 10px;">modifier l'article </button></a>
        </div>
        <br>
        <?php
    }


    ?>
   
</body>
</html> 