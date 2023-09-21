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

    // if(!isset($_SESSION['numR'])){
    //     $_SESSION['numR'] = array();
    // }

    // if(!isset($_SESSION['numC'])){
    //     $_SESSION['numC'] = 0;
    // }
    // else{
    //     $_SESSION['numC']++;
    // }
		
    $Number=array();
    $count=0;

    $num=$_SESSION['num'];

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
        // $numStr="";
        for($i=0;$i<$count;$i++){
           $numStr.=$i ."=".$Number[$i].','.$Number[$i+1].','.$Number[$i+2]."<br>";
        //    $numS1=$numStr;
           echo $numStr;
        }
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

    

    // foreach ($Number as $num) {
    //     if (function_exists($num)) {
    //         print_r($Number);
    //     } 
    //     else {
    //         echo($conut ."=".$numStr) ;
    //     }
    // }

    // $_SESSION['numR'] =$_SESSION['numC'] ."=".$Number;

    // print_r($Number);
?>