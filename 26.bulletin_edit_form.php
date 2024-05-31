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
        
        # 從資料庫中查詢指定佈告編號的佈告資料
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");
        $row=mysqli_fetch_array($result);
        
        # 根據佈告類型設置相應的勾選狀態
        $checked1="";
        $checked2="";
        $checked3="";
        if ($row['type']==1)
            $checked1="checked";
        if ($row['type']==2)
            $checked2="checked";
        if ($row['type']==3)
            $checked3="checked";
        
        # 顯示用於編輯佈告的表單，預填各項資料並設置勾選狀態
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    標    題：<input type=text name=title value={$row['title']}><br>
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
