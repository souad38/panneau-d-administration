<?php

$bdd=new PDO('mysql:host=localhost;dbaname=projet_php_s','root','root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid=$_GET['id'];
    $recupArticle=$bdd->prepare('select * from articles where id=?');
    $recupArticle->execute(array($getid));
    if($recupArticle->rowCount() > 0){
        $articlrInfos=$recupArticle->fetch();
       $titre=$articlrInfos['titre'];
       $contenu=$articlrInfos['contenu'];
       $contenu=str_replace(' <br />','',$articlrInfos['contenu']);
        
       if(isset($_POST['valider'])) {
       $titre_saisi=htmlspecialchars($_POST['titre']);
       $contenu_saisi=nl2br(htmlspecialchars($_POST['contenu']));
       $updateArticle=$bdd->prepare('update articles set titre=? , contenu=? where id=?');
       $updateArticle->execute(array($titre_saisi,$contenu_saisi,$getid));
       header('location:articles.php');
       }
       
    }else{
        echo " Aucun article trouvé ";
       }
}else{
    echo "Aucun identifiant trouvé ";
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>modifier l'article  </title>
     <meta charset ="utf-8"> 
	</head> 
	<body>
    <form method="POST" action="">
       <input type=" text" name="titre" value="<?=$titre;?>"> 
       <br>
       <textarea name="contenu" > 
       <?=$contenu;?>
       </textarea> 
       <br>
       <input type="submit" name="valider"> 
   </form>
</body>
</html