<?php
$bdd = new mysqli('localhost','root','','php_exam_db');
session_start();
if(isset($_POST["name"], $_POST["email"], $_POST["mdp"])) {
    if(!empty($_POST["name"]) AND !empty($_POST["email"]) AND !empty( $_POST["mdp"])) {
        $email = htmlspecialchars($_POST["email"]);
        $username = htmlspecialchars($_POST["name"]);
        $mdp = htmlspecialchars( $_POST["mdp"]);

        $query = "SELECT Username FROM users WHERE Username=\"$username\"";
        $db_username = mysqli_query($bdd , $query);
        $alreadyexist = true;

        while($row = mysqli_fetch_assoc($db_username)){
            $user = $row['Username'];
        }
        if(!isset($user)){
            $query = "SELECT Email FROM users WHERE Email=\"$email\"";
            $db_email = mysqli_query($bdd , $query);
            $usermail = NULL;
            $id = NULL;
            while($row = mysqli_fetch_assoc($db_email)){
                $usermail = $row['Email'];
            }
            if(!isset($usermail)){
                $alreadyexist = false;
                $mdp = md5($mdp);
                $queryid = "SELECT Id FROM users WHERE Email=\"$email\"";
                $db_id = mysqli_query($bdd , $queryid);
                $queryAdmin = "SELECT Role FROM users WHERE Role='Admin'";
                while($row = mysqli_fetch_assoc($db_id)){
                    $id = $row['Id'];
                }
          
                if(mysqli_query($bdd, $queryAdmin)->num_rows == 0){
                    $ins = $bdd->prepare('INSERT INTO users (Email, Username, Password, Role) VALUES (?, ?, ?, ?)');
                    $ins->execute(array($email ,$username, $mdp , 'Admin'));
                   
                }else{
                    
                    $ins = $bdd->prepare('INSERT INTO users (Email, Username, Password) VALUES (?, ?, ?)');
                    $ins->execute(array($email ,$username, $mdp));
            
                }
              
            }
        }
    }  
}
if(isset($_POST["emailco"], $_POST["mdpco"])) {
    if(!empty($_POST["emailco"]) AND !empty($_POST["mdpco"])) {
        
        $emailco = htmlspecialchars($_POST["emailco"]);
        $mdpco = htmlspecialchars( $_POST["mdpco"]);

        $querymailco = "SELECT Email FROM users WHERE Email=\"$emailco\"";
        $db_emailco = mysqli_query($bdd , $querymailco);

        $noexits = true;
        $usernameco = NULL;


        while($row = mysqli_fetch_assoc($db_emailco)){
            $em = $row['Email'];
        }
        
        if(isset($em)){
            $querymdp = "SELECT Password FROM users WHERE Email=\"$emailco\"";
            $db_mdpco = mysqli_query($bdd , $querymdp);
            $mdpco = md5($mdpco);
            while($row = mysqli_fetch_assoc($db_mdpco)){
                $m = $row['Password'];
            }
            if($m== $mdpco){
                $noexits = false;
                $usernameco = "SELECT Username FROM users WHERE Email=\"$emailco\"";
                $idco = "SELECT Id FROM users WHERE Email=\"$emailco\"";
                $db_usernameco = mysqli_query($bdd , $usernameco);
                $db_idco = mysqli_query($bdd , $idco);
                while($row = mysqli_fetch_assoc($db_usernameco)){
                    $u = $row['Username'];
                }
                while($row = mysqli_fetch_assoc($db_idco)){
                    $id = $row['Id'];
                }
                if($idco == 1) {
                    $role = 'Admin';
                    $_SESSION['name'] = $u;
                    $_SESSION['email'] = $emailco;
                    $_SESSION['mdp'] = $m;
                    $_SESSION['id'] = $id;
                    $_SESSION['role'] = $role;
                } else {
                    $_SESSION['name'] = $u;
                    $_SESSION['email'] = $emailco;
                    $_SESSION['mdp'] = $m;
                    $_SESSION['id'] = $id;
                    $_SESSION['role'] =  NULL;
                }
            }
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
    <title>LogIN - SignIN</title>
    <link rel="stylesheet" type="text/css" href="../css/login_signin.css"/>
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
                        <form method="post" action="inscription.php" autocomplete="off">
                        <div class="signin">
                            <h2>SIGN IN</h2>
                                <div class="intputcontname">
                                    <input name="name" type="text" required=""/>
                                    <label>Full Name</label>	
                                </div>
                                <div class="intputcontmail">
                                    <input name="email" type="email" pattern=".*@.*\..*" required=""/>
                                    <label>Email</label>	
                                </div>
                                <div class="intputcont">
                                    <input name="mdp" type="password" required=""/>
                                    <label>PassWord</label>	
                                </div>
                                <?php
                                if(isset($alreadyexist)){
                                    if($alreadyexist){
                                        echo  "<p>Name or Email already exist !</p>";
                                    }else{
                                        echo  "<p>Account created please Login !</p>";
                                        // header('Location: ../index.php');
                                        // exit();
                                    }
                                }
                                ?>
                            <div class="butsignin">
                                <a href="../index.php">Go back Home ?</a>
                                <input type="submit" value="SIGN IN" class="bouton-sign"/>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="sur-cadre-droite" id="login">
                    <form method="post"  action="inscription.php" autocomplete="off">
                        <div class="login" >
                            <h2>LOGIN</h2>
                                <div class="intputcontmail">
                                    <input type="email" name="emailco" pattern=".*@.*\..*" required=""/>
                                    <label>Email</label>	
                                </div>
                                <div class="intputcont">
                                    <input type="password" name="mdpco" required=""/>
                                    <label>PassWord</label>	
                                </div>
                                <?php
                                if(isset($noexits)){
                                    if($noexits){
                                        echo  "<p>Email or Password doesn't exist !</p>";
                                    }else{
                                        header('Location: ../index.php');
                                        exit();
                                    }
                                }
                                ?>
                            <div class="butsignin">
                                <a href="../index.php">Go back Home ?</a>
                                <input type="submit" value="LOGIN" class="bouton-sign"/>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="cadre">
                        <div class="gauche">
                            <div>
                                <h2>Don't have an account ?</h2>
                                <p>Create one by clicking on the next button "SIGN IN"</p>
                                <button class="bouton-sign" onclick="seeSignIN()">SIGN IN</button>
                            </div>
                        </div>
                        <div class="droite">
                            <div>
                                <h2>Already have an account ?</h2>
                                <p>Login by clicking on the next button  "LOGIN"</p>
                                <button class="bouton-login" onclick="seeLogIn()">LOGIN</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <script src="../js/login_signin.js"></script>
</body>
</html>