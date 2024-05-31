<?php
    # 關閉錯誤報告，以防止錯誤訊息干擾頁面輸出
    error_reporting(0);
    
    # 啟動 session，以便使用 session 相關功能
    session_start();
    
    # 檢查是否有使用者已登入，若未登入則提示請登入並重新導向到登入頁面
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        # 建立資料庫連結
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        
        # 構造 SQL 語句，刪除資料庫中符合條件的使用者記錄
        $sql="delete from user where id='{$_GET["id"]}'";
        
        # 執行 SQL 語句，如果執行失敗則輸出錯誤訊息，否則顯示成功訊息並重新導向到指定頁面
        if (!mysqli_query($conn,$sql)){
            echo "使用者刪除錯誤";
        }else{
            echo "使用者刪除成功";
        }
        echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
    }
?>
