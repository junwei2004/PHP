<html>
    <head><title>使用者管理</title></head>
    <body>
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
            # 顯示使用者管理標題及相關操作連結
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            
            # 建立資料庫連結
            $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
            
            # 從資料庫中查詢所有使用者資料並顯示在表格中
            $result=mysqli_query($conn, "select * from user");
            while ($row=mysqli_fetch_array($result)){
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            echo "</table>";
        }
    ?> 
    </body>
</html>
