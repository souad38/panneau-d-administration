<?php
session_start();
$bdd=new PDO('mysql:host=localhost;dbaname=projet_php_s','root','root');
if(isset($_GET['id']) AND !empty($_GET['id'])){}
 $getid=$_GET['id'] ;  
 $recupUser = $bdd->prepare('select * from membres where id=?');
 $recupUser->execute(array($getid));
   if($recupUser->rowCount()>0) {
    $bannirUser=$bdd->prepare('delete from members where id=?');
    $bannirUser->execute(array($getid));
    header('location:members.php');

   }else{
       echo"Aucun member n'a été trouvé";

   }
}else {
    echo"l'identifiant n'a pas été récupéré";
}
?>