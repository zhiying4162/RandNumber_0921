<?php
    // $link = @mysqli_connect( 
    //     'localhost',  // MySQL主機名稱 
    //     'root',       // 使用者名稱 
    //     '',  // 密碼
    //     '107php');

    // if(isset($link))
    // {
    //     echo "";
    // }
    // else{
    //     echo "資料庫連線失敗！！！<br>";
    // }

    session_start();
		
    $Number=array();
    $count=0;

    $num=$_SESSION['num'];
    
    if (isset($_POST['submit'])) {
        $_SESSION['clickCount']++;
    }

    $clickCount=$_SESSION['clickCount'];

    if($clickCount>9){
        session_destroy();
    }

    // $numStr=implode("",$Number);

    if(empty($num)){
        while(count($Number)<3){
            $num=rand(0,9);
            if(!in_array($num,$Number)){
                $Number[]=$num;
            }
        }
        $count++;
        // print_r($Number);
        $_SESSION['Number']=$Number;
        $_SESSION['num']=$num;  //判斷執行第幾次
        $_SESSION['count']=$count;
        header('location:index.php');
    }
    else{
        while(count($Number)<3){
            $num=rand(0,9);
            if(!in_array($num,$Number)){
                $Number[]=$num;
            }
        }
        $count++;
        $numStr=$clickCount ."=".$Number[0].','.$Number[1].','.$Number[2]."<br>";

        echo $numStr;

        $abs_AB=abs($Number[1]-$Number[0]);
        $abs_BC=abs($Number[2]-$Number[1]);
        if($abs_AB==$abs_BC||$count>=9){
            $text='總共試了10次或已找到數字了喔!';
            $_SESSION['text']=$text;
        }

        $_SESSION['Number']=$numStr;
        $_SESSION['num']=$num;  //判斷執行第幾次
        $_SESSION['count']=$count;
        header('location:index.php');
    }  
?>