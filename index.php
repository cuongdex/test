<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" contentt="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-bot.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>CIT - Tuyển Sinh</title>
</head>
<body>
    <?php 
        include ("page/header.php");
        session_start();
         if(isset($_SESSION['dang_nhap'])){
            include ("page/nav-user.php");
            ?>
    <img class="chat-icon" id="chat" src="img/chat.png" alt="">
            <?php
            include ("bot.php");
        }else{
            
            include ("page/nav.php");
            ?>
            <img class="chat-icon" id="chat" src="img/chat.png" alt="">
            <?php
            include ("nologin.php");

        }
        include ("page/main.php");
        include ("page/footer.php");
    ?>
</body>
<script src="js/main.js"></script>
</html>
