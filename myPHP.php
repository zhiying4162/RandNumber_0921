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

</body>
<?php
    session_start();
    
    if(isset($_POST["submit"])){
        $Narr=array();
        while(count($Narr)<3){
            $num=rand(0,9);
            if(!in_array($num,$Narr)){
                $Narr[]=$num;
            }
        }

        $_SESSION['Narr']=$Narr;

        //確定是否已按過按鈕，且跑出Array的字出來
        if(!isset($_SESSION['check'])){
            $_SESSION['check']=0;
        }
        else{
            $_SESSION['check']=1;
        }

        //已按了幾次(已跑了幾次迴圈)
        if(!isset($_SESSION['bout'])){
            $_SESSION['bout']=0;
        }
        else{
            $_SESSION['bout']+=1;
        }

        //連接最後的答案
        if(!isset($_SESSION['ans'])){
            $_SESSION['ans']="";
        }
        
        $_SESSION['ans'].=$_SESSION['bout']."=";
        for($i=0;$i<count($_SESSION['Narr']);$i++){
            $_SESSION['ans'].=$_SESSION['Narr'][$i].',';
        }
        $_SESSION['ans'].="</br>";

        if(isset($_SESSION['check'])){
            if($_SESSION['check']==1){
                print_r($_SESSION['ans']);
            }
            else{
                print_r($_SESSION['Narr']);
                echo "</br>";
            }
        }

        $abs_AB=abs($_SESSION['Narr'][1]-$_SESSION['Narr'][0]);
        $abs_BC=abs($_SESSION['Narr'][2]-$_SESSION['Narr'][1]);

        if($_SESSION['bout']<9){
            if($abs_AB==$abs_BC){
                echo '總共試了'.$_SESSION['bout'].'次或已找到數字了喔!';
                session_destroy(); //將session摧毀，不再執行
            }
        }
        else{
            echo '總共試了'.$_SESSION['bout'].'次或已找到數字了喔!';
            session_destroy();
        }

            // include 'insert.php';

    }
    
?>
</html>