<?php
    # 關閉錯誤報告，以防止錯誤訊息干擾頁面輸出
    error_reporting(0);
    
    # 啟動 session，以便使用 session 相關功能
    session_start();
    
    # 檢查是否有使用者已登入，若未登入則提示請登入並重新導向到登入頁面
    if (!$_SESSION["id"]) {
        echo "please login first";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        # 建立資料庫連結
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        # 構造 SQL 語句，插入新的佈告資料到資料庫
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        
        # 執行 SQL 語句，如果執行失敗則輸出錯誤訊息，否則顯示成功訊息並重新導向到指定頁面
        if (!mysqli_query($conn, $sql)){
            echo "新增命令錯誤";
        }
        else{
            echo "新增佈告成功，三秒鐘後回到網頁";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
