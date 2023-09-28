<?php
    require_once 'db.php';   

    $freq=$_SESSION['bout'];
    $data = date('YmdHis');

    $master = "INSERT INTO mymaster VALUES ('$data', ".($freq+1).")";
    $result = mysqli_query($link, $master);

    foreach($_SESSION['ansA'] as $i => $value){
        $num = explode("=", $value)[1];
        $tail = "INSERT INTO mydetail VALUES ('$data','".($i+1)."','$num')";
        $result = mysqli_query($link, $tail);
    }

    mysqli_close($link);
    session_destroy();

    // require_once 'db.php';

    // $freq = $_SESSION['bout'];
    // $data = date('YmdHis');
    
    // $master = "INSERT INTO mymaster VALUES ('$data', '" . ($freq + 1) . "')";
    // $result = mysqli_query($link, $master);
    
    // foreach ($_SESSION['ans'] as $i => $value) {
    //     $num = explode("=", $value)[1];
    //     $numArray = explode(",", $num); // 将$num按逗号分割成数组
    
    //     foreach ($numArray as $j => $part) {
    //         $part = trim($part); // 去除可能的空格
    //         $tail = "INSERT INTO mydetail VALUES ('$data', '" . ($i + 1) . "', '$part')";
    //         $result = mysqli_query($link, $tail);
    //     }
    // }
    
    // mysqli_close($link);
    // session_destroy();
    
?>