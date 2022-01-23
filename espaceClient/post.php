<?php

include_once("connectionDatabase.php");
include_once('headerClient.php');

$bdd = getDB();

if(!$_SESSION['id']) {
    header('Location: ../index.php');
}

$user = $_SESSION['name'];
if(isset($_POST['envoi'])){
    if(!empty($_POST['Title']) AND !empty($_POST['Description'])){
        $Title = htmlspecialchars($_POST['Title']);
        $Description = nl2br(htmlspecialchars($_POST['Description']));
        $nom = $_SESSION['name'];
        $id = $_SESSION['id'];
        $insererArticle = $bdd->prepare('INSERT INTO articles(Title, Description, CreationDate, Creator, CreatorId) VALUES (?, ?, NOW(), ?, ?)');
        $insererArticle->execute(array($Title, $Description, $nom, $id));
        $notgood = true;
    } else{
        $notgood = false;
    }
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE A POST</title>
    <link rel="stylesheet" type="text/css" href="../css/post.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
</head>
<body>
    <section>
        <section class="all">
            <section class="autre">
                <form method="POST" action="" class="form">
                    <p>Welcome,</p>
                    <?php  echo "<strong>" . $user . "</strong>"?>
                    <p>What do you want to post ?"</p>
                    <br />
                    <Label>Title</Label>
                    <input type="text" name="Title" class="oui">
                    <br>
                    <Label>Description</Label>
                    <textarea name="Description"></textarea>
                    <br>
                    <input type="submit" name="envoi" value="SEND"  class="input" >
                    <br>
                    <?php
                    if(isset($notgood)){
                        if($notgood){
                            echo "Your post at been send !";
                        }else{
                            echo "Please complete all fields !";
                        }
                    }
                    ?>
                </form>
            </section>
        </section>
    </section>
</body>
</html>