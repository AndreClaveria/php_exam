<?php 
include("headerClient.php");
$bdd = new PDO('mysql:host=localhost;dbname=php_exam_db;', 'root', '');
echo $_SESSION['id'];
if(!$_SESSION['id']) {
    header('Location : ../index.php');
}


?>

<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Article</title>
    <link rel="stylesheet" type="text/css" href="../css/ban.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
</head>
<body>
    <section>
        <section class="autre">
        <?php
            $id = $_SESSION['id'];
            $recupArticles = $bdd->query("SELECT * FROM articles WHERE CreatorId =\"$id\" ORDER BY Id DESC");
            
            while($article = $recupArticles->fetch()){
                ?>
                <section class="article">
                    <h2><?= $article['Title']; ?></h2> 
                    <p><?= $article['Description']; ?></p>
                    <p>Post made by <?= $article['Creator']; ?> le <?= $article['CreationDate']; ?> </p>

                    <a name='oui'href="suppArticle.php?Id=<?= $article['Id'];?>">
                        <button>Delete</button>
                    </a>
                    <a href="modify.php?Id=<?= $article['Id'];?>">
                        <button>Modify</button>
                    </a>
                    <br /> 
                    <br /> 
                </section>
                    <br /> 
                    <br /> 
                <?php
            }
    ?>
        </section>
    </section>
</body>
</html>