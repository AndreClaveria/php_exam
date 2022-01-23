<?php
$bdd = new mysqli('localhost','root','','php_exam_db');
include("./headerClient.php");
if(!$_SESSION['id']){
	header('Location: ../index.php');
} 


    $u = $_SESSION['name'];

    $em = $_SESSION['email'];

    $m = $_SESSION['mdp'];
    
    $id = $_SESSION['id'];



if(isset($_POST['logout'])){
    echo "oui";
    session_destroy();
    header('Location: ./inscription.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" type="text/css" href="../css/ban.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
</head>
<body>
    <section>
        <section class="all">
            <?php
                echo  "<p><strong>You : </strong>".$u." !</p>";
                echo  "<p><strong>Email : </strong>".$em." !</p>";
                echo  "<p><strong>Password : </strong>".$m." !</p>";
                echo  "<p><strong>ID : </strong>".$id." !</p>";
                if($id == 1){
                    echo  "<p><strong>Role :</strong> ADMIN !</p>";
                }else{
                    echo  "<p><strong>Role :</strong> NOOB !</p>";
                }
            ?>
            <form  method="post"  action="modifyAccount.php" autocomplete="off">
            <button name ="modifya" class="LOG OUT">MODIFY ACCOUNT</button>
            </form>
            <br />
            <form  method="post"  action="?" autocomplete="off">
            <button name ="logout" class="LOG OUT">LOG OUT</button>

            </form>

        </section>
    </section>

</body>
</html>