<?php
$bdd = new PDO('mysql:host=localhost;dbname=php_exam_db;', 'root', '');
$db = new mysqli('localhost','root','','php_exam_db');
session_start();
if(!$_SESSION['id']) {
    header('Location: ../index.php');
}

if(isset($_POST['logout'])){
    echo "oui";
    session_destroy();
    header('Location: ./inscription.php');
}
if(isset($_GET['Id']) AND !empty($_GET['Id'])) {
    
    $getId = $_GET['Id'];
    $recupUsers =  $bdd->prepare('SELECT * FROM users WHERE Id = ?');
    $recupUsers->execute(array($getId));
    
    if($recupUsers->rowCount()>0){
        $alreadyexist = true;
        $alreadyexistEmail = true;
        
        $usersInfos =  $recupUsers->fetch();
        $username = $usersInfos['Username'];
        $em = $usersInfos['Email'];
        $m = $usersInfos['Password'];
        
       
        
        if(isset($_POST['valider'])) {
        

            $alreadyexist = false;
            
                $newUsername = htmlspecialchars($_POST['name']);
                
                $update = $bdd->prepare('UPDATE users SET Username = ? WHERE Id = ?');
                $update->execute(array($newUsername,$getId));
               
            
        }
        if(isset($_POST['valider2'])) {
            
                $alreadyexistEmail = false;
                
                    $newEmail = htmlspecialchars($_POST['email']);
                    
                    $update = $bdd->prepare('UPDATE users SET Email = ? WHERE Id = ?');
                    $update->execute(array($newEmail,$getId));
            
            
        }
        
        if(isset($_POST['valider3'])) {
            $newPassword = htmlspecialchars($_POST['mdp']);
            $m = md5($newPassword);
            $update = $bdd->prepare('UPDATE users SET Password = ? WHERE Id = ?');
            $update->execute(array($newPassword,$getId));
            
         
        } 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Account</title>
    <link rel="stylesheet" type="text/css" href="../css/modifya.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
</head>
<body>
        <section>
            <div class="section">
                <div class="all">
                    <div class="sur-cadre-gauche" id ="signin">
                        <div class="signin">
                            <h2>Modify</h2>
                            <form method="post" action="" autocomplete="off">
                                <div class="intputcontname">
                                    <input name="name" type="text"  />
                                    <label>New Full Name</label>	
                                </div>
                                
                                <div class="butsignin">
                                <input type="submit" name=valider value="Modify" class="bouton-sign"/>
                                </div>
                            </form>
                            <form method="post" action="" autocomplete="off">
                                <div class="intputcontmail">
                                    <input name="email" type="email" pattern=".*@.*\..*" />
                                    <label>New Email</label>	
                                </div>
                                
                                <div class="butsignin">
                                    <input type="submit" name="valider2" value="Modify" class="bouton-sign"/>
                                </div>
                            </form>
                            <form method="post" action="" autocomplete="off">
                                <div class="intputcont">
                                    <input name="mdp" type="password" />
                                    <label>New PassWord</label>	
                                </div>
                                
                                <div class="butsignin">
                                <a href="modifyAccount.php?Id=<?= $id;?>"><input type="submit" name="valider3" value="Modify" class="bouton-sign"/></a>
                                </div>
                                </form>
                                <div class="intputcont">

                                <form  method="post"  action="?" autocomplete="off">
                                <label>Doesn't work no time, but you have to log out</label>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <button class=bouton-sign name ="logout" class="LOG OUT">Log Out</button>

                                </form>
                                </div>
                        </div>      
                    </div>
                </div>
            </div>
        </section>
</body>
</html>