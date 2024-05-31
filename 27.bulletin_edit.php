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
        
        # 嘗試更新資料庫中符合條件的佈告資料
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){
            # 若更新失敗則輸出錯誤訊息並重新導向到指定頁面
            echo "修改錯誤";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }else{
            # 若更新成功則顯示成功訊息並重新導向到指定頁面
            echo "修改成功，三秒鐘後回到佈告欄列表";
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
