<?php 


include("./headerClient.php");


$bdd = new PDO('mysql:host=localhost;dbname=php_exam_db;', 'root', '');
if(isset($_GET['Id']) AND !empty($_GET['Id'])){

    $getId = $_GET['Id'];

    $recupArticle =  $bdd->prepare('SELECT * FROM articles WHERE Id = ?');
    $recupArticle->execute(array($getId));
    if($recupArticle->rowCount()>0)
    {
        $articleInfos =  $recupArticle->fetch();
        $titre = $articleInfos['Title'];
        $description = $articleInfos['Description'];
        str_replace('<br />', '', $articleInfos['Description']);
        if(isset($_POST['SEND']))
        {
        $titre_saisi = htmlspecialchars($_POST['titre']);
        echo $titre_saisi;
        echo "<br>";
        $description_saisi = nl2br(htmlspecialchars($_POST['description']));
        echo $description_saisi;
        echo "<br>";
        echo $getId;
        echo "<br>";  
        $updateArticle = $bdd->prepare('UPDATE articles SET Title = ?, Description = ? WHERE Id = ?');
        $updateArticle->execute(array($titre_saisi,$description_saisi,$getId));

        header('Location: article.php');
        }

    }else{
        echo "Aucun article trouvé";
    }

}else{
    echo "Aucun identifiant trouvé";
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify POST</title>
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
            <form method = "POST" action="" class="form">
                <Label>Title</Label>
                <input type="text" name="titre" value="<?= $titre; ?>" class="oui">
                <br>
                <Label>Description</Label>
                <textarea name= "description"><?=  $description; ?></textarea>
                <br>
                <input type="submit" name="SEND"  class="input" value="MODIFY">
            </form>  
        </section>
        </section>
    </section>
</body>
</html>