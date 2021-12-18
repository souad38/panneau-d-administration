<?php
$bdd=new PDO('mysql:host=localhost;dbaname=projet_php_s','root','root');
if(isset($_GET['id']) AND !empty($_GET['id'])){
 $getid=$_GET['id'];
 $recupArticle=$bdd->prepare('select * from articles where id=?');
 $recupArticle->execute(array($getid));
 if($recupArticle->rowCount() > 0){
     $deleteArticle=$bdd->prepare('delete from articleswhere id=?').
     $deleteArticle->execute(array($getid));
     header('location: article.php');

 }else{
echo "Aucun article trouvé ";
 }
}else{
    echo "Aucun identifient trouvé";
}
?>

 <!DOCTYPE html>
<html>
  <head>
    <title>Home </title>
     <meta charset ="utf-8"> 
	</head> 
	<body>
 
</body>
</html>