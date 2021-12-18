<?php
session_start();
$bdd=new PDO('mysql:host=localhost;dbaname=projet_php_s','root','root');
if(!$_SESSION['mdp']){
    header('location:connextion.php');
}
if(isset($_POST['envoi'])){
  if(!empty($_POST['titre']) AND !empty($_POST['contenu'])){
   $titre=htmlspecialchars($_POST['titre']);
   $contenu=nl2br(htmlspecialchars($_POST['contenu']));
$insererArticle=$bdd->prepare('insert into articles(titre,contenu)values(?,?)');
$insererArticle->execute(array($titre,$contenu));

echo "L'article a bien été envoyé" ;
  }else{
      echo"veuillez completer tous les champs..."; 
  }
}
?>
 <!DOCTYPE html>
<html>
  <head>
    <title>publier un article  </title>
     <meta charset ="utf-8"> 
	</head> 
	<body>
    <form method="POST" action="">
       <input type=" text" name="titre"> 
       <br>
       <textarea name="contenu"> </textarea> 
       <br>
       <input type="submit" name="envoi"> 
   </form>
</body>
</html>