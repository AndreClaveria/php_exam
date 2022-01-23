<?php

include("espaceClient/header.php");


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./css/ban.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
</head>
<body>
    <section>
        <section class="autre">
            <br>
            <br>
            <section class="button">
                <form method="post" action="?" autocomplete="off">
                <button name="croissant" type="submit">OLDEST</button>
                </form>
                <br>
                <form method="post" action="" autocomplete="off">
                <button name="decroissant" type="submit">NEWEST</button>
                </form>
                <br>
            </section>
            <?php
            
            
            $bdd = new PDO('mysql:host=localhost;dbname=php_exam_db;', 'root', ''); 
            $recupArticles = $bdd->query("SELECT * FROM articles ORDER BY Id DESC");
            if(isset($_POST['croissant'])) {
                $recupArticles = $bdd->query("SELECT * FROM articles ORDER BY Id ASC");
            } elseif(isset($_POST['decroissant'])){
                $recupArticles = $bdd->query("SELECT * FROM articles ORDER BY Id DESC");
            }
            
            $role = '';
            if(isset($role)) {  
                if($id == 1) {
                    
                    while($article = $recupArticles->fetch()){
                    ?>
                    <section class="article"">
                        <h2><?= $article['Title']; ?></h2> 
                        <p><?= $article['Description']; ?></p>
                        <p>Post made by <?= $article['Creator']; ?> le <?= $article['CreationDate']; ?> </p>
                        <a href="./espaceClient/suppArticle.php?Id=<?= $article['Id'];?>">
                                <button>DELETE</button>
                        </a>
                        <br />
                        <br />
                    </section>
                    <br />
                    <br />
                    
                    <?php
                    }
                } else {
                    while($article = $recupArticles->fetch()){
                        ?>
                            <section class="article">
                                <h1><?= $article['Title']; ?></h1> 
                                <p><?= $article['Description']; ?></p>
                                <p>Post made by <?= $article['Creator']; ?> le <?= $article['CreationDate']; ?> </p>
                                <br />
                                <br />
                            </section>
                            <br />
                            <br />
                            <?php
                        }   
                }

                
            } else {
                while($article = $recupArticles->fetch()){
                ?>
                    <section class="article">
                        <h1><?= $article['Title']; ?></h1> 
                        <p><?= $article['Description']; ?></p>
                        <p>Post made by <?= $article['Creator']; ?> le <?= $article['CreationDate']; ?> </p>
                        <br />
                        <br />
                    </section>
                    <br />
                    <br />
                    <?php
                }   
            }
            ?>
        </section>
    </section>
</body>
</html>