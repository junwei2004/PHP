<?php
    #設置錯誤報告級別為0（關閉錯誤報告）
    error_reporting(0);
    #啟動會話
    session_start();
    #檢查是否有用戶id存於會話中，若不存在，則提示用戶先登入，並將瀏覽器重定向到登入頁面
    if (!$_SESSION["id"]) {
        echo "請先登入";
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        #顯示歡迎消息和相關操作連結，例如登出、管理使用者、新增佈告等
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
        #建立資料庫連線
        $conn=mysqli_connect("db4free.net", "immust", "immustimmust", "immust");
        #從資料庫中選擇佈告資料
        $result=mysqli_query($conn, "select * from bulletin");
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        while ($row=mysqli_fetch_array($result)){
            #顯示佈告列表
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            echo $row["bid"];
            echo "</td><td>";
            echo $row["type"];
            echo "</td><td>"; 
            echo $row["title"];
            echo "</td><td>";
            echo $row["content"]; 
            echo "</td><td>";
            echo $row["time"];
            echo "</td></tr>";
        }
        echo "</table>";
    }
?>

#這段程式碼的主要功能是檢查使用者是否已登入，如果使用者已登入，則顯示歡迎消息和佈告列表。如果使用者未登入，則顯示提示訊息並將瀏覽器重定向到登入頁面。
