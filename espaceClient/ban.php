<?php 
include_once('./headerClient.php');


$bdd = new PDO('mysql:host=localhost;dbname=php_exam_db;', 'root', '');
if(!$_SESSION['id']){
	header('Location: inscription.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAN</title>
    <link rel="stylesheet" type="text/css" href="../css/ban.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
</head>
<body>
    <section>
        <section class="all">
        <!-- //Afficher les membres -->
    <?php 
        $recupUser = $bdd->query('SELECT * FROM users'); //verifier les noms bdd
        while($user = $recupUser->fetch()){
            ?>
            <p><?= "<strong>Email : </strong>" . $user['Email'] . "<strong> Username : </strong>" . $user['Username']; ?> <a href="banMethod.php?id=<?= $user['Id']; ?>">BAN THE BUDDY</p></a>  <!--verif info bdd -->
            <?php
        }
    ?>
    <!-- //Fin Afficher les membres -->
        </section>
    </section>
</body>
</html>