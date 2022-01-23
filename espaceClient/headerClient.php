<?php

session_start();
if(isset($_POST['logout'])){
    echo "oui";
    session_destroy();
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
      
      body,
      html {
          overflow-x: hidden;
      }
      * {
          padding: 0;
          margin: 0;
          box-sizing: unset;
      }
      body {
          font-family: 'Roboto', sans-serif;
      }
      div{
        height:80px;
        width:100%;
        background-color: black;
        border-bottom:2px solid #2a9df4;
        position: absolute;
      }
      ul {
        list-style-type: none;
        padding-top:  25px;
        overflow: hidden;
        display: flex;
        justify-content:space-around;
      }
      li  {
        display: block;
        color: ghostwhite;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
      }
      li:hover{
        font-weight: bold;
        font-size:20px;
      }
      p{
        color:ghostwhite;
        margin-top:10px;
      }
      
      a {
          color: ghostwhite ;
          font-style:none;
          text-decoration:none;
        }
      button
      {
        width: 100px;
        height: 40px;
        border-radius: 5px;
        border: solid 2px ghostwhite;
        background-color:black;
        color: ghostwhite;
        transition-duration:200ms ;
      }
      button:hover{
        width: 110px;
        cursor: pointer;
        font-weight: bold;
        padding: 2px;
        color: ghostwhite;
        font-size:16px;
    }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">


   
    
</head>
<body>
  <div>


<?php
    $id = '';
 
    if(isset($_SESSION["id"])) {
      $id = $_SESSION["id"];
        if($id == 1) {
          ?>
          <ul>
          <li><a href="../index.php">HOME</a></li>
          <li><a href="./article.php">ARTICLE</a></li>
          <li><a href="./accounts.php">ACCOUNT</a></li>
          <li><a href="./post.php">POST</a></li>
          <li><a href="./ban.php">BAN</a></li>
          <form  method="post"  action="?" autocomplete="off">
              <button name ="logout" class="LOG OUT">LOG OUT</button>
          </form>
        </ul>
        <?php
        } else {
          ?>
          <ul>
          <li><a href="../index.php">HOME</a></li>
          <li><a href="./article.php">ARTICLE</a></li>
          <li><a href="./accounts.php">ACCOUNT</a></li>
          <li><a href="./post.php">POST</a></li>
          <form  method="post"  action="?" autocomplete="off">
              <button name ="logout" class="LOG OUT">LOG OUT</button>
          </form>
        </ul>
          <?php
        } 
    } else {
      ?>
      <ul>
        <li>You are not connected</li>
        
        
        <button><a href='espaceClient/inscription.php'>LOG IN</a></button>
        
      </ul>
      <?php
    }

  ?>
  </div>

    
</body>
</html>