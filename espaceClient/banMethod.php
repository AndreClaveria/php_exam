<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=php_exam_db;', 'root', ''); //verif nom bdd
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getId = $_GET['id'];
    if($getId == 1) {
        echo "Tu peux pas bannir un admin";
        header('Location: ./ban.php');
    } else {
        $recupUser = $bdd->prepare('SELECT * FROM users WHERE Id = ?');//verif nom bdd
        $recupUser->execute(array($getId));
        if($recupUser->rowCount() > 0){

            $bannirUser = $bdd->prepare('DELETE  FROM users WHERE Id = ?');//verif nom bdd
            $bannirUser->execute(array($getId));
            header('Location: ./ban.php');
        }else{
            echo "Aucun membre na été trouvé";
        }
    }
	
}else{
    echo "L'identifiant n'a pas été récupéré ";
}

?>