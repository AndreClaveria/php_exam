<?php
$bdd = new PDO('mysql:host=localhost;dbname=php_exam_db;', 'root', '');

if(isset($_GET['Id']) AND !empty($_GET['Id'])){
    $getId = $_GET['Id'];

    $deleteArticle = $bdd->prepare('DELETE FROM articles WHERE Id = ?');
    $deleteArticle->execute(array($getId));
    header('Location : ./article.php');
}else{
    echo "Aucun identifiant trouvé";
}
?>
