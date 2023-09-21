<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <form action="myPHP.php" method="post">
        <input type="submit" name="submit" id="submit" value="送出">
    </form>
    <form action="clear.php" method="post">
        <input type="submit" name="submit" id="submit" value="清除">
    </form>
</body>
<?php
session_start();
         

    if(isset($_SESSION['Number'])){
        $Number=$_SESSION['Number'];
        $num=$_SESSION['num']; 
        $count=$_SESSION['count'];
        print_r ($Number);
    }
    if(isset($_SESSION['text'])){
        $text=$_SESSION['text'];
        echo $text;
        $_SESSION['text']='';
    }
    if (!isset($_SESSION['clickCount'])) {
         $_SESSION['clickCount'] = 0;
    }
?>
</html>